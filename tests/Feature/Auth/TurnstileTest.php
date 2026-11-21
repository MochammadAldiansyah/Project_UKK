<?php

declare(strict_types=1);

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

/**
 * Class TurnstileTest
 *
 * Pengujian integrasi Cloudflare Turnstile CAPTCHA pada halaman Login
 * dan Lupa Password (Forgot Password).
 */
class TurnstileTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->withoutVite();
    }

    /**
     * Memastikan widget Turnstile dan script API tampil di halaman Login.
     */
    public function test_login_page_renders_turnstile_widget(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
        $response->assertSee('cf-turnstile');
        $response->assertSee(config('services.turnstile.key'));
        $response->assertSee('challenges.cloudflare.com/turnstile/v0/api.js');
    }

    /**
     * Memastikan widget Turnstile dan script API tampil di halaman Lupa Password.
     */
    public function test_forgot_password_page_renders_turnstile_widget(): void
    {
        $response = $this->get('/forgot-password');

        $response->assertStatus(200);
        $response->assertSee('cf-turnstile');
        $response->assertSee(config('services.turnstile.key'));
        $response->assertSee('challenges.cloudflare.com/turnstile/v0/api.js');
    }

    /**
     * Memastikan login ditolak jika verifikasi Turnstile gagal dari API Cloudflare.
     */
    public function test_login_fails_when_turnstile_verification_fails(): void
    {
        Http::fake([
            'https://challenges.cloudflare.com/turnstile/v0/siteverify' => Http::response([
                'success' => false,
                'error-codes' => ['invalid-input-response'],
            ], 200),
        ]);

        $user = User::factory()->create([
            'password' => bcrypt('password123'),
        ]);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password123',
            'cf-turnstile-response' => 'invalid-token-sample',
        ]);

        $response->assertSessionHasErrors('cf-turnstile-response');
        $this->assertGuest();
    }

    /**
     * Memastikan login berhasil jika verifikasi Turnstile valid dari API Cloudflare.
     */
    public function test_login_succeeds_when_turnstile_verification_passes(): void
    {
        Http::fake([
            'https://challenges.cloudflare.com/turnstile/v0/siteverify' => Http::response([
                'success' => true,
                'challenge_ts' => now()->toIso8601String(),
                'hostname' => 'localhost',
            ], 200),
        ]);

        $user = User::factory()->create([
            'password' => bcrypt('password123'),
        ]);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password123',
            'cf-turnstile-response' => 'valid-token-sample',
        ]);

        $response->assertSessionHasNoErrors();
        $this->assertAuthenticatedAs($user);
        $response->assertRedirect(route('dashboard', absolute: false));
    }

    /**
     * Memastikan permintaan reset password ditolak jika verifikasi Turnstile gagal.
     */
    public function test_forgot_password_fails_when_turnstile_verification_fails(): void
    {
        Http::fake([
            'https://challenges.cloudflare.com/turnstile/v0/siteverify' => Http::response([
                'success' => false,
                'error-codes' => ['invalid-input-response'],
            ], 200),
        ]);

        $user = User::factory()->create();

        $response = $this->post('/forgot-password', [
            'email' => $user->email,
            'cf-turnstile-response' => 'invalid-token-sample',
        ]);

        $response->assertSessionHasErrors('cf-turnstile-response');
    }

    /**
     * Memastikan permintaan reset password berhasil jika verifikasi Turnstile valid.
     */
    public function test_forgot_password_succeeds_when_turnstile_verification_passes(): void
    {
        Mail::fake();

        Http::fake([
            'https://challenges.cloudflare.com/turnstile/v0/siteverify' => Http::response([
                'success' => true,
                'challenge_ts' => now()->toIso8601String(),
                'hostname' => 'localhost',
            ], 200),
        ]);

        $user = User::factory()->create();

        $response = $this->post('/forgot-password', [
            'email' => $user->email,
            'cf-turnstile-response' => 'valid-token-sample',
        ]);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect(route('otp.verify.form'));
        $this->assertEquals($user->email, session('reset_email'));
    }
}

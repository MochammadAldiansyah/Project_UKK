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
 * Integration tests for Cloudflare Turnstile CAPTCHA on the Register,
 * Login, and Forgot Password pages.
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
     * Ensures the Turnstile widget and API script render on the Login page.
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
     * Ensures the Turnstile widget and API script render on the Forgot Password page.
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
     * Ensures login is rejected when Turnstile verification fails at the Cloudflare API.
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
     * Ensures login succeeds when Turnstile verification passes at the Cloudflare API.
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
     * Ensures the Turnstile widget and API script render on the Register page.
     */
    public function test_register_page_renders_turnstile_widget(): void
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
        $response->assertSee('cf-turnstile');
        $response->assertSee(config('services.turnstile.key'));
        $response->assertSee('challenges.cloudflare.com/turnstile/v0/api.js');
    }

    /**
     * Ensures registration is rejected when Turnstile verification fails at the Cloudflare API.
     */
    public function test_register_fails_when_turnstile_verification_fails(): void
    {
        Http::fake([
            'https://challenges.cloudflare.com/turnstile/v0/siteverify' => Http::response([
                'success' => false,
                'error-codes' => ['invalid-input-response'],
            ], 200),
        ]);

        $response = $this->post('/register', [
            'name' => 'Bot Spam',
            'email' => 'bot@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
            'cf-turnstile-response' => 'invalid-token-sample',
        ]);

        $response->assertSessionHasErrors('cf-turnstile-response');
        $this->assertGuest();
        $this->assertDatabaseMissing('users', ['email' => 'bot@example.com']);
    }

    /**
     * Ensures registration succeeds when Turnstile verification passes.
     */
    public function test_register_succeeds_when_turnstile_verification_passes(): void
    {
        Http::fake([
            'https://challenges.cloudflare.com/turnstile/v0/siteverify' => Http::response([
                'success' => true,
                'challenge_ts' => now()->toIso8601String(),
                'hostname' => 'localhost',
            ], 200),
        ]);

        $response = $this->post('/register', [
            'name' => 'User Baru',
            'email' => 'baru@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
            'cf-turnstile-response' => 'valid-token-sample',
        ]);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect(route('login', absolute: false));
        $this->assertDatabaseHas('users', ['email' => 'baru@example.com']);
    }

    /**
     * Ensures login fails with a configuration message (not "complete the captcha")
     * when the site key is missing, since no widget renders for the user to complete.
     */
    public function test_login_reports_configuration_error_when_site_key_is_missing(): void
    {
        config(['services.turnstile.key' => '']);

        Http::fake();

        $user = User::factory()->create([
            'password' => bcrypt('password123'),
        ]);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password123',
            'cf-turnstile-response' => 'garbage-token',
        ]);

        $response->assertSessionHasErrors(['cf-turnstile-response' => 'Verifikasi captcha tidak tersedia. Hubungi administrator.']);
        $this->assertGuest();
        Http::assertNothingSent();
    }

    /**
     * Ensures login fails closed when the Turnstile secret key is not configured.
     * Without this, a deploy missing TURNSTILE_SECRET_KEY silently disables captcha protection.
     */
    public function test_login_fails_closed_when_turnstile_secret_is_missing(): void
    {
        config(['services.turnstile.secret' => '']);

        Http::fake();

        $user = User::factory()->create([
            'password' => bcrypt('password123'),
        ]);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password123',
            'cf-turnstile-response' => 'garbage-token',
        ]);

        $response->assertSessionHasErrors('cf-turnstile-response');
        $this->assertGuest();
        Http::assertNothingSent();
    }

    /**
     * Ensures the reset password request is rejected when Turnstile verification fails.
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
     * Ensures the reset password request succeeds when Turnstile verification passes.
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

<?php

declare(strict_types=1);

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

/**
 * Class TurnstileRule
 *
 * Rule validasi kustom untuk memverifikasi token respon Cloudflare Turnstile.
 * Rule ini mengirimkan request verifikasi server-to-server ke endpoint resmi
 * Cloudflare Turnstile Siteverify API.
 *
 * @package App\Rules
 */
class TurnstileRule implements ValidationRule
{
    /**
     * Endpoint API resmi Cloudflare Turnstile untuk verifikasi token.
     */
    private const SITEVERIFY_URL = 'https://challenges.cloudflare.com/turnstile/v0/siteverify';

    /**
     * Jalankan validasi rule Turnstile.
     *
     * @param  string  $attribute Nama input form ('cf-turnstile-response')
     * @param  mixed  $value Nilai token respon yang dihasilkan oleh widget Turnstile
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail Callback pesan error
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Izinkan bypass pada environment testing jika nilai token kosong
        if (app()->environment('testing') && empty($value)) {
            return;
        }

        // Pastikan token respon berupa string dan tidak kosong
        if (empty($value) || ! is_string($value)) {
            $fail('Harap selesaikan verifikasi captcha.');
            return;
        }

        $secretKey = config('services.turnstile.secret');

        // Jika secret key belum dikonfigurasi di file environment (.env)
        if (empty($secretKey)) {
            Log::warning('Cloudflare Turnstile: Secret key belum dikonfigurasi pada file .env.');
            return;
        }

        try {
            // Melakukan request verifikasi ke API Cloudflare Turnstile
            $response = Http::asForm()
                ->timeout(10)
                ->post(self::SITEVERIFY_URL, [
                    'secret' => $secretKey,
                    'response' => $value,
                    'remoteip' => request()->ip(),
                ]);

            // Cek apakah response HTTP sukses dan parameter success bernilai true
            if (! $response->successful() || ! (bool) $response->json('success', false)) {
                $errorCodes = $response->json('error-codes', []);

                Log::warning('Cloudflare Turnstile: Verifikasi captcha gagal.', [
                    'ip' => request()->ip(),
                    'error_codes' => $errorCodes,
                ]);

                $fail('Verifikasi captcha tidak valid. Silakan coba kembali.');
            }
        } catch (\Throwable $e) {
            Log::error('Cloudflare Turnstile: Terjadi kesalahan saat menghubungi API verifikasi.', [
                'error' => $e->getMessage(),
            ]);

            $fail('Gagal memverifikasi captcha karena kendala jaringan. Silakan coba sesaat lagi.');
        }
    }
}

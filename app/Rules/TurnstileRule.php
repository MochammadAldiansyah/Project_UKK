<?php

declare(strict_types=1);

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Translation\PotentiallyTranslatedString;

/**
 * Validates a Cloudflare Turnstile response token.
 *
 * Sends a server-to-server verification request to the official
 * Cloudflare Turnstile Siteverify API.
 */
class TurnstileRule implements ValidationRule
{
    /**
     * Official Cloudflare Turnstile token verification endpoint.
     */
    private const SITEVERIFY_URL = 'https://challenges.cloudflare.com/turnstile/v0/siteverify';

    /**
     * Run the Turnstile validation rule.
     *
     * @param  string  $attribute  Form input name ('cf-turnstile-response')
     * @param  mixed  $value  Response token produced by the Turnstile widget
     * @param  Closure(string, ?string=): PotentiallyTranslatedString  $fail  Validation failure callback
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Allow an empty token to pass in the testing environment
        if (app()->environment('testing') && empty($value)) {
            return;
        }

        $secretKey = trim((string) config('services.turnstile.secret'));
        $siteKey = trim((string) config('services.turnstile.key'));

        // Check configuration before the token. Both keys are required:
        // - Without a secret key, verification cannot run at all. This rule used
        //   to return early (fail-open), so a deploy missing TURNSTILE_SECRET_KEY
        //   silently disabled captcha protection and bots could log in freely.
        // - Without a site key, the <x-turnstile> component renders no widget, so
        //   users are always rejected with "complete the captcha" while no captcha
        //   exists to complete (deadlock).
        if (empty($secretKey) || empty($siteKey)) {
            Log::warning('Cloudflare Turnstile: Konfigurasi tidak lengkap pada file .env.', [
                'secret_key_set' => ! empty($secretKey),
                'site_key_set' => ! empty($siteKey),
            ]);

            $fail('Verifikasi captcha tidak tersedia. Hubungi administrator.');

            return;
        }

        // The token must be a non-empty string
        if (empty($value) || ! is_string($value)) {
            $fail('Harap selesaikan verifikasi captcha.');

            return;
        }

        try {
            $payload = [
                'secret' => $secretKey,
                'response' => $value,
            ];

            // Only include remoteip when it is a valid public IP.
            // Sending a local/LAN IP (192.168.x.x, 10.x.x.x, 127.0.0.1) to Cloudflare
            // can fail verification because the client IP does not match the router's.
            $clientIp = request()->ip();
            if ($clientIp && filter_var($clientIp, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE)) {
                $payload['remoteip'] = $clientIp;
            }

            // Send the verification request to the Cloudflare Turnstile API
            $response = Http::asForm()
                ->timeout(10)
                ->post(self::SITEVERIFY_URL, $payload);

            // Require a successful HTTP response with success set to true
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

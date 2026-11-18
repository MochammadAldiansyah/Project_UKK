/**
 * Script Otentikasi & Validasi Interaktif (Vanilla JS)
 * Portal PKL SMK
 *
 * Fitur:
 * 1. Rate Limiter tombol dengan Countdown Timer real-time
 * 2. Pesan peringatan (warning) merah standar validasi saat Too Many Requests
 * 3. Sinkronisasi dengan pesan error rate limit dari server (Laravel throttle)
 * 4. Toggle visibilitas password (intip kata sandi)
 * 5. Indikator syarat password secara real-time
 * 6. Hitung mundur (cooldown) kirim ulang kode OTP
 */

document.addEventListener('DOMContentLoaded', function () {
    initAuthRateLimiter();
    checkServerThrottleErrors();
    initPasswordToggles();
    initPasswordCriteriaChecker();
    initOtpResendCountdown();
});

/**
 * 1. Rate Limiter Tombol Submit & Cooldown Countdown
 */
function initAuthRateLimiter() {
    const forms = document.querySelectorAll('form:not(#resend-otp-form)');

    forms.forEach(form => {
        const submitBtn = form.querySelector('button[type="submit"]');
        if (!submitBtn) return;

        // Simpan teks asli tombol jika belum disimpan
        if (!submitBtn.dataset.originalText) {
            submitBtn.dataset.originalText = submitBtn.innerText.trim();
        }

        const pathKey = 'auth_cooldown_' + window.location.pathname;

        // Cek apakah ada cooldown tersimpan dari sesi sebelumnya
        const savedCooldown = sessionStorage.getItem(pathKey);
        if (savedCooldown) {
            const remaining = Math.ceil((parseInt(savedCooldown, 10) - Date.now()) / 1000);
            if (remaining > 0) {
                showRateLimitWarning(form, remaining);
                startRateLimiterCountdown(form, submitBtn, remaining, pathKey);
            } else {
                sessionStorage.removeItem(pathKey);
            }
        }

        // Tracking frekuensi klik cepat di client-side
        let clickTimestamps = [];

        form.addEventListener('submit', function (e) {
            const now = Date.now();

            // Bersihkan klik yang sudah lebih dari 10 detik lalu
            clickTimestamps = clickTimestamps.filter(t => now - t < 10000);
            clickTimestamps.push(now);

            // Jika user klik lebih dari 3 kali berturut-turut dalam 10 detik -> aktifkan rate limit
            if (clickTimestamps.length >= 3) {
                e.preventDefault();
                const penaltySeconds = 15;
                sessionStorage.setItem(pathKey, now + (penaltySeconds * 1000));
                showRateLimitWarning(form, penaltySeconds);
                startRateLimiterCountdown(form, submitBtn, penaltySeconds, pathKey);
                return false;
            }

            // Validasi input kosong sebelum submit
            const requiredInputs = form.querySelectorAll('input[required]');
            let hasEmpty = false;

            requiredInputs.forEach(input => {
                const inputWrapper = input.closest('.relative') || input.parentElement;
                const fieldContainer = inputWrapper.parentElement;
                let existingError = fieldContainer.querySelector('.field-client-error');

                if (!input.value.trim()) {
                    hasEmpty = true;
                    input.classList.add('border-red-400', 'bg-red-50/40', 'ring-1', 'ring-red-200');

                    // Ambil nama field dari label atau name/placeholder
                    const label = fieldContainer.querySelector('label');
                    let fieldName = label ? label.innerText.replace('*', '').trim() : '';
                    if (!fieldName) {
                        const nameAttr = input.name || input.id;
                        if (nameAttr === 'email') fieldName = 'Email';
                        else if (nameAttr === 'password') fieldName = 'Password';
                        else if (nameAttr === 'password_confirmation') fieldName = 'Konfirmasi Password';
                        else if (nameAttr === 'name') fieldName = 'Nama';
                        else if (nameAttr === 'otp') fieldName = 'Kode Verifikasi';
                        else fieldName = 'Kolom';
                    }

                    // Tampilkan pesan error teks merah di bawah input persis seperti referensi GetSkill
                    if (!existingError) {
                        existingError = document.createElement('p');
                        existingError.className = 'field-client-error text-xs text-red-500 mt-1.5 font-medium flex items-center gap-1';
                        existingError.innerHTML = `
                            <svg class="w-3 h-3 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>
                            <span>${fieldName} Wajib Diisi!</span>
                        `;
                        inputWrapper.insertAdjacentElement('afterend', existingError);
                    }

                    // Tampilkan ikon peringatan merah (!) di dalam sisi kanan input
                    let errorIcon = inputWrapper.querySelector('.input-error-icon');
                    if (!errorIcon) {
                        errorIcon = document.createElement('div');
                        errorIcon.className = 'input-error-icon absolute inset-y-0 right-0 pr-3.5 flex items-center pointer-events-none text-red-500';
                        const toggleBtn = inputWrapper.querySelector('#toggle-password-btn, #toggle-confirm-btn');
                        if (toggleBtn) {
                            errorIcon.className = 'input-error-icon absolute inset-y-0 right-8 pr-1.5 flex items-center pointer-events-none text-red-500';
                        }
                        errorIcon.innerHTML = `
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                            </svg>
                        `;
                        inputWrapper.appendChild(errorIcon);
                    }
                } else {
                    input.classList.remove('border-red-400', 'bg-red-50/40', 'ring-1', 'ring-red-200');
                    if (existingError) existingError.remove();
                    const errorIcon = inputWrapper.querySelector('.input-error-icon');
                    if (errorIcon) errorIcon.remove();
                }

                // Event listener saat user mengetik -> bersihkan error secara real-time
                input.addEventListener('input', function onInputClean() {
                    if (input.value.trim()) {
                        input.classList.remove('border-red-400', 'bg-red-50/40', 'ring-1', 'ring-red-200');
                        const err = fieldContainer.querySelector('.field-client-error');
                        if (err) err.remove();
                        const serverErr = fieldContainer.querySelector('[id$="-error"]');
                        if (serverErr) serverErr.remove();
                        const errIcon = inputWrapper.querySelector('.input-error-icon');
                        if (errIcon) errIcon.remove();
                    }
                });
            });

            if (hasEmpty) {
                e.preventDefault();
                return false;
            }

            // Saat form valid dan di-submit, beri proteksi double click
            submitBtn.disabled = true;
            submitBtn.classList.add('opacity-75', 'cursor-not-allowed', 'pointer-events-none');
            const originalText = submitBtn.dataset.originalText || 'Kirim';
            submitBtn.innerHTML = `
                <span class="inline-flex items-center justify-center gap-2">
                    <svg class="animate-spin h-4 w-4 text-white" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    <span>Memproses...</span>
                </span>
            `;

            // Reset setelah 6 detik jika halaman tidak redirect (misal koneksi lambat)
            setTimeout(() => {
                if (submitBtn.disabled && submitBtn.innerText.includes('Memproses')) {
                    submitBtn.disabled = false;
                    submitBtn.classList.remove('opacity-75', 'cursor-not-allowed', 'pointer-events-none');
                    submitBtn.innerText = originalText;
                }
            }, 6000);
        });
    });
}

/**
 * 2. Cek pesan error throttle dari response server saat halaman dimuat
 */
function checkServerThrottleErrors() {
    // Ambil semua elemen teks error di halaman
    const errorElements = document.querySelectorAll('.bg-red-50, [id$="-error"], .text-red-500, .text-red-600, ul li');
    let throttleSeconds = null;
    let targetForm = null;

    errorElements.forEach(el => {
        const text = el.textContent || '';
        // Cari angka detik di kalimat error ("tunggu X detik" / "dalam X detik" / "X seconds")
        const match = text.match(/(?:tunggu|dalam)\s+(\d+)\s*(?:detik|second)/i);
        if (match) {
            throttleSeconds = parseInt(match[1], 10);
            targetForm = el.closest('form') || document.querySelector('form');
        }
    });

    if (throttleSeconds && throttleSeconds > 0) {
        if (!targetForm) targetForm = document.querySelector('form');
        if (targetForm) {
            const submitBtn = targetForm.querySelector('button[type="submit"]');
            if (submitBtn) {
                const pathKey = 'auth_cooldown_' + window.location.pathname;
                sessionStorage.setItem(pathKey, Date.now() + (throttleSeconds * 1000));
                showRateLimitWarning(targetForm, throttleSeconds);
                startRateLimiterCountdown(targetForm, submitBtn, throttleSeconds, pathKey);
            }
        }
    }
}

/**
 * 3. Tampilkan pesan warning Too Many Requests (inline text merah, tanpa box container)
 */
function showRateLimitWarning(form, seconds) {
    if (!form) return;

    let warningP = form.querySelector('.auth-rate-limit-warning');

    if (!warningP) {
        warningP = document.createElement('p');
        warningP.className = 'auth-rate-limit-warning text-xs text-red-500 my-2 font-medium flex items-center gap-1.5 transition-all';
        warningP.innerHTML = `
            <svg class="w-3.5 h-3.5 shrink-0 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
            </svg>
            <span>Terlalu banyak permintaan! Harap tunggu <strong class="rate-limit-countdown-num underline">${seconds}</strong> detik sebelum mencoba lagi.</span>
        `;
        const submitBtnWrapper = form.querySelector('button[type="submit"]')?.closest('div');
        if (submitBtnWrapper) {
            form.insertBefore(warningP, submitBtnWrapper);
        } else {
            form.appendChild(warningP);
        }
    } else {
        const numSpan = warningP.querySelector('.rate-limit-countdown-num');
        if (numSpan) numSpan.innerText = seconds;
        warningP.classList.remove('hidden');
    }
}

/**
 * 4. Jalankan hitung mundur rate limiter pada tombol & perbarui pesan warning
 */
function startRateLimiterCountdown(form, submitBtn, durationSeconds, storageKey) {
    if (!submitBtn) return;

    if (!submitBtn.dataset.originalText) {
        submitBtn.dataset.originalText = submitBtn.innerText.trim();
    }
    const originalText = submitBtn.dataset.originalText;

    // Nonaktifkan tombol
    submitBtn.disabled = true;
    submitBtn.classList.add('opacity-60', 'cursor-not-allowed', 'pointer-events-none');

    let remaining = durationSeconds;

    function updateButtonAndBanner() {
        // Update teks tombol dengan countdown
        submitBtn.innerHTML = `
            <span class="inline-flex items-center justify-center gap-1.5">
                <svg class="w-4 h-4 text-white/90 animate-pulse" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>Coba lagi dalam <strong>${remaining}s</strong></span>
            </span>
        `;

        // Update angka di warning text
        const warningP = form.querySelector('.auth-rate-limit-warning');
        if (warningP) {
            const numSpan = warningP.querySelector('.rate-limit-countdown-num');
            if (numSpan) numSpan.innerText = remaining;
        }
    }

    updateButtonAndBanner();

    if (submitBtn._countdownInterval) {
        clearInterval(submitBtn._countdownInterval);
    }

    submitBtn._countdownInterval = setInterval(() => {
        remaining--;

        if (remaining > 0) {
            updateButtonAndBanner();
        } else {
            // Waktu habis: aktifkan kembali tombol
            clearInterval(submitBtn._countdownInterval);
            submitBtn._countdownInterval = null;

            if (storageKey) sessionStorage.removeItem(storageKey);

            submitBtn.disabled = false;
            submitBtn.classList.remove('opacity-60', 'cursor-not-allowed', 'pointer-events-none');
            submitBtn.innerText = originalText;

            // Hapus pesan warning rate limit
            const warningP = form.querySelector('.auth-rate-limit-warning');
            if (warningP) {
                warningP.remove();
            }
        }
    }, 1000);
}

/**
 * 6. Toggle Visibilitas Password
 */
function initPasswordToggles() {
    function setupToggle(btnId, inputId, eyeId, eyeSlashId) {
        const btn = document.getElementById(btnId);
        const input = document.getElementById(inputId);
        const eye = document.getElementById(eyeId);
        const eyeSlash = document.getElementById(eyeSlashId);

        if (!btn || !input) return;

        btn.addEventListener('click', function () {
            const isPassword = input.type === 'password';
            input.type = isPassword ? 'text' : 'password';
            if (eye && eyeSlash) {
                eye.classList.toggle('hidden', isPassword);
                eyeSlash.classList.toggle('hidden', !isPassword);
            }
        });
    }

    setupToggle('toggle-password-btn', 'password', 'eye-icon-password', 'eye-slash-icon-password');
    setupToggle('toggle-confirm-btn', 'password_confirmation', 'eye-icon-confirm', 'eye-slash-icon-confirm');
}

/**
 * 7. Indikator Syarat Password Real-time
 */
function initPasswordCriteriaChecker() {
    const passwordInput = document.getElementById('password');
    const reqLength = document.getElementById('req-length');
    const reqUppercase = document.getElementById('req-uppercase');
    const reqNumber = document.getElementById('req-number');
    const reqNospace = document.getElementById('req-nospace');

    if (!passwordInput || !reqLength) return;

    function updateRequirement(element, isValid) {
        if (!element) return;
        const icon = element.querySelector('.req-icon');
        const text = element.querySelector('.req-text');

        if (isValid) {
            if (icon) {
                icon.className = 'req-icon w-3.5 h-3.5 rounded-full bg-emerald-500 border border-emerald-500 flex items-center justify-center shrink-0 text-white';
                icon.innerHTML = '<svg class="w-2.5 h-2.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>';
            }
            if (text) text.className = 'req-text text-emerald-600 font-medium';
        } else {
            if (icon) {
                icon.className = 'req-icon w-3.5 h-3.5 rounded-full border border-slate-300 flex items-center justify-center shrink-0';
                icon.innerHTML = '';
            }
            if (text) text.className = 'req-text text-slate-500';
        }
    }

    passwordInput.addEventListener('input', function () {
        const val = passwordInput.value;
        const hasLength = val.length >= 8;
        const hasUppercase = /[A-Z]/.test(val);
        const hasNumber = /[0-9]/.test(val);
        const hasNoSpace = val.length > 0 && !/\s/.test(val);

        updateRequirement(reqLength, hasLength);
        updateRequirement(reqUppercase, hasUppercase);
        updateRequirement(reqNumber, hasNumber);
        updateRequirement(reqNospace, hasNoSpace);
    });
}

/**
 * 8. Hitung Mundur Kirim Ulang OTP
 */
function initOtpResendCountdown() {
    const resendBtn = document.getElementById('resend-otp-btn');
    const resendForm = document.getElementById('resend-otp-form');

    if (!resendBtn) return;

    const storageKey = 'otp_resend_cooldown_end';
    let countdownInterval = null;

    function startCooldown(seconds) {
        const endTime = Date.now() + (seconds * 1000);
        localStorage.setItem(storageKey, endTime);
        renderCountdown(endTime);
    }

    function renderCountdown(endTime) {
        if (countdownInterval) clearInterval(countdownInterval);

        countdownInterval = setInterval(() => {
            const remaining = Math.max(0, Math.ceil((endTime - Date.now()) / 1000));

            if (remaining > 0) {
                resendBtn.classList.add('pointer-events-none', 'text-slate-400');
                resendBtn.classList.remove('text-[#EF4444]', 'hover:text-[#DC2626]');
                resendBtn.innerText = `Kirim Ulang (${remaining}s)`;
            } else {
                clearInterval(countdownInterval);
                localStorage.removeItem(storageKey);
                resendBtn.classList.remove('pointer-events-none', 'text-slate-400');
                resendBtn.classList.add('text-[#EF4444]', 'hover:text-[#DC2626]');
                resendBtn.innerText = 'Kirim Ulang';
            }
        }, 1000);
    }

    const savedEndTime = localStorage.getItem(storageKey);
    if (savedEndTime && parseInt(savedEndTime, 10) > Date.now()) {
        renderCountdown(parseInt(savedEndTime, 10));
    }

    resendBtn.addEventListener('click', function (e) {
        const savedEndTime = localStorage.getItem(storageKey);
        if (savedEndTime && parseInt(savedEndTime, 10) > Date.now()) {
            e.preventDefault();
            return;
        }

        startCooldown(60);

        if (resendForm) {
            e.preventDefault();
            resendForm.submit();
        }
    });
}

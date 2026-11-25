/**
 * @file auth.js
 * @description Auth form interactions: rate limiting, validation, password toggle, OTP cooldown.
 */

(() => {
    'use strict';

    /** @readonly Module configuration constants. */
    const CONFIG = {
        STORAGE_KEY_COOLDOWN_PREFIX: 'auth_cooldown_',
        STORAGE_KEY_OTP_RESEND: 'otp_resend_cooldown_end',
        MAX_RAPID_CLICKS: 3,
        RAPID_CLICK_WINDOW_MS: 10000,
        CLIENT_PENALTY_SECONDS: 15,
        OTP_RESEND_DURATION_SECONDS: 60,
        SUBMIT_TIMEOUT_MS: 6000,
    };

    /** Initialize all handlers when DOM is ready. */
    document.addEventListener('DOMContentLoaded', () => {
        initRateLimiter();
        syncServerThrottleErrors();
        initPasswordVisibilityToggles();
        initPasswordCriteriaChecker();
        initOtpResendCooldown();
    });

    // =========================================================================
    // 1. RATE LIMITER & SUBMIT BUTTON COOLDOWN
    // =========================================================================

    /** Set up spam-click protection and submit cooldown for all forms. */
    function initRateLimiter() {
        const forms = document.querySelectorAll('form:not(#resend-otp-form)');

        forms.forEach((form) => {
            const submitBtn = form.querySelector('button[type="submit"]');
            if (!submitBtn) return;

            // Store original button text for later restoration
            if (!submitBtn.dataset.originalText) {
                submitBtn.dataset.originalText = submitBtn.innerText.trim();
            }

            const pathKey = CONFIG.STORAGE_KEY_COOLDOWN_PREFIX + window.location.pathname;

            // Restore active cooldown from sessionStorage
            const savedExpiry = sessionStorage.getItem(pathKey);
            if (savedExpiry) {
                const remainingSeconds = Math.ceil((parseInt(savedExpiry, 10) - Date.now()) / 1000);
                if (remainingSeconds > 0) {
                    renderRateLimitWarning(form, remainingSeconds);
                    startSubmitCooldown(form, submitBtn, remainingSeconds, pathKey);
                } else {
                    sessionStorage.removeItem(pathKey);
                }
            }

            // Bind validation and spam detection to the form
            bindFormValidation(form, submitBtn, pathKey);
        });
    }

    /**
     * Attach input validation and spam-submit detection to a form.
     * @param {HTMLFormElement} form
     * @param {HTMLButtonElement} submitBtn
     * @param {string} pathKey
     */
    function bindFormValidation(form, submitBtn, pathKey) {
        let clickTimestamps = [];
        const requiredInputs = form.querySelectorAll('input[required]');

        // Clear error state on input
        requiredInputs.forEach((input) => {
            input.addEventListener('input', () => {
                clearFieldValidationState(input);
            });
        });

        form.addEventListener('submit', (e) => {
            const now = Date.now();

            // Filter clicks within the tolerance window
            clickTimestamps = clickTimestamps.filter((time) => now - time < CONFIG.RAPID_CLICK_WINDOW_MS);
            clickTimestamps.push(now);

            // Detect spam submissions (threshold exceeded)
            if (clickTimestamps.length >= CONFIG.MAX_RAPID_CLICKS) {
                e.preventDefault();
                const penaltySeconds = CONFIG.CLIENT_PENALTY_SECONDS;
                sessionStorage.setItem(pathKey, now + penaltySeconds * 1000);

                renderRateLimitWarning(form, penaltySeconds);
                startSubmitCooldown(form, submitBtn, penaltySeconds, pathKey);
                return false;
            }

            // Validate all required fields
            let hasEmptyFields = false;
            requiredInputs.forEach((input) => {
                if (!input.value.trim()) {
                    hasEmptyFields = true;
                    applyFieldValidationError(input);
                } else {
                    clearFieldValidationState(input);
                }
            });

            if (hasEmptyFields) {
                e.preventDefault();
                return false;
            }

            // Lock button to prevent double submission
            applyButtonProcessingState(submitBtn);
        });
    }

    /**
     * Apply error styling and inline warning to an input field.
     * @param {HTMLInputElement} input
     */
    function applyFieldValidationError(input) {
        const inputWrapper = input.closest('.relative') || input.parentElement;
        const fieldContainer = inputWrapper.parentElement;

        input.classList.add('border-red-400', 'bg-red-50/40', 'ring-1', 'ring-red-200');

        // script for toggle password visibility
        function togglePassword(inputId, button) {
    const input = document.getElementById(inputId);
    if (!input) return;

    const isHidden = input.type === 'password';
    input.type = isHidden ? 'text' : 'password';

    const eyeIcon = button.querySelector('.icon-eye');
    const eyeOffIcon = button.querySelector('.icon-eye-off');

    if (eyeIcon && eyeOffIcon) {
        eyeIcon.classList.toggle('hidden', isHidden);
        eyeOffIcon.classList.toggle('hidden', !isHidden);
    }
}


        // Hide password toggle button when validation warning appears
        const toggleBtn = inputWrapper.querySelector('.password-toggle-btn, [onclick*="togglePassword"], #toggle-password-btn, #toggle-confirm-btn');
        if (toggleBtn) {
            toggleBtn.classList.add('hidden');
        }

        // Resolve field label for the error message
        const label = fieldContainer.querySelector('label');
        let fieldLabel = label ? label.innerText.replace('*', '').trim() : '';

        if (!fieldLabel) {
            const inputIdentifier = input.name || input.id;
            const labelMap = {
                email: 'Email',
                password: 'Password',
                password_confirmation: 'Konfirmasi Password',
                name: 'Nama Lengkap',
                otp: 'Kode Verifikasi',
            };
            fieldLabel = labelMap[inputIdentifier] || 'Kolom ini';
        }

        // Show inline error text below the input
        let errorParagraph = fieldContainer.querySelector('.field-client-error');
        if (!errorParagraph) {
            errorParagraph = document.createElement('p');
            errorParagraph.className = 'field-client-error text-xs text-red-500 mt-1.5 font-medium flex items-center gap-1';
            errorParagraph.innerHTML = `
                <svg class="w-3 h-3 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                </svg>
                <span>${fieldLabel} Wajib Diisi!</span>
            `;
            inputWrapper.insertAdjacentElement('afterend', errorParagraph);
        }

        // Add warning icon inside the input (at right-0 pr-3.5 since toggle is hidden)
        let warningIcon = inputWrapper.querySelector('.input-error-icon');
        if (!warningIcon) {
            warningIcon = document.createElement('div');
            warningIcon.className = 'input-error-icon absolute inset-y-0 right-0 pr-3.5 flex items-center pointer-events-none text-red-500';
            warningIcon.innerHTML = `
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                </svg>
            `;
            inputWrapper.appendChild(warningIcon);
        } else {
            warningIcon.classList.remove('hidden');
        }
    }

    /**
     * Clear error indicators after user corrects the input.
     * @param {HTMLInputElement} input
     */
    function clearFieldValidationState(input) {
        const inputWrapper = input.closest('.relative') || input.parentElement;
        const fieldContainer = inputWrapper.parentElement;

        input.classList.remove('border-red-400', 'bg-red-50/40', 'ring-1', 'ring-red-200');

        const clientError = fieldContainer.querySelector('.field-client-error');
        if (clientError) clientError.remove();

        const serverError = fieldContainer.querySelector('[id$="-error"]');
        if (serverError) serverError.remove();

        const warningIcons = inputWrapper.querySelectorAll('.input-error-icon');
        warningIcons.forEach((icon) => icon.remove());

        // Restore password toggle button when warning is cleared
        const toggleBtn = inputWrapper.querySelector('.password-toggle-btn, [onclick*="togglePassword"], #toggle-password-btn, #toggle-confirm-btn');
        if (toggleBtn) {
            toggleBtn.classList.remove('hidden');
        }
    }

    /**
     * Set button to a processing/loading state.
     * @param {HTMLButtonElement} submitBtn
     */
    function applyButtonProcessingState(submitBtn) {
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

        // Auto-restore if connection is slow
        setTimeout(() => {
            if (submitBtn.disabled && submitBtn.innerText.includes('Memproses')) {
                submitBtn.disabled = false;
                submitBtn.classList.remove('opacity-75', 'cursor-not-allowed', 'pointer-events-none');
                submitBtn.innerText = originalText;
            }
        }, CONFIG.SUBMIT_TIMEOUT_MS);
    }

    // =========================================================================
    // 2. SERVER THROTTLE SYNC (LARAVEL 429)
    // =========================================================================

    /** Detect and sync server-side throttle (HTTP 429) cooldown. */
    function syncServerThrottleErrors() {
        const errorNodes = document.querySelectorAll('.auth-rate-limit-warning, .text-red-500, .text-red-600, [id$="-error"]');
        let throttleSeconds = null;
        let targetForm = null;

        errorNodes.forEach((node) => {
            const message = node.textContent || '';
            const match = message.match(/(?:tunggu|dalam)\s+(\d+)\s*(?:detik|second)/i);
            if (match) {
                throttleSeconds = parseInt(match[1], 10);
                targetForm = node.closest('form') || document.querySelector('form');
            }
        });

        if (throttleSeconds && throttleSeconds > 0) {
            targetForm = targetForm || document.querySelector('form');
            if (!targetForm) return;

            const submitBtn = targetForm.querySelector('button[type="submit"]');
            if (submitBtn) {
                const pathKey = CONFIG.STORAGE_KEY_COOLDOWN_PREFIX + window.location.pathname;
                sessionStorage.setItem(pathKey, Date.now() + throttleSeconds * 1000);
                renderRateLimitWarning(targetForm, throttleSeconds);
                startSubmitCooldown(targetForm, submitBtn, throttleSeconds, pathKey);
            }
        }
    }

    /**
     * Render rate-limit warning text above the submit button.
     * @param {HTMLFormElement} form
     * @param {number} seconds
     */
    function renderRateLimitWarning(form, seconds) {
        if (!form) return;

        let warningElement = form.querySelector('.auth-rate-limit-warning');

        if (!warningElement) {
            warningElement = document.createElement('p');
            warningElement.className = 'auth-rate-limit-warning text-xs text-red-500 my-2 font-medium flex items-center gap-1.5 transition-all';
            warningElement.innerHTML = `
                <svg class="w-3.5 h-3.5 shrink-0 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                </svg>
                <span>Terlalu banyak permintaan! Harap tunggu <strong class="rate-limit-countdown-num underline">${seconds}</strong> detik sebelum mencoba lagi.</span>
            `;

            const submitWrapper = form.querySelector('button[type="submit"]')?.closest('div');
            if (submitWrapper) {
                form.insertBefore(warningElement, submitWrapper);
            } else {
                form.appendChild(warningElement);
            }
        } else {
            const numberSpan = warningElement.querySelector('.rate-limit-countdown-num');
            if (numberSpan) numberSpan.innerText = seconds;
            warningElement.classList.remove('hidden');
        }
    }

    /**
     * Run a countdown on the submit button and update the warning text.
     * @param {HTMLFormElement} form
     * @param {HTMLButtonElement} submitBtn
     * @param {number} durationSeconds
     * @param {string} storageKey
     */
    function startSubmitCooldown(form, submitBtn, durationSeconds, storageKey) {
        if (!submitBtn) return;

        const originalText = submitBtn.dataset.originalText || submitBtn.innerText.trim();

        submitBtn.disabled = true;
        submitBtn.classList.add('opacity-60', 'cursor-not-allowed', 'pointer-events-none');

        let remaining = durationSeconds;

        const updateDisplay = () => {
            submitBtn.innerHTML = `
                <span class="inline-flex items-center justify-center gap-1.5">
                    <svg class="w-4 h-4 text-white/90 animate-pulse" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>Coba lagi dalam <strong>${remaining}s</strong></span>
                </span>
            `;

            const warningElement = form.querySelector('.auth-rate-limit-warning');
            if (warningElement) {
                const numberSpan = warningElement.querySelector('.rate-limit-countdown-num');
                if (numberSpan) numberSpan.innerText = remaining;
            }
        };

        updateDisplay();

        if (submitBtn._countdownTimer) {
            clearInterval(submitBtn._countdownTimer);
        }

        submitBtn._countdownTimer = setInterval(() => {
            remaining--;

            if (remaining > 0) {
                updateDisplay();
            } else {
                clearInterval(submitBtn._countdownTimer);
                submitBtn._countdownTimer = null;

                if (storageKey) sessionStorage.removeItem(storageKey);

                submitBtn.disabled = false;
                submitBtn.classList.remove('opacity-60', 'cursor-not-allowed', 'pointer-events-none');
                submitBtn.innerText = originalText;

                const warningElement = form.querySelector('.auth-rate-limit-warning');
                if (warningElement) warningElement.remove();
            }
        }, 1000);
    }

    // =========================================================================
    // 3. PASSWORD VISIBILITY TOGGLE
    // =========================================================================

    /** Initialize show/hide password toggle buttons. */
    function initPasswordVisibilityToggles() {
        /**
         * @param {string} buttonId
         * @param {string} inputId
         * @param {string} eyeIconId
         * @param {string} eyeSlashIconId
         */
        const registerToggle = (buttonId, inputId, eyeIconId, eyeSlashIconId) => {
            const toggleButton = document.getElementById(buttonId);
            const targetInput = document.getElementById(inputId);
            const eyeIcon = document.getElementById(eyeIconId);
            const eyeSlashIcon = document.getElementById(eyeSlashIconId);

            if (!toggleButton || !targetInput) return;

            toggleButton.addEventListener('click', () => {
                const isCurrentlyPassword = targetInput.type === 'password';
                targetInput.type = isCurrentlyPassword ? 'text' : 'password';

                if (eyeIcon && eyeSlashIcon) {
                    eyeIcon.classList.toggle('hidden', isCurrentlyPassword);
                    eyeSlashIcon.classList.toggle('hidden', !isCurrentlyPassword);
                }
            });
        };

        registerToggle('toggle-password-btn', 'password', 'eye-icon-password', 'eye-slash-icon-password');
        registerToggle('toggle-confirm-btn', 'password_confirmation', 'eye-icon-confirm', 'eye-slash-icon-confirm');
    }

    // =========================================================================
    // 4. REAL-TIME PASSWORD STRENGTH CHECKER
    // =========================================================================

    /** Check new password against security criteria in real time. */
    function initPasswordCriteriaChecker() {
        const passwordInput = document.getElementById('password');
        const criteriaNodes = {
            length: document.getElementById('req-length'),
            uppercase: document.getElementById('req-uppercase'),
            number: document.getElementById('req-number'),
            nospace: document.getElementById('req-nospace'),
        };

        if (!passwordInput || !criteriaNodes.length) return;

        /**
         * Update the visual state of a single criterion.
         * @param {HTMLElement|null} element
         * @param {boolean} isSatisfied
         */
        const updateCriterionState = (element, isSatisfied) => {
            if (!element) return;
            const iconNode = element.querySelector('.req-icon');
            const textNode = element.querySelector('.req-text');

            if (isSatisfied) {
                if (iconNode) {
                    iconNode.className = 'req-icon w-3.5 h-3.5 rounded-full bg-emerald-500 border border-emerald-500 flex items-center justify-center shrink-0 text-white';
                    iconNode.innerHTML = `
                        <svg class="w-2.5 h-2.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                    `;
                }
                if (textNode) textNode.className = 'req-text text-emerald-600 font-medium';
            } else {
                if (iconNode) {
                    iconNode.className = 'req-icon w-3.5 h-3.5 rounded-full border border-slate-300 flex items-center justify-center shrink-0';
                    iconNode.innerHTML = '';
                }
                if (textNode) textNode.className = 'req-text text-slate-500';
            }
        };

        passwordInput.addEventListener('input', () => {
            const value = passwordInput.value;

            updateCriterionState(criteriaNodes.length, value.length >= 8);
            updateCriterionState(criteriaNodes.uppercase, /[A-Z]/.test(value));
            updateCriterionState(criteriaNodes.number, /[0-9]/.test(value));
            updateCriterionState(criteriaNodes.nospace, value.length > 0 && !/\s/.test(value));
        });
    }

    // =========================================================================
    // 5. OTP RESEND COOLDOWN
    // =========================================================================

    /** Manage cooldown timer for the OTP resend button. */
    function initOtpResendCooldown() {
        const resendButton = document.getElementById('resend-otp-btn');
        const resendForm = document.getElementById('resend-otp-form');

        if (!resendButton) return;

        let countdownTimer = null;

        /**
         * Update the resend button countdown display.
         * @param {number} expiryTimestamp
         */
        const updateResendCountdown = (expiryTimestamp) => {
            if (countdownTimer) clearInterval(countdownTimer);

            countdownTimer = setInterval(() => {
                const remainingSeconds = Math.max(0, Math.ceil((expiryTimestamp - Date.now()) / 1000));

                if (remainingSeconds > 0) {
                    resendButton.classList.add('pointer-events-none', 'text-slate-400');
                    resendButton.classList.remove('text-[#EF4444]', 'hover:text-[#DC2626]');
                    resendButton.innerText = `Kirim Ulang (${remainingSeconds}s)`;
                } else {
                    clearInterval(countdownTimer);
                    localStorage.removeItem(CONFIG.STORAGE_KEY_OTP_RESEND);
                    resendButton.classList.remove('pointer-events-none', 'text-slate-400');
                    resendButton.classList.add('text-[#EF4444]', 'hover:text-[#DC2626]');
                    resendButton.innerText = 'Kirim Ulang';
                }
            }, 1000);
        };

        // Restore saved cooldown on page refresh
        const savedExpiry = localStorage.getItem(CONFIG.STORAGE_KEY_OTP_RESEND);
        if (savedExpiry && parseInt(savedExpiry, 10) > Date.now()) {
            updateResendCountdown(parseInt(savedExpiry, 10));
        }

        resendButton.addEventListener('click', (e) => {
            const currentExpiry = localStorage.getItem(CONFIG.STORAGE_KEY_OTP_RESEND);
            if (currentExpiry && parseInt(currentExpiry, 10) > Date.now()) {
                e.preventDefault();
                return;
            }

            const newExpiry = Date.now() + CONFIG.OTP_RESEND_DURATION_SECONDS * 1000;
            localStorage.setItem(CONFIG.STORAGE_KEY_OTP_RESEND, newExpiry);

            if (resendForm) {
                e.preventDefault();
                resendForm.submit();
            }
        });
    }
})();

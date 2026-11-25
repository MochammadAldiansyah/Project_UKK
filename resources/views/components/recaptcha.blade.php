<div class="my-3">
    <div wire:ignore>
        <div id="recaptcha-widget" data-sitekey="{{ config('services.recaptcha.site_key') }}"></div>
    </div>

    @error('g-recaptcha-response')
        <p class="mt-1.5 text-xs text-red-500 font-medium">{{ $message }}</p>
    @enderror
</div>

@once
    <script>
        window.onloadRecaptchaCallback = function () {
            const widget = document.getElementById('recaptcha-widget');
            if (widget && widget.innerHTML.trim() === '') {
                grecaptcha.render(widget, {
                    sitekey: widget.dataset.sitekey,

                    });
            }
        };
    </script>
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadRecaptchaCallback&render=explicit" async defer></script>
@endonce

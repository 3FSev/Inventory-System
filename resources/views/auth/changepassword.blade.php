<html lang="en">
@include('theme/login-theme')
<body>
    <div class="portal">
        <div class="portal__wrapper">
            <form method="POST" action="" class="portal__wrapper__form">
                @csrf
                    <div class="portal__wrapper__form__wrapper">
                        <div class="portal__wrapper__form__wrapper__field__input">
                            <input type="password" id="old-password" class="js-input js-pass form-control @error('old-password') is-invalid @enderror" name="old-password" required autocomplete="current-password">
                            <label for="old-password">{{ __('Old Password') }}</label>
                            <img id="show-hide-old-pass" src="assets/showPass.svg" alt="">
                            @error('old-password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="portal__wrapper__form__wrapper__field__input">
                            <input type="password" id="new-password" class="js-input js-pass-2 form-control @error('new-password') is-invalid @enderror" name="new-password" required autocomplete="new-password">
                            <label for="new-password">{{ __('New Password') }}</label>
                            <img id="show-hide-pass" src="assets/showPass.svg" alt="">
                            @error('new-password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="portal__wrapper__form__wrapper__field__input">
                            <input type="password" id="confirm-password" class="js-input js-pass-3 form-control @error('confirm-password') is-invalid @enderror" name="confirm-password" required autocomplete="new-password">
                            <label for="confirm-password">{{ __('Confirm Password') }}</label>
                            <img id="show-hide-confirm-pass" src="assets/showPass.svg" alt="">
                            @error('confirm-password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="portal__wrapper__form__wrapper__field__button">
                            <button type="submit">{{ __('Register') }}</button>
                        </div>
                </form>
            </div>
        </div>
    </body>
</html>
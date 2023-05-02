<html lang="en">
@include('theme/login-theme')

<body>
    <div class="portal">
        <div class="portal__wrapper">
            <form method="POST" action="" class="portal__wrapper__form">
                @csrf
                <div class="portal__wrapper__form__wrapper">
                    <div class="logo-row">
                        <img src="assets/ormeco-logo.png" class="logo">
                    </div>
                    <div class="portal__wrapper__form__wrapper__title">
                        <h1><span>ORMECO </span>Accountability</h1>
                        <p>Register</p>
                    </div>

                    <div class="portal__wrapper__form__wrapper__field">
                        <div class="portal__wrapper__form__wrapper__field__input">
                            <input type="text" id="name"
                                class="js-input form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name') }}" required autocomplete="name">
                            <label for="name">{{ __('Name') }}</label>
                            @error('name')
                            <span class="error-message" role="alert">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                        <div class="portal__wrapper__form__wrapper__field__input">
                            <input type="email" id="email"
                                class="js-input form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email">
                            <label for="email">{{ __('Email Address') }}</label>
                            @error('email')
                            <span class="error-message" role="alert">
                               {{ $message }}
                            </span>
                            @enderror
                        </div>

                        <div class="portal__wrapper__form__wrapper__field__input">
                            <select name="department" id="department" class="js-input form-control" required>
                                <option value="" disabled selected></option>
                                @foreach($departments as $id => $name)
                                <option value="{{ $id }}">{{ $name }}</option>
                                @endforeach
                            </select>
                            <label for="department">{{ __('Department') }}</label>
                        </div>

                        <div class="portal__wrapper__form__wrapper__field__input">
                            <input type="password" id="password"
                                class="js-input js-pass form-control @error('password') is-invalid @enderror"
                                name="password" required autocomplete="new-password">
                            <label for="password">{{ __('Password') }}</label>
                            <img id="show-hide-pass" src="assets/showPass.svg" alt="">
                            @if ($errors->has('password'))
                                <div class="error-message">{{ $errors->first('password') }}</div>
                            @endif
                        </div>
                        <div class="portal__wrapper__form__wrapper__field__input">
                            <input type="password" id="password-confirm"
                                class="js-input js-pass-2 form-control @error('password') is-invalid @enderror"
                                name="password_confirmation" required autocomplete="new-password">
                            <label for="password-confirm">{{ __('Confirm Password') }}</label>
                            <img id="show-hide-confirm-pass-2" src="assets/showPass.svg" alt="">
                        </div>
                        <div class="portal__wrapper__form__wrapper__field__button">
                            <button type="submit">{{ __('Register') }}</button>
                        </div>
                        <p id="terms">Already have an account? <a href="{{ route('login') }}">{{ __('Login') }}</a>.</p>
                    </div>
            </form>
        </div>
    </div>
</body>

</html>

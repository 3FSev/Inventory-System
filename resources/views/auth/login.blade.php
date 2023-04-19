<html lang="en">
@include('theme/login-theme')
<body>
    <div class="portal">
        <div class="portal__wrapper">
            <form method="POST" action="{{ route('login') }}" class="portal__wrapper__form">
                @csrf
                <div class="portal__wrapper__form__wrapper">
                    <div class="logo-row">
                        <img src="assets/ormeco-logo.png" class="logo">
                    </div>
                    <div class="portal__wrapper__form__wrapper__title">
                        <h1><span>ORMECO </span>Warehouse</h1>
                        <p>Sign in</p>
                    </div>
                    <div class="portal__wrapper__form__wrapper__field">

                        <div class="portal__wrapper__form__wrapper__field__input">
                            <input type="email" id="email"
                                class="js-input form-control @error('email') is-invalid @enderror" name="email" required
                                autocomplete="email">
                            <label for="email">{{ __('Email Address') }}</label>
                        </div>
                        <div class="portal__wrapper__form__wrapper__field__input">
                            <input type="password" id="password"
                                class="js-input js-pass form-control @error('  ') is-invalid @enderror" name="password"
                                required autocomplete="current-password">
                            <label for="password">{{ __('Password') }}</label>
                            <img id="show-hide-pass" src="assets/showPass.svg" alt="">
                        </div>
                        @if (session('status'))
                            <div class="alert alert-danger">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="portal__wrapper__form__wrapper__field__button">
                            <button type="submit">{{ __('Login') }}</button>
                        </div>
                        <br>
                        <p id="terms">Don't have an account yet? <a
                                href="{{ route('register') }}">{{ __('Sign Up') }}</a>.</p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>

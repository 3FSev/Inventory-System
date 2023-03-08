<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ORMECO Warehouse</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/app.css">
    <script src="js/app.js" defer></script>
</head>
<body>
<div class="portal">
    <div class="portal__wrapper">
        <form method="POST" action="{{ route('login') }}" class="portal__wrapper__form">
            @csrf
                <div class="portal__wrapper__form__wrapper">
                    <div class="logo-row">
						<img src="assets/50-logo.png" class="logo">
					</div>
                    <div class="portal__wrapper__form__wrapper__title">
                        <h1><span>ORMECO </span>Warehouse</h1>
                        <p>Sign in</p>
                    </div>
                    <div class="portal__wrapper__form__wrapper__field">

                        <div class="portal__wrapper__form__wrapper__field__input">
                            <input type="email" id="email" class="js-input form-control @error('email') is-invalid @enderror" name="email" required autocomplete="email" autofocus>
                            <label for="email">{{ __('Email Address') }}</label>
                        </div>
                            <!-- <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> -->

                            <div class="portal__wrapper__form__wrapper__field__input">
                                <input type="password" id="password" class="js-input js-pass form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                <label for="password">{{ __('Password') }}</label>
                                <img id="show-hide-pass" src="assets/showPass.svg" alt="">
                                    @if (Route::has('password.request'))
                                        <a id="forgot-pass" href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                                    @endif
                            </div>

                            <!-- <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label> -->

                            <!-- <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> -->

                        <!-- <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div> -->

                        <div class="portal__wrapper__form__wrapper__field__button">
                            <button type="submit">{{ __('Login') }}</button>
                        </div>
                    <br>
                    <p id="terms">Don't have an account yet? <a href="{{ route('register') }}">{{ __('Sign Up') }}</a>.</p>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>

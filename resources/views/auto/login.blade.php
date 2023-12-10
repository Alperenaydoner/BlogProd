<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{ env('APP_NAME') }}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Login Form Template" name="keywords">
    <meta content="Login Form Template" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Stylesheet -->
    <link href="{{ asset('/assets/login/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <div class="wrapper login-3">
        <div class="container">
            <div class="col-right">
                <div class="login-form">
                    <h2>Login</h2>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email Adresi -->
                        <div class="mb-4">
                            <x-input-label for="email" :value="__('Email')" />
                            <input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Username">
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Şifre -->
                        <div class="mb-4">
                            <x-input-label for="password" :value="__('Password')" />
                            <input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <div>
                        <br>
                        </div>
                        <!-- Submit Butonu -->
                        <div class="mb-4">
                            <input class="btn" type="submit" value="Sign In" />
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</body>

</html>
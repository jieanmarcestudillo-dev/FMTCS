{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ml-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="{{ asset('/css/customerLogin.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{ URL('/image/frontend/FMTCS.jpg')}}" type="image/x-icon">
    <title>FMTCS</title>
    @include('global')
</head>
<body>
    <div class="back-image">
        <img src="{{ URL('/image/frontend/banner-2.jpg')}}">
    </div>
    <section class="left">
    </section>
    <section class="right">
        <section class="side register">
        </section>
        <section class="main login">
            <div class="container">
                <a class='homeButton' href="/" data-title='Back to Home?'><i class="bi bi-house"></i></a>
                <img class="img-thumbnail border-0 logo" src="{{ URL('/image/frontend/FMTCS.jpg')}}">
                <p class="title mt-lg-3">CUSTOMER PORTAL</p>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-floating mb-3">
                        <x-text-input class="form-control" placeholder="Email" id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username"/>
                        <label for="floatingInput" class="text-muted">Email</label>
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2 alert alert-danger" role="alert"/>
                    <div class="form-floating mb-3">
                        <x-text-input type="password" class="form-control" placeholder="Password" required id="password" name="password" required autocomplete="current-password" />
                        <label for="floatingInput" class="text-muted">Password</label>
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2 alert alert-danger" role="alert"/>
                    <div class="mb-3 checkBox">
                        <input type="checkbox" class="form-check-input ms-1" onclick="seePassword()">
                        <label class="form-check-label">Show Password</label>
                    </div>
                    <ul class="navbar-nav text-center">
                        <li class="nav-item"><a href="{{ route('password.request') }}" class="nav-link">Forgot Password?</a></li>
                    </ul>
                        <button type="submit" class="btn">LOGIN</button>
                    <ul class="navbar-nav text-center">
                        <li class="nav-item"><a href="/register" class="nav-link bottomLink">Create Your Account</a></li>
                    </ul>
                </form>
            </div>
        </section>
    </section>
</body>
</html>

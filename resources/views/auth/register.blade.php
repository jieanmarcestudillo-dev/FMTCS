{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="{{ asset('/css/customerSignUp.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{ URL('/image/frontend/FMTCS.jpg')}}" type="image/x-icon">
    <title>FMTCS</title>
    @include('global')
</head>
<body>
        <div class="back-image">
            <img src="{{ URL('/image/frontend/banner-2.jpg')}}">
        </div>
        <section class="left">
            <section class="side register"></section>
            <section class="main login">
                <div class="container">
                    <a class='homeButton2' href="/" data-title='Back to Home?'><i class="bi bi-house"></i></a>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <p class="title mt-lg-3">CREATE ACCOUNT</p>
                        <div class="mb-3">
                            <x-text-input id="name" class="block mt-1 w-full form-control rounded-0" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Customer Name"/>
                            <x-input-error :messages="$errors->get('name')" class="mt-2 alert alert-danger" role="alert" />
                        </div>
                        <div class="mb-3">
                            <x-text-input id="email" class="block mt-1 w-full form-control rounded-0" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="Email Address"/>
                            <x-input-error :messages="$errors->get('email')" class="mt-2 alert alert-danger" role="alert" />
                        </div>
                        <div class="mb-3">
                            <x-text-input id="password" class="block mt-1 w-full form-control rounded-0" type="password" name="password" required autocomplete="new-password" placeholder="Password"/>
                            <x-input-error :messages="$errors->get('password')" class="mt-2 alert alert-danger" role="alert" />
                        </div>
                        <div class="mb-3">
                            <x-text-input id="password_confirmation" class="block mt-1 w-full form-control rounded-0" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password"/>
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 alert alert-danger" role="alert" />
                        </div>
                        <div class="mb-3 checkBox">
                            <input type="checkbox" class="form-check-input ms-1" onclick="seePassword()">
                            <label class="form-check-label">Show Password</label>
                        </div>
                            <button type="submit" class="btn rounded-0">SUBMIT</button>
                        <ul class="navbar-nav text-center">
                            <li class="nav-item"><a href="/login" class="nav-link bottomLink">Already Have an Account?</a></li>
                        </ul>
                    </form>
                </div>
            </section>
        </section>
        <section class="right"></section>
</body>
</html> --}}


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="{{ asset('/css/customerSignUp.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{ URL('/image/frontend/FMTCS.jpg')}}" type="image/x-icon">
    <title>FMTCS</title>
    @include('global')
</head>
<body>
        <div class="back-image">
            <img src="{{ URL('/image/frontend/banner-2.jpg')}}">
        </div>
        <section class="right">
            <section class="side register"></section>
            <section class="main login">
                <div class="container text-center">
                    <a class='homeButton' href="/" data-title='Back to Home?'><i class="bi bi-house"></i></a>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <img class="img-thumbnail border-0 logo mt-lg-0 mt-5 pt-5" src="{{ URL('/image/frontend/FMTCS.jpg')}}">
                        <p class="title mt-lg-3">CREATE ACCOUNT</p>
                        <div class="mb-3">
                            <x-text-input id="name" class="block mt-1 w-full form-control rounded-0" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Customer Name"/>
                            <x-input-error :messages="$errors->get('name')" class="mt-2 alert alert-danger" role="alert" />
                        </div>
                        <div class="mb-3">
                            <x-text-input id="email" class="block mt-1 w-full form-control rounded-0" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="Email Address"/>
                            <x-input-error :messages="$errors->get('email')" class="mt-2 alert alert-danger" role="alert" />
                        </div>
                        <div class="mb-3">
                            <x-text-input id="password" class="block mt-1 w-full form-control rounded-0" type="password" name="password" required autocomplete="new-password" placeholder="Password"/>
                            <x-input-error :messages="$errors->get('password')" class="mt-2 alert alert-danger" role="alert" />
                        </div>
                        <div class="mb-3">
                            <x-text-input id="password_confirmation" class="block mt-1 w-full form-control rounded-0" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password"/>
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 alert alert-danger" role="alert" />
                        </div>
                        <div class="mb-3 checkBox text-start">
                            <input type="checkbox" class="form-check-input ms-1" onclick="seePassword()">
                            <label class="form-check-label">Show Password</label>
                        </div>
                            <button type="submit" class="btn rounded-0">SUBMIT</button>
                        <ul class="navbar-nav text-center">
                            <li class="nav-item"><a href="/login" class="nav-link bottomLink">Already Have an Account?</a></li>
                        </ul>
                    </form>
                </div>
            </section>
        </section>
</body>
</html>



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
                <p class="title mt-lg-3">ADMIN PORTAL</p>
                <form method="POST" action="{{ route('admin.login') }}">
                    @csrf
                    <div class="form-floating mb-3">
                        <x-text-input class="form-control" placeholder="Email" id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username"/>
                        <label for="floatingInput" class="text-muted">Email</label>
                    </div>
                    @if(session('valid_account') === 'not_valid')
                        <?php session()->forget('valid_account'); ?>
                        <div class="mt-2 alert alert-danger d-flex justify-content-start"> • Account not found</div>
                    @endif
                    <x-input-error :messages="$errors->get('email')" class="mt-2 alert alert-danger" role="alert"/>
                    <div class="form-floating mb-3">
                        <x-text-input type="password" class="form-control" placeholder="Password" required id="password" name="password" required autocomplete="current-password" />
                        <label for="floatingInput" class="text-muted">Password</label>
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2 alert alert-danger" role="alert"/>
                    <div class="mb-3 checkBox">
                        <input type="checkbox" class="form-check-input ms-1" onclick="loginPassword()">
                        <label class="form-check-label">Show Password</label>
                    </div>
                    <ul class="navbar-nav text-center">
                        <li class="nav-item"><a href="{{ route('password.request') }}" class="nav-link">Forgot Password?</a></li>
                    </ul>
                        <button type="submit" class="btn">LOGIN</button>
                </form>
            </div>
        </section>
    </section>

     <!-- JS -->
        <script src="{{ asset('/js/auth.js') }}"></script>
    <!-- JS -->
</body>
</html>

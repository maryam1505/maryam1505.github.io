<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ashion Template">
    <meta name="keywords" content="travel, e-commerece">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cultural Store :: {{ $title }}</title>

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600&family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('template/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('template/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('template/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('template/css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('template/css/magnific-popup.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('template/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('template/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('template/css/style.css') }}" type="text/css">
    <link rel="icon" href="{{asset('template/img/title-logo.png')}}" type="image/icon">
</head>

<body>
    <section class="auth__section">
        <div class="auth__container auth__child">
            <div class="auth__header section-title">
                <h4>Login</h4>
            </div>
            @error('status')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="contact__form auth__form">
                <form action="{{ route('user.check') }}" method="POST">
                    @if(session('message'))
                        <div class="alert alert-success">{{ session('message') }}</div>
                    @endif

                    @if(session('fail'))
                        <div class="alert alert-danger">{{ session('fail') }}</div>
                    @endif

                    @csrf
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" placeholder="Enter your email" value="{{ old('email') }}" required>
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Enter your password" required>
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <a href="#" class="forgot-pass">Forgot Password?</a>
                    </div>

                    <div class="account-signin mt-5">
                        <button type="submit" class="site-btn">Login</button>
                        <span>Not registered yet?<a href="{{ Route('register') }}">Register</a></span>
                    </div>
                </form>
            </div>
        </div>
        <div class="auth__banner auth__child">
            <div class="banner__img">
                <img src="{{asset('template/img/banner/auth-banner.png')}}" alt="Banner">
            </div>
        </div>
    </section>
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Document</title>
</head>

<body>
    <div class="container" id="container">
        <div class="form-container sign-up-container" id="RegisForm">
            <form id="regist-form" action="{{ route('visitor.register') }}" method="POST">
                @csrf
                <h1>Sign up</h1>
                <span>use your email for registration</span>
                <input type="text" placeholder="Name" name="name" required />
                <input type="email" placeholder="Email" name="email" required />
                <input type="password" placeholder="Password" name="password" required />
                <button type="submit">Sign Up</button>
            </form>
        </div>

        <div class="form-container sign-in-container" id="loginForm">
            <form id="login-form" action="{{ route('visitor.login') }}" method="POST">
                @csrf
                <h1>Sign in</h1>
                <input type="email" placeholder="Email" id="email" name="email" required />
                <input type="password" placeholder="Password" id="password" name="password" required />
                <a href="#">Forgot your password?</a>
                <button type="submit">Sign In</button>
            </form>

        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Selamat Datang Kembali!</h1>
                    <p>Untuk tetap terhubung dengan kami, silakan masuk dengan informasi pribadi Anda.</p>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Selamat Datang!</h1>
                    <p>Untuk update berita dan acara terbaru di kota, login dengan informasi pribadi Anda.</p>
                    <button class="ghost" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/login.js') }}"></script>
</body>

</html>
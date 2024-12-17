<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Keep head section lean -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://cdnjs.cloudflare.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}" media="print" onload="this.media='all'">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" media="print" onload="this.media='all'">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>TV Desa Kota Batu - Login</title>
</head>

<body>
    <!-- Single container structure -->
    <div class="container">
        <div class="form-container sign-up-container">
            <form action="{{ route('visitor.register') }}" method="POST">
                @csrf
                <h1>Sign up</h1>
                <input type="text" placeholder="Name" name="name" required>
                <input type="email" placeholder="Email" name="email" required>
                <input type="password" placeholder="Password" name="password" required>
                <button type="submit">Sign Up</button>
            </form>
        </div>

        <div class="form-container sign-in-container">
            <form action="{{ route('visitor.login') }}" method="POST">
                @csrf
                <h1>Sign in</h1>
                <input type="email" placeholder="Email" name="email" required>
                <input type="password" placeholder="Password" name="password" required>
                <button type="submit">Sign In</button>
            </form>
        </div>

        <!-- Simplified overlay structure -->
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Welcome!</h1>
                    <button class="ghost" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <div id="error-modal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <p id="error-message"></p>
        </div>
    </div>


</body>

</html>
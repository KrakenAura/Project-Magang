<!DOCTYPE html>
<html>

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Slide Navbar</title>
    <link rel="stylesheet" href="{{asset('css/adminlogin.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">

</head>

<body>
    <div class="main">
        <input type="checkbox" id="chk" aria-hidden="true">
        <div class="login">
            <form id="login-form" action="/admin/login" method="POST">
                <label for="chk" aria-hidden="true">Login</label>
                <input type="email" name="email" placeholder="Email" id="email" required="">
                <input type="password" id="password" name="pswd" placeholder="Password" required="">
                <button>Login</button>
            </form>
        </div>
        <div class="signup">
            <form>
                <label for="chk" aria-hidden="true">Signup</label>
                <input type="text" name="txt" placeholder="User name" required="">
                <input type="email" name="email" placeholder="Email" required="">
                <input type="password" name="pswd" placeholder="Password" required="">
                <button>Sign Up</button>
            </form>
        </div>

    </div>
    <script src="{{ asset('js/adminlogin.js') }}"></script>
</body>

</html>
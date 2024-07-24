<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Homepage')</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    @yield('css')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />

    <title>TV Desa Batu</title>
</head>

<body>
    <!-- Navbar -->
    <nav id="hamburger-nav">
        <img class="logo" src="{{ asset('images/logo tvd.png') }}" alt="">
        <div class="hamburger-menu">
            <div class="hamburger-icon" onclick="toggleMenu()">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <span class="menu-text" onclick="toggleMenu()">Menu</span>
            <div class="menu-links">
                <li><a href="#about" onclick="toggleMenu()">About</a></li>
                <li><a href="#experience" onclick="toggleMenu()">Experience</a></li>
                <li><a href="#projects" onclick="toggleMenu()">Projects</a></li>
                <li><a href="#contact" onclick="toggleMenu()">Contact</a></li>
                <!-- Conditional display for authentication status -->
                @if(Auth::check())
                <li>
                    <span>Hi, {{ Auth::user()->name }}</span>
                </li>
                <li>
                    <a href="{{ route('api.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                @else
                <li><a href="{{ route('login') }}">Login</a></li>
                @endif
            </div>
        </div>
    </nav>


    @yield('content')

    <footer>
        <div class="column left-column">
            <div class="left-card">
                <h3>Komunitas Informasi Masyarakat Kota Batu</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eu turpis molestie, dictum est a, mattis tellus. Sed dignissim, metus nec fringilla accumsan, risus sem sollicitudin lacus, ut interdum tellus elit sed risus.</p>
            </div>
        </div>
        <div class="column center-column">
            <div class="mid-card">
                <h3>Another Section</h3>
                <p>Additional content for the center column. You can put any information or links here.</p>
            </div>
        </div>
        <div class="column right-column">
            <div class="right-card">
                <h3>Contact Information</h3>
                <p>Address: 1234 Street Name, City, Country. Phone: (123) 456-7890. Email: info@example.com.</p>
            </div>
        </div>
    </footer>
    <script src="{{ asset('js/auth.js') }}" defer></script>
    <script src=" {{asset('js/script.js')}}"></script>
</body>

</html>
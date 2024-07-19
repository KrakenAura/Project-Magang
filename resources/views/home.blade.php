<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/home.css')}}">
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
            </div>
        </div>
    </nav>

    <!-- Carousel -->
    <section class="container">
        <div class="slider-wrapper">
            <div class="slider">
                <img id="slide-1" src="{{asset('images/slide1.png')}}" alt="">
                <img id="slide-2" src="{{asset('images/slide1.png')}}" alt="">
                <img id="slide-3" src="{{asset('images/slide1.png')}}" alt="">
            </div>
            <div class="slider-nav">
                <a href="#slide-1"></a>
                <a href="#slide-2"></a>
                <a href="#slide-3"></a>
            </div>
        </div>
    </section>

    <!-- Primary Banner -->
    <div class="banner">
        <img src="{{asset('images/banner.png')}}" alt="">
    </div>

    <!-- Content -->
    <div class="content">
        <div class="column primary-column">
            <p><span class="low-highlight">Berita Terbaru &nbsp; &nbsp;</span></p>
            <div class="news">
                <img src="{{asset('images/slide1.png')}}" alt="">
            </div>
        </div>

        <div class="column secondary-column">
            <h2>Testing</h2>
        </div>
    </div>

    <script src="{{asset('js/script.js')}}"></script>
</body>

</html>
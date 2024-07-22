<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/galeri.css')}}">
    <title>Document</title>
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

    <h1>Galeri</h1>
    <div class="content">
        <div class="card galery-card">
            <div class="card-image">
                <img src="{{asset('images/news 4.png')}}" alt="">
            </div>
            <div class="card-desc">
                <h4>Image Description</h4>
            </div>
        </div>
        <div class="card galery-card">
            <div class="card-image">
                <img src="{{asset('images/news 4.png')}}" alt="">
            </div>
            <div class="card-desc">
                <h4>Image Description</h4>
            </div>
        </div>
        <div class="card galery-card">
            <div class="card-image">
                <img src="{{asset('images/news 4.png')}}" alt="">
            </div>
            <div class="card-desc">
                <h4>Image Description</h4>
            </div>
        </div>
    </div>
</body>

</html>
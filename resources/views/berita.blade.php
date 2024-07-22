<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/berita.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
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
    <script src="{{asset('js/script.js')}}"></script>

    <div class="news-card">
        <img src="{{asset('images/news 1.png')}}" alt="News Image" class="news-card-image">
        <div class="news-card-content">
            <p class="kategori">Berita Populer</p>
            <a href="#" class="news-card-title">TIM VOLLY DESA PESANGGRAHAN LOLOS KE BABAK SEMIFINAL KAPOLRES CUP 2024</a>
            <p class="news-card-description">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quasi, reiciendis necessitatibus voluptas perspiciatis mollitia ducimus laboriosam nostrum illum expedita veniam impedit libero voluptate molestiae et magnam voluptates quisquam! Tenetur, numquam.</p>
        </div>
    </div>

</html>
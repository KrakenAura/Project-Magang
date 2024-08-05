<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Homepage')</title>
    <link rel="stylesheet" href="{{asset('css/navbar.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script src="https://unpkg.com/feather-icons"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('css')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


    <title>TV Desa Batu</title>
</head>

<body>
    <!-- Navbar -->
    <!-- <nav id="hamburger-nav">
        <img class="logo" src="{{ asset('images/logo tvd.png') }}" alt="">
        <div class="hamburger-menu">
            <div class="hamburger-icon" onclick="toggleMenu()">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <span class="menu-text" onclick="toggleMenu()">Menu</span>
            <div class="menu-links">
    <li><a href="/berita" onclick="toggleMenu()">Berita</a></li>
    <li><a href="/galeri" onclick="toggleMenu()">Galeri</a></li>
    <li><a href="/tentang-kami" onclick="toggleMenu()">Tentang Kami</a></li>
    <li><a href="/tautan" onclick="toggleMenu()">Tautan</a></li>
    <li><a href="/download" onclick="toggleMenu()">Download</a></li>
    @if(Auth::check())
    <li>
        <span>Hi, {{ Auth::user()->name }}</span>
    </li>
    <li>
        <a href="{{ route('visitor.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
    </li>
    <form id="logout-form" action="{{ route('visitor.logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    @else
    <li><a href="{{ route('login') }}" data-feather="log-in">Login</a></li>
    @endif
    <li><a href="/berita" onclick="toggleMenu()">Berita</a></li>
    <li><a href="/galeri" onclick="toggleMenu()">Galeri</a></li>
    <li><a href="/tentang-kami" onclick="toggleMenu()">Tentang Kami</a></li>
    <li><a href="/tautan" onclick="toggleMenu()">Tautan</a></li>
    <li><a href="/download" onclick="toggleMenu()">Download</a></li>
    </div>
    </div>
    </nav> -->
    <header class="header">
        <nav class="nav container">
            <div class="nav__data">
                <img class="logo" src="{{ asset('images/logo tvd.png') }}" alt="Logo">
                <div class="nav__toggle" id="nav-toggle">
                    <i class="ri-menu-line nav__burger"></i>
                    <i class="ri-close-line nav__close"></i>
                </div>
            </div>


            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">

                    <li class="dropdown__item">
                        <div class="nav__link">
                            Informasi <i class="ri-arrow-down-s-line dropdown__arrow"></i>
                        </div>
                        <ul class="dropdown__menu">
                            <li>
                                <a href="/kotaterkini" class="dropdown__link">
                                    <i class="ri-building-2-line"></i>Kota Terkini
                                </a>
                            </li>

                            <li>
                                <a href="/layananpublik" class="dropdown__link"><i class="ri-earth-line"></i> Layanan Publik
                                </a>
                            </li>
                            <li>
                                <a href="/kabarbalaikota" class="dropdown__link"><i class="ri-government-line"></i>Kabar BalaiKota
                                </a>
                            </li>
                            <li>
                                <a href="/citizen" class="dropdown__link"><i class="ri-group-line"></i>Citizen Journalist
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li><a href="/library" class="nav__link">Library</a></li>


                    <li><a href="/warga-bicara" class="nav__link">Warga Bicara</a></li>
                    <li><a href="/contactus" class="nav__link">Contact</a></li>
                    <li class="dropdown__item">
                        <div class="nav__link">
                            Tentang Kami <i class="ri-arrow-down-s-line dropdown__arrow"></i>
                        </div>

                        <ul class="dropdown__menu">
                            <li>
                                <a href="#" class="dropdown__link">
                                    <i class="ri-user-line"></i> Profil
                                </a>
                            </li>

                            <li>
                                <a href="/galeri" class="dropdown__link">
                                    <i class="ri-lock-line"></i> Gallery
                                </a>
                            </li>

                            <li>
                                <a href="/programtv" class="dropdown__link">
                                    <i class="ri-message-3-line"></i> Program TV Desa
                                </a>
                            </li>
                        </ul>
                    </li>
                    @if(Auth::check())
                    <li>
                        <div class="logout-div">
                            <a class="button" href=" {{ route('visitor.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit()">
                                <i class=" fas fa-sign-out-alt"></i>
                                <div class="logout">LOGOUT</div>
                            </a>
                            <form id="logout-form" action="{{ route('visitor.logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @else
                    <li><a href="{{ route('login') }}" class="nav__link">Login</a></li>
                    @endif

                </ul>
            </div>
        </nav>
    </header>
    @yield('content')

    <footer>
        <div class="column left-column">
            <div class="left-card">
                <h3>TV Desa Kota Batu</h3>
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
    <script>
        feather.replace();
    </script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/auth.js') }}" defer></script>
    <script src=" {{asset('js/script.js')}}"></script>
    @yield('script')
</body>

</html>
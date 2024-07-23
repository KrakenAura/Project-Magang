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
    <div class="page-title">Berita Popular</div>
    <div class="container">
        <div class="column column-left">
            <div class="news-card1">
                <img src="{{asset('images/news 1.png')}}" alt="News Image" class="news-card1-image">
                <div class="news-card-content">
                    <p class="kategori">Berita Populer</p>
                    <a href="#" class="news-card-title">TIM VOLLY DESA PESANGGRAHAN LOLOS KE BABAK SEMIFINAL KAPOLRES CUP 2024</a>
                    <p class="news-card-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eu turpis molestie, dictum est a, mattis tellus. Sed dignissim, metus nec fringilla accumsan, risus sem sollicitudin lacus, ut interdum tellus elit sed risus. Maecenas eget condimentum velit, sit amet feugiat lectus. Class aptent taciti sociosqu ad litora torquent per conubia nostra.</p>
                    <div class="news-footer">
                        <span>Admin</span>
                        <span>. 12th July, 2024</span>
                    </div>
                </div>
            </div>


            <div class="news-card2">
                <img src="{{asset('images/news 2.png')}}" alt="News Image" class="news-card2-image">
                <div class="news-card-content2">
                    <p class="kategori">Berita Populer</p>
                    <a href="#" class="news-card-title">TIM VOLLY DESA PESANGGRAHAN LOLOS KE BABAK SEMIFINAL KAPOLRES CUP 2024</a>
                    <div class="news-footer">
                        <span>Admin</span>
                        <span>. 12th July, 2024</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="column column-right">
            <div class="column column-left">
                <div class="news-card3">
                    <img src="{{asset('images/news 3.png')}}" alt="News Image" class="news-card3-image">
                    <div class="news-card-content">
                        <p class="kategori">Berita Populer</p>
                        <a href="#" class="news-card-title">TIM VOLLY DESA PESANGGRAHAN LOLOS KE BABAK SEMIFINAL KAPOLRES CUP 2024</a>
                        <p class="news-card-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eu turpis molestie, dictum est a, mattis tellus. Sed dignissim, metus nec fringilla accumsan, risus sem sollicitudin lacus, ut interdum tellus elit sed risus. Maecenas eget condimentum velit, sit amet feugiat lectus. Class aptent taciti sociosqu ad litora torquent per conubia nostra.</p>
                        <div class="news-footer">
                            <span>Admin</span>
                            <span>. 12th July, 2024</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="news-section">
        <div class="section-content news">
            <div class="title">
                <h2>Berita Terbaru</h2>
            </div>
            <div class="cards">
                <div class="card">
                    <div class="image-section">
                        <img src="{{asset('images/news 1.png')}}">
                    </div>
                    <div class="article">
                        <div class="metadata">
                            <h5>admin</h5>
                            <h5>12th July, 2024 </h5>
                        </div>
                        <h4>Title</h4>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Et hic eaque itaque repudiandae temporibus, modi consequuntur ipsum sequi doloribus veniam, deserunt possimus, quam iusto iure vero nulla fugiat tempore autem.</p>
                    </div>
                    <div class="news-view">
                        <a href="#" class="button">Selengkapnya</a>
                    </div>
                </div>
                <div class="card">
                    <div class="image-section">
                        <img src="{{asset('images/news 1.png')}}">
                    </div>
                    <div class="article">
                        <div class="metadata">
                            <h5>admin</h5>
                            <h5>12th July, 2024 </h5>
                        </div>
                        <h4>Title</h4>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Et hic eaque itaque repudiandae temporibus, modi consequuntur ipsum sequi doloribus veniam, deserunt possimus, quam iusto iure vero nulla fugiat tempore autem.</p>
                    </div>
                    <div class="news-view">
                        <a href="#" class="button">Selengkapnya</a>
                    </div>
                </div>
                <div class="card">
                    <div class="image-section">
                        <img src="{{asset('images/news 1.png')}}">
                    </div>
                    <div class="article">
                        <div class="metadata">
                            <h5>admin</h5>
                            <h5>12th July, 2024 </h5>
                        </div>
                        <h4>Title</h4>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Et hic eaque itaque repudiandae temporibus, modi consequuntur ipsum sequi doloribus veniam, deserunt possimus, quam iusto iure vero nulla fugiat tempore autem.</p>
                    </div>
                    <div class="news-view">
                        <a href="" class="button">Selengkapnya</a>

                    </div>
                </div>
            </div>
        </div>
        <div class="news-section">

        </div>
        <div class="section-content news">
            <div class="cards">
                <div class="card">
                    <div class="image-section">
                        <img src="{{asset('images/news 1.png')}}">
                    </div>
                    <div class="article">
                        <div class="metadata">
                            <h5>admin</h5>
                            <h5>12th July, 2024 </h5>
                        </div>
                        <h4>Title</h4>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Et hic eaque itaque repudiandae temporibus, modi consequuntur ipsum sequi doloribus veniam, deserunt possimus, quam iusto iure vero nulla fugiat tempore autem.</p>
                    </div>
                    <div class="news-view">
                        <a href="#" class="button">Selengkapnya</a>
                    </div>
                </div>
                <div class="card">
                    <div class="image-section">
                        <img src="{{asset('images/news 1.png')}}">
                    </div>
                    <div class="article">
                        <div class="metadata">
                            <h5>admin</h5>
                            <h5>12th July, 2024 </h5>
                        </div>
                        <h4>Title</h4>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Et hic eaque itaque repudiandae temporibus, modi consequuntur ipsum sequi doloribus veniam, deserunt possimus, quam iusto iure vero nulla fugiat tempore autem.</p>
                    </div>
                    <div class="news-view">
                        <a href="#" class="button">Selengkapnya</a>
                    </div>
                </div>
                <div class="card">
                    <div class="image-section">
                        <img src="{{asset('images/news 1.png')}}">
                    </div>
                    <div class="article">
                        <div class="metadata">
                            <h5>admin</h5>
                            <h5>12th July, 2024 </h5>
                        </div>
                        <h4>Title</h4>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Et hic eaque itaque repudiandae temporibus, modi consequuntur ipsum sequi doloribus veniam, deserunt possimus, quam iusto iure vero nulla fugiat tempore autem.</p>
                    </div>
                    <div class="news-view">
                        <a href="" class="button">Selengkapnya</a>

                    </div>
                </div>
            </div>
        </div>
        <div class="news-section">

        </div>
    </div>

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
    <script src="{{asset('js/script.js')}}"></script>
</body>

</html>
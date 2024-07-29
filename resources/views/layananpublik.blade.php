@extends('layouts')

@section('css')
<link rel="stylesheet" href="{{asset('css/berita.css')}}">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
@endsection

@section('content')

<div class="page-title">Layanan Publik</div>
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

@endsection

</html>
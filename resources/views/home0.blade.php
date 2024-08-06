@extends('layouts')

@section('css')
<link rel="stylesheet" href="{{asset('css/Bighome.css')}}">
<link rel="stylesheet" href="{{asset('css/Smallhome.css')}}">
@endsection

@section('content')

<!-- Carousel -->
<section class="carousel-container">
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

<div class="banner">
    <div class="banner-tv">
        <div class="banner-tv-content">
            <div class="image-section">
                <img src="{{asset('images/banner1.jpg')}}">
            </div>
        </div>
        <div class="banner-tv-content">
            <div class="image-section">
                <img src="{{asset('images/banner2.jpg')}}">
            </div>
        </div>
        <div class="banner-tv-content">
            <div class="image-section">
                <img src="{{asset('images/banner3.jpg')}}">
            </div>
        </div>
        <div class="banner-tv-content">
            <div class="image-section">
                <img src="{{asset('images/banner4.jpg')}}">
            </div>
        </div>
        <div class="banner-tv-content">
            <div class="image-section">
                <img src="{{asset('images/banner5.jpeg')}}">
            </div>
        </div>
        <div class="banner-tv-content">
            <div class="image-section">
                <img src="{{asset('images/banner6.jpg')}}">
            </div>
        </div>
    </div>
</div>
<!-- Content -->
<div class="main-container">
    <div class="content">
        <div class="column primary-column">
            <p><span class="low-highlight">Berita Terbaru &nbsp; &nbsp;</span></p>
            <div class="news">
                <img src="{{asset('images/slide1.png')}}" alt="">
                <h2>Tim Volly Desa Pesanggrahan Lolos ke Babak Semi Final Kapolres Cup 2023</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eu turpis molestie, dictum est a, mattis tellus. Sed dignissim, metus nec fringilla accumsan, risus sem sollicitudin lacus, ut interdum tellus elit sed risus. Maecenas eget condimentum velit, sit amet feugiat lectus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent auctor purus luctus enim egestas, ac scelerisque ante pulvinar. Donec ut rhoncus ex. Suspendisse ac rhoncus nisl, eu tempor urna. Curabitur vel bibendum lorem. Morbi convallis convallis diam sit amet lacinia. Aliquam in elementum tellus.</p>
            </div>
            <div class="news-view">
                <a href="#" class="button">Selengkapnya</a>
            </div>
            <hr>
            <div class="news">
                <img src="{{asset('images/slide1.png')}}" alt="">
                <h2>Tim Volly Pesanggrahan Lolos ke Babak Semi Final Kapolres Cup 2023</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eu turpis molestie, dictum est a, mattis tellus. Sed dignissim, metus nec fringilla accumsan, risus sem sollicitudin lacus, ut interdum tellus elit sed risus. Maecenas eget condimentum velit, sit amet feugiat lectus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent auctor purus luctus enim egestas, ac scelerisque ante pulvinar. Donec ut rhoncus ex. Suspendisse ac rhoncus nisl, eu tempor urna. Curabitur vel bibendum lorem. Morbi convallis convallis diam sit amet lacinia. Aliquam in elementum tellus.</p>
            </div>
            <div class="news-view">
                <a href="#" class="button">Selengkapnya</a>
            </div>
            <p><span class="low-highlight">Live Stream Terbaru &nbsp; &nbsp;</span></p>
            <div class="iframe-container">
                <iframe width="75%" height="35%" src="https://www.youtube.com/embed/kT_DjMT3EvE?si=YVARlxSnvEsPap58" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
        </div>

        <!-- Secondary Column -->
        <div class="column secondary-column">
            <div class="card card-tv">
                <p><span class="low-highlight"><strong>TV Desa</strong> Kota Batu&nbsp; &nbsp;</span></p>
                <div class="container">
                    <img src="{{ asset('images/logo tvd.png') }}" alt="">
                    <p>TV Oro-Oro Ombo</p>
                </div>
                <div class="container">
                    <img src="{{ asset('images/logo tvd.png') }}" alt="">
                    <p>TV Pesanggrahan</p>
                </div>
                <div class="container">
                    <img src="{{ asset('images/logo tvd.png') }}" alt="">
                    <p>TV Sidomulyo</p>
                </div>
                <div class="container">
                    <img src="{{ asset('images/logo tvd.png') }}" alt="">
                    <p>TV Sumberjo</p>
                </div>
                <div class="container">
                    <img src="{{ asset('images/logo tvd.png') }}" alt="">
                    <p>TV Bulukerto</p>
                </div>
                <div class="container">
                    <img src="{{ asset('images/logo tvd.png') }}" alt="">
                    <p>TV Bumiaji</p>
                </div>
                <div class="container">
                    <img src="{{ asset('images/logo tvd.png') }}" alt="">
                    <p>TV Giripurno</p>
                </div>
                <div class="container">
                    <img src="{{ asset('images/logo tvd.png') }}" alt="">
                    <p>TV Gunungsari</p>
                </div>
                <div class="container">
                    <img src="{{ asset('images/logo tvd.png') }}" alt="">
                    <p>TV Pandanrejo</p>
                </div>
                <div class="container">
                    <img src="{{ asset('images/logo tvd.png') }}" alt="">
                    <p>TV Punten</p>
                </div>
                <div class="container">
                    <img src="{{ asset('images/logo tvd.png') }}" alt="">
                    <p>TV Sumber Brantas</p>
                </div>
                <div class="container">
                    <img src="{{ asset('images/logo tvd.png') }}" alt="">
                    <p>TV Sumbergondo</p>
                </div>
                <div class="container">
                    <img src="{{ asset('images/logo tvd.png') }}" alt="">
                    <p>TV Tulungrejo</p>
                </div>
                <div class="container">
                    <img src="{{ asset('images/logo tvd.png') }}" alt="">
                    <p>TV Beji</p>
                </div>
                <div class="container">
                    <img src="{{ asset('images/logo tvd.png') }}" alt="">
                    <p>TV Junrejo</p>
                </div>
                <div class="container">
                    <img src="{{ asset('images/logo tvd.png') }}" alt="">
                    <p>TV Mojorejo</p>
                </div>
                <div class="container">
                    <img src="{{ asset('images/logo tvd.png') }}" alt="">
                    <p>TV Pendem</p>
                </div>
                <div class="container">
                    <img src="{{ asset('images/logo tvd.png') }}" alt="">
                    <p>TV Tlekung</p>
                </div>
                <div class="container">
                    <img src="{{ asset('images/logo tvd.png') }}" alt="">
                    <p>TV Torongrejo</p>
                </div>
                <div class="container">
                    <img src="{{ asset('images/logo tvd.png') }}" alt="">
                    <p>TV Ngaglik</p>
                </div>
                <div class="container">
                    <img src="{{ asset('images/logo tvd.png') }}" alt="">
                    <p>TV Sisir</p>
                </div>
                <div class="container">
                    <img src="{{ asset('images/logo tvd.png') }}" alt="">
                    <p>TV Songgokerto</p>
                </div>
                <div class="container">
                    <img src="{{ asset('images/logo tvd.png') }}" alt="">
                    <p>TV Temas</p>
                </div>
                <div class="container">
                    <img src="{{ asset('images/logo tvd.png') }}" alt="">
                    <p>TV Dadaprejo</p>
                </div>


            </div>

        </div>
    </div>
</div>
@endsection
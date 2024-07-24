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
<!-- Content -->
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
            <h2>Tim Volly Desa Pesanggrahan Lolos ke Babak Semi Final Kapolres Cup 2023</h2>
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
            <p><span class="low-highlight">TV Desa Kota Batu &nbsp; &nbsp;</span></p>
            <div class="container">
                <img src="{{ asset('images/logo tvd.png') }}" alt="">
                <p>TV Desa Oro-Oro Ombo</p>
            </div>
            <div class="container">
                <img src="{{ asset('images/logo tvd.png') }}" alt="">
                <p>TV Desa Pesanggrahan</p>
            </div>
            <div class="container">
                <img src="{{ asset('images/logo tvd.png') }}" alt="">
                <p>TV Desa Sidomulyo</p>
            </div>
            <div class="container">
                <img src="{{ asset('images/logo tvd.png') }}" alt="">
                <p>TV Desa Sumberjo</p>
            </div>
            <div class="container">
                <img src="{{ asset('images/logo tvd.png') }}" alt="">
                <p>TV Desa Bulukerto</p>
            </div>
            <div class="container">
                <img src="{{ asset('images/logo tvd.png') }}" alt="">
                <p>TV Desa Bumiaji</p>
            </div>
            <div class="container">
                <img src="{{ asset('images/logo tvd.png') }}" alt="">
                <p>TV Desa Giripurno</p>
            </div>
            <div class="container">
                <img src="{{ asset('images/logo tvd.png') }}" alt="">
                <p>TV Desa Gunungsari</p>
            </div>
            <div class="container">
                <img src="{{ asset('images/logo tvd.png') }}" alt="">
                <p>TV Desa Pandanrejo</p>
            </div>
            <div class="container">
                <img src="{{ asset('images/logo tvd.png') }}" alt="">
                <p>TV Desa Punten</p>
            </div>
            <div class="container">
                <img src="{{ asset('images/logo tvd.png') }}" alt="">
                <p>TV Desa Sumber Brantas</p>
            </div>
            <div class="container">
                <img src="{{ asset('images/logo tvd.png') }}" alt="">
                <p>TV Desa Sumbergondo</p>
            </div>
            <div class="container">
                <img src="{{ asset('images/logo tvd.png') }}" alt="">
                <p>TV Desa Tulungrejo</p>
            </div>
            <div class="container">
                <img src="{{ asset('images/logo tvd.png') }}" alt="">
                <p>TV Desa Beji</p>
            </div>
            <div class="container">
                <img src="{{ asset('images/logo tvd.png') }}" alt="">
                <p>TV Desa Junrejo</p>
            </div>
            <div class="container">
                <img src="{{ asset('images/logo tvd.png') }}" alt="">
                <p>TV Desa Mojorejo</p>
            </div>
            <div class="container">
                <img src="{{ asset('images/logo tvd.png') }}" alt="">
                <p>TV Desa Pendem</p>
            </div>
            <div class="container">
                <img src="{{ asset('images/logo tvd.png') }}" alt="">
                <p>TV Desa Tlekung</p>
            </div>
            <div class="container">
                <img src="{{ asset('images/logo tvd.png') }}" alt="">
                <p>TV Desa Torongrejo</p>
            </div>
            <div class="container">
                <img src="{{ asset('images/logo tvd.png') }}" alt="">
                <p>TV Desa Ngaglik</p>
            </div>
            <div class="container">
                <img src="{{ asset('images/logo tvd.png') }}" alt="">
                <p>TV Desa Sisir</p>
            </div>
            <div class="container">
                <img src="{{ asset('images/logo tvd.png') }}" alt="">
                <p>TV Desa Songgokerto</p>
            </div>
            <div class="container">
                <img src="{{ asset('images/logo tvd.png') }}" alt="">
                <p>TV Desa Temas</p>
            </div>
            <div class="container">
                <img src="{{ asset('images/logo tvd.png') }}" alt="">
                <p>TV Desa Dadaprejo</p>
            </div>


        </div>
        <div class="chat-container">
            <div class="chat-header">
                <h2>Live Chat</h2>
            </div>
            <div class="chat-box">
                <div class="message received">
                    <p>Hello! How can I help you today?</p>
                    <span class="time">10:00 AM</span>
                </div>
                <div class="message sent">
                    <p>Hi, I have a question about your services.</p>
                    <span class="time">10:02 AM</span>
                </div>
            </div>
            <div class="chat-input">
                <input type="text" placeholder="Type your message...">
                <button>Send</button>
            </div>
        </div>
    </div>
</div>
@endsection
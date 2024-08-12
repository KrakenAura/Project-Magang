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
            @foreach ( $slideshows as $slideshow )

            <img id="slide" src="{{ asset('storage/' . $slideshow->image_path) }}" alt="">

            @endforeach
        </div>
    </div>
</section>

<div class="banner">
    <div class="banner-tv">
        @foreach ($outlooks as $outlook)
        <div class="banner-tv-content">
            <div class="image-section">
                <a href="{{ $outlook->link }}" target="_blank"><img src="{{ asset('storage/' . $outlook->image) }}"></a>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Content -->
<div class="main-container">
    <div class="content">
        <div class="column primary-column">
            <div class="header-content">
                <p><span class="content-title">Berita Terbaru</span></p>
            </div>

            @foreach ($latestNews as $berita)
            <div class="news">
                <img src="{{ asset('storage/' . $berita->image) }}" alt="News Image" class="news-card1-image">
                <h2>{{$berita->title}}</h2>
                <p>{{$berita->teaser}}</p>
            </div>
            <div class="news-view">
                <a href="{{ route('berita.view', $berita->id) }}" class="button">Selengkapnya</a>
            </div>
            <hr>
            @endforeach
            <div class="ads-banner2">
                <div class="image-ads2">
                    <img src="{{ asset('images/banner.png') }}" alt="">
                </div>
            </div>
            <div class="header-content">
                <p><span class="content-title">Live Stream Terbaru &nbsp; &nbsp;</span></p>
            </div>
            <div class="iframe-container">
                <iframe width="75%" height="35%" src="{{$livestream->stream_url}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                <iframe width="560" height="315" src="https://www.youtube.com/embed/zQ4xR8hXQjQ?si=WFe0ApkHY8A6Dmmw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>

        </div>

        <!-- Secondary Column -->
        <div class="column secondary-column">
            <div class="header-content">
                <p><span class="content-title"><strong>TV Desa</strong> Kota Batu</span></p>
            </div>
            <div class="card card-tv">
                @foreach ($socials as $social)
                <div class="tv-desa">
                    <a href="{{ $social->link_yt }}" target="_blank">
                        <img src="{{ asset('storage/' . $social->logo) }}" alt="{{ $social->nama_tv }}">
                    </a>
                    <p>{{$social->nama_tv}}</p>
                </div>
                @endforeach
            </div>
            <div class="ads-banner1">
                <div class="image-ads1">
                    <img src="{{ asset('images/banner1.jpg') }}" alt="">
                </div>
            </div>
            <div class="header-content">
                <p><span class="content-title">Berita Lainya</span></p>
            </div>
            <div class="news-card">
                <div class="news-card-content">
                    <div class="news-card-image-wrapper">
                        <img src="{{asset('images/news 1.png')}}" alt="News Image" class="news-card-image">
                    </div>
                    <div class="news-card-text-wrapper">

                        <a href="#" class="news-card-title">TIM VOLLY DESA PESANGGRAHAN LOLOS KE BABAK SEMIFINAL KAPOLRES CUP 2024</a>
                        <div class="news-footer">
                            <span>Admin</span>
                            <span> . 12th July, 2024</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="news-card">
                <div class="news-card-content">
                    <div class="news-card-image-wrapper">
                        <img src="{{asset('images/news 3.png')}}" alt="News Image" class="news-card-image">
                    </div>
                    <div class="news-card-text-wrapper">
                        <a href="#" class="news-card-title">KERJA BAKTI GUGUR GUNUNG SUSUK WANGAN SERENTAK DI DESA PESANGGRAHAN</a>
                        <div class="news-footer">
                            <span>Admin</span>
                            <span> . 12th July, 2024</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
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
            <p><span class="low-highlight">Berita Terbaru &nbsp; &nbsp;</span></p>
            @foreach ($latestNews as $berita)
            <div class="news">
                <img src="{{asset('images/slide1.png')}}" alt="">
                <h2>{{$berita->title}}</h2>
                <p>{{$berita->teaser}}</p>
            </div>
            <div class="news-view">
                <a href="{{ route('berita.view', $berita->id) }}" class="button">Selengkapnya</a>
            </div>
            <hr>
            @endforeach

            <p><span class="low-highlight">Live Stream Terbaru &nbsp; &nbsp;</span></p>
            <div class="iframe-container">
                <iframe width="75%" height="35%" src="https://www.youtube.com/embed/kT_DjMT3EvE?si=YVARlxSnvEsPap58" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
        </div>

        <!-- Secondary Column -->
        <div class="column secondary-column">
            <div class="card card-tv">
                <p><span class="low-highlight"><strong>TV Desa</strong> Kota Batu&nbsp; &nbsp;</span></p>
                @foreach ($socials as $social)
                <div class="tv-desa">
                    <a href="{{ $social->link_yt }}" target="_blank">
                        <img src="{{ asset('storage/' . $social->logo) }}" alt="{{ $social->nama_tv }}">
                    </a>
                    <p>{{$social->nama_tv}}</p>
                </div>
                @endforeach
            </div>
        </div>

    </div>
</div>
@endsection
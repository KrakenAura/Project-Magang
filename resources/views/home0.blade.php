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
                    @if ($banners->count() > 0 && $banners->find(1))
                    <img src="{{ asset('storage/' . $banners->find(1)->banner) }}" alt="Banner Horizontal">
                    @else
                    <img src="{{ asset('images/default-banner.png') }}" alt="Default Banner">
                    @endif
                </div>
            </div>
            <div class="header-content">
                <p><span class="content-title">Live Stream Terbaru &nbsp; &nbsp;</span></p>
            </div>
            <div class="iframe-container">
                <iframe width="75%" height="35%" src="{{$livestream->stream_url}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
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
                    @if ($banners->count() > 0 && $banners->find(2))
                    <img src="{{ asset('storage/' . $banners->find(2)->banner) }}" alt="Banner Vertical">
                    @else
                    <img src="{{ asset('images/default-banner.png') }}" alt="Default Banner">
                    @endif
                </div>
            </div>
            <div class="header-content">
                <p><span class="content-title">Berita Lainya</span></p>
            </div>
            @foreach ($othersNews as $otherNews)
            <div class="news-card">
                <div class="news-card-content">
                    <div class="news-card-image-wrapper">
                        <img src="{{ asset('storage/' . $otherNews->image) }}" alt="News Image" class="news-card-image">
                    </div>
                    <div class="news-card-text-wrapper">

                        <a href="{{ route('berita.view', $otherNews->id) }}" class="news-card-title">{{$otherNews->title}}</a>
                        <div class="news-footer">
                            <span>{{$otherNews->author}}, &nbsp;</span>
                            <span>{{$otherNews->date->format('jS F, Y')}}</span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>


@endsection
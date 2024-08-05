@extends('layouts')

@section('css')
<link rel="stylesheet" href="{{asset('css/berita.css')}}">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
@endsection

@section('content')

<div class="page-title">Kabar balai Kota</div>
<div class="container">
    <div class="column column-left">
        @foreach($latestBeritas as $index => $berita)
        @if($index == 0)
        <div class="news-card1">
            <img src="{{ asset('storage/' . $berita->image) }}" alt="News Image" class="news-card1-image">
            <div class="news-card-content">
                <p class="kategori">{{ $berita->category }}</p>
                <a href="{{ route('berita.view', $berita->id) }}" class="news-card-title">{{ $berita->title }}</a>
                <p class="news-card-description">{{ $berita->teaser }}</p>
                <div class="news-footer">
                    <span>{{ $berita->author }}</span>
                    <span>. {{ $berita->date->format('jS F, Y') }}</span>
                </div>
            </div>
        </div>
        @elseif($index == 1)
        <div class="news-card2">
            <img src="{{ asset('storage/' . $berita->image) }}" alt="News Image" class="news-card2-image">
            <div class="news-card-content2">
                <p class="kategori">{{ $berita->category }}</p>
                <a href="{{ route('berita.view', $berita->id) }}" class="news-card-title">{{ $berita->title }}</a>
                <div class="news-footer">
                    <span>{{ $berita->author }}</span>
                    <span>. {{ $berita->date->format('jS F, Y') }}</span>
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>
    <div class="column column-right">
        @if(isset($latestBeritas[2]))
        <div class="news-card3">
            <img src="{{ asset('storage/' . $latestBeritas[2]->image) }}" alt="News Image" class="news-card3-image">
            <div class="news-card-content">
                <p class="kategori">{{ $latestBeritas[2]->category }}</p>
                <a href="{{ route('berita.view', $latestBeritas[2]->id) }}" class="news-card-title">{{ $latestBeritas[2]->title }}</a>
                <p class="news-card-description">{{ $latestBeritas[2]->teaser }}</p>
                <div class="news-footer">
                    <span>{{ $latestBeritas[2]->author }}</span>
                    <span>. {{ $latestBeritas[2]->date->format('jS F, Y') }}</span>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>


<div class="news-section">
    <div class="section-content news">
        <div class="cards">
            @foreach($olderBeritas as $berita)
            <div class="card">
                <div class="image-section">
                    <img src="{{ asset('storage/' . $berita->image) }}">
                </div>
                <div class="article">
                    <div class="metadata">
                        <h5>{{ $berita->author }}</h5>
                        <h5>{{ $berita->date->format('jS F, Y') }}</h5>
                    </div>
                    <h4>{{ $berita->title }}</h4>
                    <p>{{ $berita->teaser }}</p>
                </div>
                <div class="news-view">
                    <a href="{{ route('berita.view', $berita->id) }}" class="button">Selengkapnya</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div id="app" class="container">
        <ul class="page">
            {{-- Previous Page Link --}}
            @if ($olderBeritas->onFirstPage())
            <li class="page__btn"><span class="material-icons">chevron_left</span></li>
            @else
            <li class="page__btn active">
                <a href="{{ $olderBeritas->previousPageUrl() }}" rel="prev"><span class="material-icons">chevron_left</span></a>
            </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($olderBeritas->getUrlRange(1, $olderBeritas->lastPage()) as $page => $url)
            @if ($page == $olderBeritas->currentPage())
            <li class="page__numbers active">{{ $page }}</li>
            @else
            <li class="page__numbers"><a href="{{ $url }}">{{ $page }}</a></li>
            @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($olderBeritas->hasMorePages())
            <li class="page__btn active">
                <a href="{{ $olderBeritas->nextPageUrl() }}" rel="next"><span class="material-icons">chevron_right</span></a>
            </li>
            @else
            <li class="page__btn"><span class="material-icons">chevron_right</span></li>
            @endif
        </ul>
    </div>

</div>


@endsection

</html>
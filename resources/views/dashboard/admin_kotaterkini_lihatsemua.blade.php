@extends('dashboard/adminlayouts')

@section('css')
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/admin_kotaterkini.css') }}">
@endsection

@section('content')
<div class="news-list">
    <h1>Semua Berita</h1>
    <br>
    <form action="" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Search news..." value="{{ request('search') }}">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </div>
    </form>
    <div class="viewall-berita">
        @foreach ($beritas as $berita)

        <div class="all-berita">
            <div class="change-img">
                <img src="{{ asset('storage/'.$berita->image) }}" alt="News Title 1" class="berita-image">
            </div>
            <div class="berita-content">
                <h3>{{$berita->title}}</h3>
                <div class="berita-text" id="berita-text-{{ $berita->id }}">
                    @if (strlen(strip_tags($berita->description)) > 150)
                    <span class="short-text">
                        {!! substr(strip_tags($berita->description), 0, 150) !!}...
                        <a href="#" class="see-more" data-berita-id="{{ $berita->id }}">See More</a>
                    </span>
                    <span class="full-text" style="display: none;">
                        {!! $berita->description !!}
                        <a href="#" class="see-less" data-berita-id="{{ $berita->id }}">See Less</a>
                    </span>
                    @else
                    {!! $berita->description !!}
                    @endif
                </div>
                <p class="berita-date">{{$berita->created_at->format('d F, Y')}}</p>
                <p class="berita-author">{{$berita->author}}</p>
                <div class="berita-actions">
                    <button class="btn btn-primary">Edit</button>
                    <button class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div id="app" class="container">
        @if ($beritas->hasPages())
        <ul class="page">
            {{-- Previous Page Link --}}
            @if ($beritas->onFirstPage())
            <li class="page__btn"><span class="material-icons">chevron_left</span></li>

            @else
            <li class="page__btn active">
                <a href="{{ $beritas->previousPageUrl() }}" rel="prev"><span class="material-icons">chevron_left</span></a>
            </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($beritas->getUrlRange(1, $beritas->lastPage()) as $page => $url)
            @if ($page == $beritas->currentPage())
            <li class="page__numbers active">{{ $page }}</li>
            @elseif ($page == 1 || $page == $beritas->lastPage() || abs($page - $beritas->currentPage()) <= 2) <li class="page__numbers"><a href="{{ $url }}">{{ $page }}</a></li>
                @elseif (abs($page - $beritas->currentPage()) == 3)
                <li class="page__dots">...</li>
                @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($beritas->hasMorePages())
                <li class="page__btn active">
                    <a href="{{ $beritas->nextPageUrl() }}" rel="next"><span class="material-icons">chevron_right</span></a>
                </li>
                @else
                <li class="page__btn"><span class="material-icons">chevron_right</span></li>
                @endif
        </ul>
        @endif
    </div>

</div>
@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const seeMoreLinks = document.querySelectorAll('.see-more');
        const seeLessLinks = document.querySelectorAll('.see-less');

        seeMoreLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const beritaId = this.getAttribute('data-berita-id');
                const textContainer = document.getElementById(`berita-text-${beritaId}`);
                textContainer.querySelector('.short-text').style.display = 'none';
                textContainer.querySelector('.full-text').style.display = 'inline';
            });
        });

        seeLessLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const beritaId = this.getAttribute('data-berita-id');
                const textContainer = document.getElementById(`berita-text-${beritaId}`);
                textContainer.querySelector('.short-text').style.display = 'inline';
                textContainer.querySelector('.full-text').style.display = 'none';
            });
        });
    });
</script>
@endsection

@endsection
@extends('dashboard/adminlayouts')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin_kotaterkini.css') }}">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />

@endsection

@section('content')
<div class="news-list">
    <h1>Semua Berita</h1>
    <br>
    <form action="" method="GET" class="search-form">
        <label for="search">Search for stuff</label>
        <input id="search" name="search" type="search" placeholder="Search..." autofocus required value="{{ request('search') }}" />
        <button type="submit">Go</button>
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
                    <a href="{{ route('admin.kabarbalaikota_edit', $berita->id) }}"><button class="btn btn-primary">Edit</button></a>
                    <form action="{{ route('berita.delete', $berita->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
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
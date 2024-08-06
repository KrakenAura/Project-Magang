@extends('dashboard/adminlayouts')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin_kotaterkini.css') }}">
@endsection

@section('content')
<div class="news-list">
    <h1>Semua Berita</h1>
    <br>
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
            @endforeach
        </div>
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
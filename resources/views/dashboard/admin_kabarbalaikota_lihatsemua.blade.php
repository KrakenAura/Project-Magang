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
                <div class="berita-text">{!! $berita->description !!}</div>
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
</div>
@endsection
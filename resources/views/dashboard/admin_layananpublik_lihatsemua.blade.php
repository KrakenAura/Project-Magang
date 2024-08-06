@extends('dashboard/adminlayouts')

@section('css')
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
    {{ $beritas->links() }}
</div>
@endsection
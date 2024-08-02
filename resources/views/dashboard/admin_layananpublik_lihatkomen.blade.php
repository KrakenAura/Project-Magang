@extends('dashboard/adminlayouts')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin_kotaterkini.css') }}">
@endsection

@section('content')
<div class="comments-list">
    <h1>All Comments</h1>
    @foreach ($beritas as $berita )
    <ul class="products-list product-list-in-card pl-2 pr-2">
        <!-- Sample Comment Item -->

        @foreach($berita->comments as $comment)

        <li class="item">
            <div class="product-img">
                <img src="{{ $comment->user->image }}" alt="{{ $comment->user->name }}" class="img-size-50">
            </div>
            <div class="product-info">
                <a class="product-title">{{ $comment->user->name }}
                    <span class="comment-on">comment on {{ $berita->title }}</span>
                    <span class="product-description">
                        {{ $comment->content }}
                    </span>
                </a>
            </div>
            <form action="{{ route('komentar.delete', $comment->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </li>
        @endforeach
    </ul>
    @endforeach
</div>
@endsection
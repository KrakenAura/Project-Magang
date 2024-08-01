@extends('dashboard/adminlayouts')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin_kotaterkini.css') }}">
@endsection

@section('content')
<div class="comments-list">
    <h1>All Comments</h1>
    @foreach ($beritas as $berita )
    <ul class="products-list product-list-in-card">
        <!-- Sample Comment Item -->
        @foreach($berita->comments as $comment)
        <li class="item">

            <div class="user-info">
                <a class="product-title">{{ $comment->user->name }}
                    <span class="comment-on">comment on ...{{ $berita->title }}</span>
                    <span class="product-description">
                        {{ $comment->content }}
                    </span>
                </a>
            </div>
            <button class="delete-button">Delete</button>
        </li>
        @endforeach
    </ul>
    @endforeach
</div>
@endsection
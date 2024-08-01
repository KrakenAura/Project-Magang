@extends('dashboard/adminlayouts')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin_kotaterkini.css') }}">
@endsection

@section('content')
<div class="comments-list">
    <h1>All Comments</h1>
    <ul class="products-list product-list-in-card pl-2 pr-2">
        <!-- Sample Comment Item -->

        @foreach ($beritas as $berita )
        
        <li class="item">
            <div class="product-img">
                <img src="{{ asset('images/logo tvd.png') }}" alt="User Image" class="img-size-50">
            </div>
            <div class="product-info">
                <a class="product-title">User 1
                    <span class="comment-on">comment on ...</span>
                    <span class="product-description">
                        Menyala
                    </span>
                </a>
            </div>
        </li>
        @endforeach
        <!-- Add more comment items as needed -->
    </ul>
</div>
@endsection
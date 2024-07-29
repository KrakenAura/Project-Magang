@extends('layouts')

@section('css')
<link rel="stylesheet" href="{{asset('css/tautan.css')}}">
@endsection

@section('content')

<h1>Tautan</h1>
<div class="content">
    <div class="card tautan-card">
        <div class="card-image">
            <img src="{{asset('images/news 4.png')}}" alt="">
        </div>
        <div class="card-hover">
            <div class="link">
                <h4>Image Description</h4>
                <button class="button-54" role="button" href=""><a>Tonton Sekarang<i class="ri-play-line"></i></a></button>
            </div>
        </div>
    </div>
</div>

@endsection

</html>
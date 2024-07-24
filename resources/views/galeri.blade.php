@extends('layouts')

@section('css')
<link rel="stylesheet" href="{{asset('css/galeri.css')}}">
@endsection

@section('content')

<h1>Galeri</h1>
<div class="content">
    <div class="card galery-card">
        <div class="card-image">
            <img src="{{asset('images/news 4.png')}}" alt="">
        </div>
        <div class="card-desc">
            <h4>Image Description</h4>
        </div>
    </div>
    <div class="card galery-card">
        <div class="card-image">
            <img src="{{asset('images/news 4.png')}}" alt="">
        </div>
        <div class="card-desc">
            <h4>Image Description</h4>
        </div>
    </div>
    <div class="card galery-card">
        <div class="card-image">
            <img src="{{asset('images/news 4.png')}}" alt="">
        </div>
        <div class="card-desc">
            <h4>Image Description</h4>
        </div>
    </div>
</div>

@endsection

</html>
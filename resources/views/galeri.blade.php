@extends('layouts')

@section('css')
<link rel="stylesheet" href="{{asset('css/galeri.css')}}">
@endsection

@section('title','Galeri')

@section('content')

<h1>Galeri</h1>
<div class="content">
    @foreach ( $galeries as $galeri)

    <div class="card galery-card">
        <div class="card-image">
            <img src="{{ asset('storage/' . $galeri->image) }}" alt="">
        </div>
        <div class="card-desc">
            <h4>{{$galeri -> title}}</h4>
        </div>
    </div>
    @endforeach
</div>

@endsection

</html>
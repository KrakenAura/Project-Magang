@extends('layouts')

@section('css')
<link rel="stylesheet" href="{{asset('css/galeri.css')}}">
@endsection

@section('content')

<h1>Galeri</h1>
<div class="content">
    @foreach ( $galeries as $galeri)

    @endforeach
    <div class="card galery-card">
        <div class="card-image">
            <img src="{{ asset('storage/' . $galeri->image) }}" alt="">
        </div>
        <div class="card-desc">
            <h4>{{$galeri -> title}}</h4>
        </div>
    </div>
</div>

@endsection

</html>
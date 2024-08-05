@extends('layouts')

@section('css')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{asset('css/linktv.css')}}">
@endsection

@section('content')
<div class="wrapper">
    <h1>Program TV Desa</h1>
    <div class="container-contact">
        @foreach ($outlooks as $outlook)

        <div class="card">
            <div class="content">
                <div class="cardContent">
                    <h3>{{$outlook->title}}</h3>
                </div>
                <div class="img"><img src="{{ asset('storage/'.$outlook->image) }}" alt="{{ $outlook->title }}" class="library-image"></div>
            </div>
            <ul class="sci">
                <li style="--i:3">
                    <a href="{{ $outlook->link }}" target="_blank"><i class="fa fa-play" aria-hidden="true"><span>Tonton Sekarang</span></i></a>
                </li>
            </ul>
        </div>
        @endforeach
    </div>
</div>
@endsection
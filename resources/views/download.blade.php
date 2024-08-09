@extends('layouts')

@section('css')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{asset('css/download.css')}}">
@endsection

@section('content')
<div class="wrapper">
    <h1>Library</h1>
    <div class="container-contact">
        @foreach ( $librarys as $library )
        <div class="card">
            <div class="content">
                <div class="cardContent">
                    <h3>{{$library -> judul}}</h3>
                </div>
                <div class="img"><img src="{{ asset('storage/'.$library->image) }}"></div>
            </div>
            <ul class="sci">
                <li style="--i:3">
                    <a href="{{ $library->link }}" target="_blank"><i class="fa fa-download" aria-hidden="true"><span>Download</span></i></a>
                </li>
            </ul>
        </div>
        @endforeach
    </div>
</div>

@endsection

</html>
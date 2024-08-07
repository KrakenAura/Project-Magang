@extends('layouts')

@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
<link rel="stylesheet" href="{{asset('css/contactus.css')}}">
@endsection

@section('content')
<div class="wrapper">
    <h1>Contact US</h1>
    <div class="container-contact">
        @foreach ($socials as $contact)
        <div class="card">
            <div class="content">
                <div class="img"><img src="{{ asset('storage/'.$contact->logo) }}" alt="{{$contact->nama_tv}}"></div>
                <div class="cardContent">
                    <h3>{{$contact->nama_tv}}</h3>
                </div>
            </div>
            <ul class="sci">
                <li style="--i:1">
                    <a href="{{$contact->link_web}}"><i class="bi bi-globe"></i></a>
                </li>
                <li style="--i:2">
                    <a href="{{$contact->link_insta}}"><i class="bi bi-instagram"></i></a>
                </li>
                <li style="--i:3">
                    <a href="{{$contact->link_yt}}"><i class="bi bi-youtube"></i></a>
                </li>
            </ul>
        </div>
        @endforeach
    </div>
</div>
@endsection
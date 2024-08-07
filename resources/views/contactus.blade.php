@extends('layouts')

@section('css')
<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
<link rel="stylesheet" href="{{asset('css/contactus.css')}}">
@endsection

@section('content')
<div class="wrapper">
    <h1>Contact US</h1>
    <div class="container-contact">
        @foreach ( $socials as $contact)


        <div class="card">
            <div class="content">
                <div class="img"><img src="{{ asset('storage/'.$contact->logo) }}"> </div>
                <div class="cardContent">
                    <h3>{{$contact->nama_tv}}</h3>
                </div>
            </div>
            <ul class="sci">
                <li style="--i:1">
                    <a href="{{$contact->link_web}}"><i class="fa fa-globe" aria-hidden="true"></i></a>
                </li>
                <li style="--i:2">
                    <a href="{{$contact->link_insta}}"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                </li>
                <li style="--i:3">
                    <a href="{{$contact->link_yt}}"><i class="fa fa-youtube" aria-hidden="true"></i></a>
                </li>
            </ul>
        </div>
    </div>
    @endforeach
</div>
@endsection
@extends('layouts')

@section('css')
<link rel="stylesheet" href="{{asset('css/Bighome.css')}}">
<link rel="stylesheet" href="{{asset('css/Smallhome.css')}}">
@endsection

@section('content')

<!-- Content -->
<div class="content">
    <div class="column primary-column">
        <p><span class="low-highlight">Berita Terbaru &nbsp; &nbsp;</span></p>
        <div class="news">
            <img src="{{asset('images/slide1.png')}}" alt="">
            <h2>Halo Tim Volly Desa Pesanggrahan Lolos ke Babak Semi Final Kapolres Cup 2023</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eu turpis molestie, dictum est a, mattis tellus. Sed dignissim, metus nec fringilla accumsan, risus sem sollicitudin lacus, ut interdum tellus elit sed risus. Maecenas eget condimentum velit, sit amet feugiat lectus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent auctor purus luctus enim egestas, ac scelerisque ante pulvinar. Donec ut rhoncus ex. Suspendisse ac rhoncus nisl, eu tempor urna. Curabitur vel bibendum lorem. Morbi convallis convallis diam sit amet lacinia. Aliquam in elementum tellus.</p>
        </div>
        <div class="banner">
            <img src="{{asset('images/banner.png')}}" alt="">
        </div>
        <p><span class="low-highlight">Live Stream Terbaru &nbsp; &nbsp;</span></p>
        <div class="iframe-container">
            <iframe width="75%" height="35%" src="https://www.youtube.com/embed/kT_DjMT3EvE?si=YVARlxSnvEsPap58" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>
    </div>

    <!-- Secondary Column -->
    <div class="column secondary-column">
        <div class="card card-tv">
            <p><span class="low-highlight">TV Desa Kota Batu &nbsp; &nbsp;</span></p>
            <div class="container">
                <img src="{{ asset('images/logo tvd.png') }}" alt="">
                <p>TV Desa Pesanggrahan</p>
            </div>
            <div class="container">
                <img src="{{ asset('images/logo tvd.png') }}" alt="">
                <p>TV Desa Pesanggrahan</p>
            </div>
            <div class="container">
                <img src="{{ asset('images/logo tvd.png') }}" alt="">
                <p>TV Desa Pesanggrahan</p>
            </div>
            <div class="container">
                <img src="{{ asset('images/logo tvd.png') }}" alt="">
                <p>TV Desa Pesanggrahan</p>
            </div>
            <div class="container">
                <img src="{{ asset('images/logo tvd.png') }}" alt="">
                <p>TV Desa Pesanggrahan</p>
            </div>
            <div class="container">
                <img src="{{ asset('images/logo tvd.png') }}" alt="">
                <p>TV Desa Pesanggrahan</p>
            </div>
        </div>

        <!-- Secondary Banner -->
        <div class="sec-banner">
            <img src="{{asset('images/image 4.png')}}" alt="">
        </div>
    </div>
</div>
@endsection
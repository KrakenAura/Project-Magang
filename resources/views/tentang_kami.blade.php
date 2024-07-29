@extends('layouts')

@section('css')
<link rel="stylesheet" href="{{asset('css/aboutus.css')}}">
@endsection

@section('content')

<div class="aboutus">
    <h1>Tentang Kami</h1>
    <div class="section">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eu turpis molestie, dictum est a, mattis tellus. Sed dignissim, metus nec fringilla accumsan, risus sem sollicitudin lacus, ut interdum tellus elit sed risus. Maecenas eget condimentum velit, sit amet feugiat lectus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent auctor purus luctus enim egestas, ac scelerisque ante pulvinar. Donec ut rhoncus ex. Suspendisse ac rhoncus nisl, eu tempor urna. Curabitur vel bibendum lorem. Morbi convallis convallis diam sit amet lacinia. Aliquam in elementum tellus.
        </p>
    </div>
</div>

<div class="struktur">
    <p>Struktur</p>
    <img src="{{asset('images/struktur.png')}}" alt="">
</div>

@endsection


</html>
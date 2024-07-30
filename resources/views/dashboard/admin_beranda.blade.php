@extends('dashboard/adminlayouts')

@section('css')

@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <h1><strong>Halaman Beranda</strong></h1>

        <h2>Slideshow</h2>
        <img src="{{asset('images/news 1.png')}}" alt="">
        <img src="{{asset('images/news 1.png')}}" alt="">
        <img src="{{asset('images/news 1.png')}}" alt="">
        <p>Buat Hover trs bikin modal untuk update image</p>

        <h2>Link TV Desa</h2>
        <p>Link 1</p>
        <p>Link 1</p>
        <p>Link 1</p>
        <p>Buat button CRUD, bisa pake tabel , kolom nya logo, nama tv, link, action button (Edit, Delete). nanti dibawah kasih button add new</p>

        <h2>Link Live Streaming</h2>
        <p>bla bla bla .com</p>
        <p>Sama kyk link tv desa tpi kolom nya cuma link sama action button (edit)</p>
    </div>
</div>
@endsection
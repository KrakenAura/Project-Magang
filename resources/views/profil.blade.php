@extends('layouts')

@section('css')
<link rel="stylesheet" href="{{asset('css/profil.css')}}">
<link rel="stylesheet" href="{{asset('css/crew.css')}}">
@endsection

@section('content')

<body>
    <div class="aboutus">
        <div class="background"></div>
        <div class="overlay"></div>
        <div class="aboutus-content">
            <h1 class="text-blk subHeadingText">Tentang Kami</h1>
            <p>Komunitas Informasi Masyarakat (KIM) adalah suatu lembaga layanan publik yang dibentuk dan dikelola dari, oleh dan untuk masyarakat yang secara khusus berorientasi pada layanan informasi dan pemberdayaan masyarakat sesuai dengan kebutuhannya.</p>
        </div>
    </div>
    <div class="apa-kim">
        <div class="responsive-container-block bigContainer">

            <div class="responsive-container-block Container bottomContainer">
                <div class="allText bottomText">
                    <p class="text-blk headingText">
                        Profil
                    </p>
                    <p class="text-blk subHeadingText">
                        Apa itu KIM?
                    </p>
                    <p class="text-blk description">
                        KIM adalah Komunitas yang dibentuk oleh masyarakat, dari masyarakat dan untuk masyarakat serta secara mandiri dan kreatif melakukan aktivitas pengelolaan informasi dan pemberdayaan guna memberikan nilai tambah bagi masyarakat itu sendiri. </p>
                    <p class="text-blk description">
                        Berdasarkan Permenkominfo No. 8 Tahun 2019 tentang Penyelenggaraan Urusan Pemerintahan Konkuren Bidang Komunikasi dan Informatika, bahwa Dinas melaksanakan kemitraan dengan pemangku kepentingan, salah satunya adalah Komunitas Informasi Masyarakat, sebagaimana dimaksud dalam Pasal 16 ayat (2) huruf a.
                    </p>

                </div>
                <div class="videoContainer">
                    <img class="mainVideo" src="{{asset('images/banner6.jpg')}}" alt="Image">
                    <img class="dotsImg image-block" src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/cw3.svg">
                </div>
            </div>
        </div>
    </div>
    <div class="struktur">
        <br>
        <p class="text-blk subHeadingText">Struktur Organisasi</p>
        <hr>
        <img class="struktur-img" src="{{asset('images/struktur.png')}}" alt="image">
    </div>
    <div class="crew">
        <p class="text-blk subHeadingText">Our Team</p>
        <hr>
        <div class="team-container">
            <div class="team-member">
                <img src="{{asset('images/team1.jpg')}}" alt="Team Member 1">
                <p class="text-blk">John Doe</p>
                <p class="text-blk description">CEO</p>
            </div>
            <div class="team-member">
                <img src="{{asset('images/team2.jpg')}}" alt="Team Member 2">
                <p class="text-blk">Jane Smith</p>
                <p class="text-blk description">CTO</p>
            </div>
            <div class="team-member">
                <img src="{{asset('images/team3.jpg')}}" alt="Team Member 3">
                <p class="text-blk">Alice Johnson</p>
                <p class="text-blk description">COO</p>
            </div>
            <!-- Add more team members as needed -->
        </div>
    </div>
</body>
@endsection
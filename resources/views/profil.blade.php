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
            <p>{{$profiles->deskripsi}}</p>
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
                        Sejarah TV Desa Kota Batu
                    </p>
                    <p class="profil-desc">
                        {{$profiles->sejarah}}
                    </p>

                </div>
                <div class="videoContainer">
                    <img class="mainVideo" src="{{ asset('storage/' . $profiles->image) }}">
                    <img class="dotsImg image-block" src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/cw3.svg">
                </div>
            </div>
        </div>
    </div>
    <div class="struktur">
        <br>
        <p class="text-blk subHeadingText">Struktur Organisasi</p>
        <hr>
        <img class="struktur-img" src="{{ asset('storage/' . $profiles->struktur_organisasi) }}">
    </div>

    <br>
    <p class="text-blk crewHeading" style="font-size: 32px;">Our Crew</p>
    <hr>
    <div class="crew">
        <div class="container">
            <div class="row">
                <div class="team-item">
                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Manuella Nevoresky">
                    <h5>Manuella Nevoresky</h5>
                    <span>CEO - Founder</span>
                </div>

                <div class="team-item">
                    <img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="Samuel Hardy">
                    <h5>Samuel Hardy</h5>
                    <span>CEO - Founder</span>
                </div>

                <div class="team-item">
                    <img src="https://bootdey.com/img/Content/avatar/avatar8.png" alt="Tom Sunderland">
                    <h5>Tom Sunderland</h5>
                    <span>CEO - Founder</span>
                </div>

                <div class="team-item">
                    <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="John Tarly">
                    <h5>John Tarly</h5>
                    <span>CEO - Founder</span>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection
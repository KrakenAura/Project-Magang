<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin')</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/admin_logout.css') }}">
    <link rel="icon" href="{{ asset('images/logo tvd.png') }}">

    @yield('css')
    <style>
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .content-wrapper {
            flex: 1;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-dark">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <div class="logout-div">
                <a class="button" href="#" onclick="logout()">
                    <img src="{{ asset('images/logo tvd.png') }}">
                    <div class="logout">LOGOUT</div>
                </a>
            </div>
        </nav>

        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="/admin/dashboard" class="brand-link">
                <img src="{{asset('images/logo tvd.png')}}" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Dashboard TV Desa</span>
            </a>
            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="info">
                        <a href="#" class="d-block"></a>
                    </div>
                </div>
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>
                                    Halaman
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/admin/beranda" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Beranda</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="/admin/kotaterkini" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Kota Terkini</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/admin/layananpublik" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Pelayanan Publik</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/admin/kabarbalaikota" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Kabar Balai Kota</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/admin/citizen" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Citizen Journalist</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/admin/profil" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Profil</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/admin/galeri" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Galeri</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/admin/programtvdesa" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Program TV Desa</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/admin/wargabicara" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Warga Bicara</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/admin/library" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Library</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/admin/contactus" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Contact us</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </nav>
        </aside>
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>
        <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
        <script src="{{asset('dist/js/adminlte.min.js')}}"></script>
        <script>
            $(function() {
                bsCustomFileInput.init();
            });
        </script>
        <script>
            function logout() {
                fetch('/api/admin/logout', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.message === 'Admin logged out successfully.') {
                            window.location.href = '/adminlogin';
                        }
                    })
                    .catch(error => console.error('Error:', error));
            }
        </script>
        @yield('scripts')

</body>

</html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'admin')</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
    @yield('css')
</head>

<body>
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>

    </nav>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
            <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">Admin KIM</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">Alexander Pierce</a>
                </div>
            </div>
            <!-- /.sidebar -->
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
                                <a href="/admin/pelayananpublik" class="nav-link">
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
                                <a href="/admin/citizenjournalist" class="nav-link">
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
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-edit"></i>
                            <p>
                                Pengguna
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Admin</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="pages/forms/advanced.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Pengunjung</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/forms/editors.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Editors</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/forms/validation.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Validation</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
    </aside>
    @yield('content')
</body>

</html>
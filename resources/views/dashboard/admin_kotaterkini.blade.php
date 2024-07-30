@extends('dashboard/adminlayouts')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin_kotaterkini.css') }}">
@endsection

@section('content')
<div class="hold-transition sidebar-mini">
    <div class="kota-terkini">
        <h1>Kota Terkini</h1>
        <div class="berita-baru">
            <h2>Berita Terbaru</h2>
            <div class="list-berita">
                <div class="berita-item">
                    <img src="{{ asset('images/news 1.png') }}" alt="News Title 1" class="berita-image">
                    <div class="berita-content">
                        <h3>TIM VOLLY DESA PESANGGRAHAN LOLOS KE BABAK SEMIFINAL KAPOLRES CUP 2024</h3>
                        <div class="berita-text">
                        </div>
                        <p class="berita-date">. 12th July, 2024</p>
                        <div class="berita-actions">
                            <button class="btn btn-primary  ">Edit</button>
                            <button class="btn btn-danger">Delete</button>
                        </div>
                    </div>
                </div>
                <div class="berita-item">
                    <img src="{{ asset('images/news 1.png') }}" alt="News Title 1" class="berita-image">
                    <div class="berita-content">
                        <h3>TIM VOLLY DESA PESANGGRAHAN LOLOS KE BABAK SEMIFINAL KAPOLRES CUP 2024</h3>
                        <div class="berita-text">
                        </div>
                        <p class="berita-date">. 12th July, 2024</p>
                        <div class="berita-actions">
                            <button class="btn btn-primary  ">Edit</button>
                            <button class="btn btn-danger">Delete</button>
                        </div>
                    </div>
                </div>
                <div class="berita-item">
                    <img src="{{ asset('images/news 1.png') }}" alt="News Title 1" class="berita-image">
                    <div class="berita-content">
                        <h3>TIM VOLLY DESA PESANGGRAHAN LOLOS KE BABAK SEMIFINAL KAPOLRES CUP 2024</h3>
                        <div class="berita-text">
                        </div>
                        <p class="berita-date">. 12th July, 2024</p>
                        <div class="berita-actions">
                            <button class="btn btn-primary  ">Edit</button>
                            <button class="btn btn-danger">Delete</button>
                        </div>
                    </div>
                </div>
                <div class="berita-item">
                    <img src="{{ asset('images/news 1.png') }}" alt="News Title 1" class="berita-image">
                    <div class="berita-content">
                        <h3>TIM VOLLY DESA PESANGGRAHAN LOLOS KE BABAK SEMIFINAL KAPOLRES CUP 2024</h3>
                        <div class="berita-text">
                        </div>
                        <p class="berita-date">. 12th July, 2024</p>
                        <div class="berita-actions">
                            <button class="btn btn-primary  ">Edit</button>
                            <button class="btn btn-danger">Delete</button>
                        </div>
                    </div>
                </div>
                <div class="berita-item">
                    <img src="{{ asset('images/news 1.png') }}" alt="News Title 1" class="berita-image">
                    <div class="berita-content">
                        <h3>TIM VOLLY DESA PESANGGRAHAN LOLOS KE BABAK SEMIFINAL KAPOLRES CUP 2024</h3>
                        <div class="berita-text">
                        </div>
                        <p class="berita-date">. 12th July, 2024</p>
                        <div class="berita-actions">
                            <button class="btn btn-primary  ">Edit</button>
                            <button class="btn btn-danger">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-success">+ Tambah Berita</button>
            <button type="button" class="btn btn-primary">Lihat Semua</button>
        </div>
        <div class="card mt-3">
            <div class="card-header">
                <h3 class="card-title">Komentar Terbaru</h3>
            </div>
            <div class="card-body p-0 comment-section">
                <ul class="products-list product-list-in-card pl-2 pr-2">
                    <li class="item">
                        <div class="product-img">
                            <img src="dist/img/default-150x150.png" alt="Product Image" class="img-size-50">
                        </div>
                        <div class="product-info">
                            <a>User 1
                                <span class="comment-on">comment on ...</span>
                                <span class="product-description">
                                    Menyala
                                </span>
                            </a>
                        </div>
                    </li>
                    <li class="item">
                        <div class="product-img">
                            <img src="dist/img/default-150x150.png" alt="Product Image" class="img-size-50">
                        </div>
                        <div class="product-info">
                            <a>User 1
                                <span class="comment-on">comment on ...</span>
                                <span class="product-description">
                                    Menyala
                                </span>
                            </a>
                        </div>
                    </li>
                    <li class="item">
                        <div class="product-img">
                            <img src="dist/img/default-150x150.png" alt="Product Image" class="img-size-50">
                        </div>
                        <div class="product-info">
                            <a>User 1
                                <span class="comment-on">comment on ...</span>
                                <span class="product-description">
                                    Menyala
                                </span>
                            </a>
                        </div>
                    </li>
                    <li class="item">
                        <div class="product-img">
                            <img src="dist/img/default-150x150.png" alt="Product Image" class="img-size-50">
                        </div>
                        <div class="product-info">
                            <a>User 1
                                <span class="comment-on">comment on ...</span>
                                <span class="product-description">
                                    Menyala
                                </span>
                            </a>
                        </div>
                    </li>
                    <li class="item">
                        <div class="product-img">
                            <img src="dist/img/default-150x150.png" alt="Product Image" class="img-size-50">
                        </div>
                        <div class="product-info">
                            <a>User 1
                                <span class="comment-on">comment on ...</span>
                                <span class="product-description">
                                    Menyala
                                </span>
                            </a>
                        </div>
                    </li>
                    <li class="item">
                        <div class="product-img">
                            <img src="dist/img/default-150x150.png" alt="Product Image" class="img-size-50">
                        </div>
                        <div class="product-info">
                            <a>User 1
                                <span class="comment-on">comment on ...</span>
                                <span class="product-description">
                                    Menyala
                                </span>
                            </a>
                        </div>
                    </li>
                    <li class="item">
                        <div class="product-img">
                            <img src="dist/img/default-150x150.png" alt="Product Image" class="img-size-50">
                        </div>
                        <div class="product-info">
                            <a>User 1
                                <span class="comment-on">comment on ...</span>
                                <span class="product-description">
                                    Menyala
                                </span>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
            <button type="button" class="btn btn-primary">Lihat Semua</button>
        </div>
    </div>
</div>
@endsection
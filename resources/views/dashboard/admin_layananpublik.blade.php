@extends('dashboard/adminlayouts')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin_kotaterkini.css') }}">
@endsection

@section('content')
<div class="hold-transition sidebar-mini">
    <div class="kota-terkini">
        <h1>Layanan Publik</h1>
        <div class="berita-baru">
            <h2>Berita Terbaru</h2>
            <div class="list-berita">

                @foreach($beritas as $berita)
                <div class="berita-item">
                    <div class="change-img">
                        <img src="{{ asset('storage/'.$berita->image) }}" alt="{{ $berita->title }}" class="berita-image">
                    </div>
                    <div class="berita-content">
                        <h3>{{ $berita->title }}</h3>
                        <div class="berita-text">
                            <!-- Berita text goes here -->
                        </div>
                        <p class="berita-date">{{ $berita->created_at->format('d F, Y') }}</p>
                        <div class="berita-actions">
                            <a href="{{ route('admin.layananpublik_edit', $berita->id) }}"><button class="btn btn-primary">Edit</button></a>
                            <form action="{{ route('berita.delete', $berita->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            <a href="{{route('admin.layananpublik_tambah')}}"><button type="button" class="btn btn-success">+ Tambah Berita</button></a>
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
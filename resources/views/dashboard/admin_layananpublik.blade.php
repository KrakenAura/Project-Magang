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
            <div class="action-button mt-3">
                <a href="{{route('admin.layananpublik_tambah')}}"><button type="button" class="btn btn-success">+ Tambah Berita</button></a>
                <a href="/admin/berita/category/layananpublik">
                    <button type="button" class="btn btn-primary">Lihat Semua</button>
                </a>
                <a href="/admin/komentar/category/layananpublik"><button type="button" class="btn btn-warning">Lihat Semua Komentar</button></a>
            </div>
        </div>
    </div>
</div>
@endsection
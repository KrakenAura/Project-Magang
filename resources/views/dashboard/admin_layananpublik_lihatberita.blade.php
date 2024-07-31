@extends('dashboard/adminlayouts')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin_kotaterkini.css') }}">
@endsection

@section('content')
<div class="news-list">
    <h1>Semua Berita</h1>
    <br>
    <div class="viewall-berita">
        <div class="all-berita">
            <div class="change-img">
                <img src="{{ asset('images/news 1.png') }}" alt="News Title 1" class="berita-image">
            </div>
            <div class="berita-content">
                <h3>TIM VOLLY DESA PESANGGRAHAN LOLOS KE BABAK SEMIFINAL KAPOLRES CUP 2024</h3>
                <div class="berita-text">
                    <!-- Berita text goes here -->
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </div>
                <p class="berita-date">12th July, 2024</p>
                <p class="berita-author">Author Name</p>
                <p class="berita-category">Category</p>
                <div class="berita-actions">
                    <button class="btn btn-primary">Edit</button>
                    <button class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>
        <div class="all-berita">
            <div class="change-img">
                <img src="{{ asset('images/news 1.png') }}" alt="News Title 1" class="berita-image">
            </div>
            <div class="berita-content">
                <h3>TIM VOLLY DESA PESANGGRAHAN LOLOS KE BABAK SEMIFINAL KAPOLRES CUP 2024</h3>
                <div class="berita-text">
                    <!-- Berita text goes here -->
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </div>
                <p class="berita-date">12th July, 2024</p>
                <p class="berita-author">Author Name</p>
                <p class="berita-category">Category</p>
                <div class="berita-actions">
                    <button class="btn btn-primary">Edit</button>
                    <button class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>
        <!-- Add more news items as needed -->
    </div>
    <button class="btn btn-success mt-3">+ Tambah Berita</button>
</div>
@endsection
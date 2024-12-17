@extends('dashboard/adminlayouts')

@section('css')
<link rel="preconnect" href="https://fonts.gstatic.com">
<link rel="preload" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" as="style">

<style>
    body {
        font-family: 'Source Sans Pro', sans-serif;
    }

    .title-section,
    .cover,
    .custom-editor,
    .teaser-section {
        margin-bottom: 20px;
    }

    .title-label,
    .banner-label,
    .teaser-label {
        font-weight: bold;
    }

    .title-input,
    .teaser-input,
    .banner-input {
        width: 100%;
        padding: 10px;
    }
</style>

<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/admin_kotaterkini_edit.css') }}" media="print" onload="this.media='all'">
<link rel="stylesheet" href="{{ asset('css/all.min.css') }}" media="print" onload="this.media='all'">
<link rel="stylesheet" href="{{ asset('css/OverlayScrollbars.min.css') }}" media="print" onload="this.media='all'">
<link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}" media="print" onload="this.media='all'">

<title>Tambah Berita Kota Terkini</title>
@endsection

@section('content')

<h1>Tambah Berita Kota Terkini</h1>
<form action="{{ route('CreateBerita') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="category" value="KotaTerkini">

    <div class="title-section">
        <p class="title-label">Judul</p>
        <input type="text" name="title" class="title-input" placeholder="Title" required>
    </div>

    <div class="cover">
        <label for="banner-image" class="banner-label">Cover</label>
        <input type="file" name="image" id="banner-image" class="banner-input" accept="image/*" required>
    </div>

    <div class="custom-editor">
        <div id="editor"></div>
        <input type="hidden" name="description" id="description">
    </div>

    <div class="teaser-section">
        <p class="teaser-label">Teaser</p>
        <input type="text" name="teaser" class="teaser-input" placeholder="Teaser" required>
    </div>

    <div class="teaser-section">
        <p class="teaser-label">Author</p>
        <input type="text" name="author" class="teaser-input" placeholder="Author" required>
    </div>

    <button type="submit" class="save-button">Save</button>
</form>

<!-- Lazy-load CKEditor -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var editorScript = document.createElement('script');
        editorScript.src = 'https://cdn.ckeditor.com/ckeditor5/36.0.0/classic/ckeditor.js';
        editorScript.onload = function() {
            ClassicEditor
                .create(document.querySelector('#editor'))
                .then(editor => {
                    document.querySelector('form').addEventListener('submit', function() {
                        document.getElementById('description').value = editor.getData();
                    });
                })
                .catch(error => {
                    console.error(error);
                });
        };
        document.body.appendChild(editorScript);
    });
</script>

<!-- Defer non-critical JS files -->
<script src="{{ asset('js/adminlte.min.js') }}" defer></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}" defer></script>

@endsection
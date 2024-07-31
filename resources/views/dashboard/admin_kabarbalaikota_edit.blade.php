@extends('dashboard/adminlayouts')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin_kotaterkini_edit.css') }}">
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.0/classic/ckeditor.js"></script>
@endsection

@section('content')
<h1>Edit Berita Kabar Balai Kota</h1>
<div class="container-write">
    <div class="title-section">
        <p class="title-label">Judul</p>
        <input type="text" class="title-input" placeholder="Title">
    </div>
    <div class="cover">
        <label for="banner-image" class="banner-label">Cover</label>
        <input type="file" name="banner_image" id="banner-image" class="banner-input" accept="image/*" required>
    </div>
    <div class="custom-editor">
        <div id="editor"></div>
    </div>
    <div class="teaser-section">
        <p class="teaser-label">Teaser</p>
        <input type="text" class="teaser-input" placeholder="Teaser">
    </div>
    <button class="save-button">Save</button>
</div>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
</script>
@endsection
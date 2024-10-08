@extends('dashboard/adminlayouts')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin_kotaterkini_edit.css') }}">
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.0/classic/ckeditor.js"></script>
@endsection

@section('content')
<h1>Tambah Berita Kabar Balai Kota</h1>
<!-- <div class="container-write">
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
</div> -->
<form action="{{ route('CreateBerita') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="category" value="KabarBalaiKota">
    <!-- Other form fields -->
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
    <input type="hidden" name="author" value="{{Auth::user()->name}}">
    <button type="submit" class="save-button">Save</button>
</form>
<script>
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
</script>
@endsection
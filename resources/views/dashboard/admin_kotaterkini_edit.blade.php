@extends('dashboard/adminlayouts')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin_kotaterkini_edit.css') }}">
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.0/classic/ckeditor.js"></script>
@endsection

@section('content')
<h1>Edit Berita Kota Terkini</h1>
<form action="{{ route('UpdateBerita', $berita->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="hidden" name="category" value="KotaTerkini">
    <div class="title-section">
        <p class="title-label">Judul</p>
        <input type="text" name="title" class="title-input" placeholder="Title" value="{{ $berita->title }}" required>
    </div>
    <div class="cover">
        <label for="banner-image" class="banner-label">Cover</label>
        <input type="file" name="image" id="banner-image" class="banner-input" accept="image/*">
        <img src="{{ asset('storage/' . $berita->image) }}" alt="Current Image" style="max-width: 200px;">
    </div>
    <div class="custom-editor">
        <div id="editor">{!! $berita->description !!}</div>
        <input type="hidden" name="description" id="description">
    </div>
    <div class="teaser-section">
        <p class="teaser-label">Teaser</p>
        <input type="text" name="teaser" class="teaser-input" placeholder="Teaser" value="{{ $berita->teaser }}" required>
    </div>
    <div class="teaser-section">
        <p class="teaser-label">Author</p>
        <input type="text" name="author" class="teaser-input" placeholder="Author" value="{{ $berita->author }}" required>
    </div>
    <button type="submit" class="save-button">Update</button>
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
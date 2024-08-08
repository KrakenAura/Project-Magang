@extends('layouts')

@section('css')
<link rel="stylesheet" href="{{ asset('css/pengaduan.css') }}">
@endsection

@section('content')
<header>
    <h1>Warga Bicara</h1>
</header>
<main><?
    <div class="content">
        <div class="form-section">
            <form action="{{ route('complaints.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <label for="nomor_pengaduan">Nomor Pengaduan</label>
                <input type="text" id="nomor_pengaduan" name="nomor_pengaduan" readonly>

                <label for="nama">Nama</label>
                <input type="text" id="nama" name="nama" required>

                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>

                <label for="nomor_telepon">Nomor Telepon</label>
                <input type="tel" id="nomor_telepon" name="nomor_telepon" required>

                <label for="deskripsi">Deskripsi Pengaduan</label>
                <textarea id="deskripsi" name="deskripsi" rows="5" required></textarea>

                <label for="image">Unggah Bukti (opsional)</label>
                <input type="file" id="image" name="image">

                <input type="hidden" name="status" value="Pending">

                <button type="submit">Kirim Pengaduan</button>
            </form>
        </div>
    </div>
    <div class="side-section">
        <div class="image-section">
            <img src="{{ asset('images/wargabicara.png') }}" alt="Descriptive Image">
        </div>
    </div>
</main>
@endsection
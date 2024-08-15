@extends('layouts')

@section('css')
<link rel="stylesheet" href="{{ asset('css/pengaduan.css') }}">
@endsection

@section('title','Warga Bicara')

@section('content')
<main>
    <div class="content">
        <div class="form-section">
            <h1>Warga Bicara</h1>
            <p>Ayo, berperan aktif dalam menciptakan lingkungan yang lebih baik dengan menyampaikan aduan melalui *Warga Bicara*. Suara Anda penting untuk perubahan positif di sekitar kita. Laporkan masalah atau pelanggaran yang Anda temui dan jadilah bagian dari solusi!</p>

            <form action="{{ route('complaints.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <label for="nomor_pengaduan">Nomor Pengaduan</label>
                <input type="text" id="nomor_pengaduan" name="nomor_pengaduan" value="{{$nomor_pengaduan}}" readonly>

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

                <input type="hidden" name="status" value="Belum ditangani">
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
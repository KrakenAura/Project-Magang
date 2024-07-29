@extends('layouts')

@section('css')
<link rel="stylesheet" href="{{ asset('css/pengaduan.css') }}">
@endsection

@section('content')
<header>
    <h1>Warga Bicara</h1>
</header>
<main>
    <div class="content">
        <div class="form-section">
            <form action="#" method="post">
                <label for="complaint_number">Nomor Pengaduan</label>
                <input type="text" id="complaint_number" name="complaint_number" value="PN-12345678" readonly>

                <label for="name">Nama</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>

                <label for="phone">Nomor Telepon</label>
                <input type="tel" id="phone" name="phone" required>

                <label for="complaint">Deskripsi Pengaduan</label>
                <textarea id="complaint" name="complaint" rows="5" required></textarea>

                <label for="file">Unggah Bukti (opsional)</label>
                <input type="file" id="file" name="file">

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
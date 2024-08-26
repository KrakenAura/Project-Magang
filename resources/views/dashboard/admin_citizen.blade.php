@extends('dashboard/adminlayouts')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin_kotaterkini.css') }}">
@endsection

@section('content')
<div class="hold-transition sidebar-mini">
    <div class="kota-terkini">
        <h1>Citizen Journalist</h1>
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
                        <p class="berita-status">Status: {{ $berita->status }}</p>
                        <div class="berita-actions">
                            <form action="{{ route('berita.update.status', $berita->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="status" value="{{ $berita->status === 'pending' ? 'verified' : 'pending' }}">
                                <button type="submit" class="btn btn-{{ $berita->status === 'pending' ? 'success' : 'warning' }}">
                                    {{ $berita->status === 'pending' ? 'Verify' : 'Mark as Pending' }}
                                </button>
                            </form>
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
                <a href="/admin/berita/category/CitizenJournalist">
                    <button type="button" class="btn btn-primary">Lihat Semua</button>
                </a>
                <a href="/admin/komentar/category/CitizenJournalist"><button type="button" class="btn btn-warning">Lihat Semua Komentar</button></a>
            </div>
        </div>
    </div>
    @endsection
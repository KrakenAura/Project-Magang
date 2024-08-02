@extends('dashboard/adminlayouts')

@section('css')
<link rel="stylesheet" href="{{ asset('css/wargabicara.css') }}">
@endsection

@section('content')
<header>
    <h1>Pengaduan Dashboard</h1>
</header>
<main>
    <div class="dashboard">
        <div class="complaint-section">
            <div class="search-bar mb-3 input-group">
                <input type="text" id="searchInput" class="form-control" placeholder="Cari Pengaduan...">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button" id="searchButton">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Nomor Pengaduan</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($complaints as $complaint)
                    <tr>
                        <td>{{$complaint -> nomor_pengaduan}}</td>
                        <td>{{$complaint -> nama}}</td>
                        <td>{{$complaint -> email}}</td>
                        <td>{{$complaint -> tanggal}}</td>
                        <td>{{$complaint->status}}</td>
                        <td>
                            <a href="#" class="btn btn-view" title="Lihat" data-toggle="modal" data-target=".bd-example-modal-lg">
                                <i class="fas fa-eye"></i>
                            </a>
                            <form action="{{ route('complaint.delete', $complaint->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            <!-- <a href="#" class="btn btn-success" title="Balas" data-toggle="modal" data-target="#reply">
                                <i class="fas fa-reply"></i>
                            </a> -->
                        </td>
                    </tr>
                    <!-- Modal -->
                    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content p-3">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="myLargeModalLabel">Detail Pengaduan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p><strong>Nomor Pengaduan:</strong> {{$complaint -> nomor_pengaduan}}</p>
                                    <p><strong>Nama:</strong> {{$complaint -> nama}}</p>
                                    <p><strong>Email:</strong> {{$complaint -> email}}</p>
                                    <p><strong>Nomor Telepon:</strong> {{$complaint->nomor_telepon}}</p>
                                    <p><strong>Deskripsi:</strong> {{$complaint->deskripsi}}</p>
                                    <p><strong>Bukti Pengaduan:</strong> <a href="{{ asset('storage/' . $complaint->image) }}" download="{{ $complaint->nomor_pengaduan }}-bukti.{{ pathinfo(storage_path('app/public/' . $complaint->image), PATHINFO_EXTENSION) }}" class="btn btn-primary">
                                            Download Image
                                        </a>
                                    </p>
                                    <p><strong>Status:</strong> {{$complaint->status}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    <!-- Modal -->
    <!-- <div class="modal fade" id="reply" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Balasan </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="response">Balasan:</label>
                            <textarea class="form-control" id="response" rows="3"></textarea>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Kirim Balasan</button>
                </div>
            </div>
        </div>
    </div> -->


</main>
@endsection
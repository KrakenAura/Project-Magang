@extends('dashboard/adminlayouts')

@section('css')
<link rel="stylesheet" href="{{ asset('/css/admin_library.css') }}">
@endsection

@section('content')

<div class="library">
    <h1>Library</h1>
    <table class="table">
        <thead>
            <tr>
                <th style="width: 22%">Gambar</th>
                <th style="width: 22%">Nama</th>
                <th style="width: 22%">Deskripsi</th>
                <th style="width: 22%">Link</th>
                <th style="width: 12%">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($librarys as $library)
            <tr>
                <td><img src="{{ asset('storage/' . $library->image) }}" alt="{{ $library->judul }}" class="library-image"></td>
                <td>{{ $library->judul }}</td>
                <td>{{ $library->deskripsi }}</td>
                <td><a href="{{ $library->link }}" target="_blank">{{ $library->link }}</a></td>
                <td>
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#EditModal{{ $library->id }}">Edit</button>
                    <form action="{{ route('library.delete', $library->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>

            <!-- Modal for Editing -->
            <div class="modal fade" id="EditModal{{ $library->id }}" tabindex="-1" role="dialog" aria-labelledby="EditModalLabel{{ $library->id }}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="EditModalLabel{{ $library->id }}">Edit Library</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('library.update', $library->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="judul{{ $library->id }}" class="col-form-label">Nama</label>
                                    <input type="text" class="form-control" id="judul{{ $library->id }}" name="judul" value="{{ $library->judul }}">
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi{{ $library->id }}" class="col-form-label">Deskripsi</label>
                                    <textarea class="form-control" id="deskripsi{{ $library->id }}" name="deskripsi">{{ $library->deskripsi }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="link{{ $library->id }}" class="col-form-label">Link</label>
                                    <input type="text" class="form-control" id="link{{ $library->id }}" name="link" value="{{ $library->link }}">
                                </div>
                                <div class="form-group">
                                    <label for="image{{ $library->id }}" class="col-form-label">Ganti Gambar</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image{{ $library->id }}" name="image" accept="image/*">
                                        <label class="custom-file-label" for="image{{ $library->id }}">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </tbody>
    </table>
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#TambahModal">+ Tambah Library</button>
</div>

<!-- Modal for Adding New Library -->
<div class="modal fade" id="TambahModal" tabindex="-1" role="dialog" aria-labelledby="TambahModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TambahModalLabel">Tambah Library</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('library.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="judul" class="col-form-label">Nama</label>
                        <input type="text" class="form-control" id="judul" name="judul">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi" class="col-form-label">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="link" class="col-form-label">Link</label>
                        <input type="text" class="form-control" id="link" name="link">
                    </div>
                    <div class="form-group">
                        <label for="image" class="col-form-label">Gambar</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image" name="image" accept="image/*">
                            <label class="custom-file-label" for="image">Choose file</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
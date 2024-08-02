@extends('dashboard/adminlayouts')

@section('css')
<link rel="stylesheet" href="{{asset('/css/admin_library.css')}}">

@endsection

@section('content')

<div class="library">
    <table class="table">
        <thead>
            <tr>
                <th style="width: 30%">Gambar</th>
                <th style="width: 30%">Nama</th>
                <th style="width: 30%">Link</th>
                <th style="width: 10%">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($outlooks as $outlook)
            <tr>
                <td><img src="{{ asset('storage/'.$outlook->image) }}" alt="{{ $outlook->title }}" class="library-image"></td>
                <td>{{ $outlook->title }}</td>
                <td><a href="{{ $outlook->link }}" target="_blank">{{ $outlook->link }}</a></td>
                <td>
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#EditModal{{ $outlook->id }}">Edit</button>
                    <form action="{{ route('outlook.delete', $outlook->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        </tbody>

        <div class="modal fade" id="EditModal{{ $outlook->id }}" tabindex="-1" role="dialog" aria-labelledby="EditModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Outlook</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('outlook.update', $outlook->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="title" class="col-form-label">Judul</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{ $outlook->title }}" required>
                            </div>
                            <div class="form-group">
                                <label for="link" class="col-form-label">Link</label>
                                <input type="text" class="form-control" id="link" name="link" value="{{ $outlook->link }}" required>
                            </div>
                            <div class="form-group">
                                <label for="image" class="col-form-label">Ganti Gambar</label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="image" accept="image/*">
                                        <label class="custom-file-label" for="image">Choose file</label>
                                    </div>
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
        <div class="modal fade" id="TambahModal" tabindex="-1" role="dialog" aria-labelledby="TambahModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('outlook.create') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="title" class="col-form-label">Judul</label>
                                <input type="text" class="form-control" id="title" name="title" required>
                            </div>

                            <div class="form-group">
                                <label for="link" class="col-form-label">Link</label>
                                <input type="text" class="form-control" id="link" name="link" required>
                            </div>
                            <div class="form-group">
                                <label for="image" class="col-form-label">Tambah Gambar</label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="image" accept="image/*">
                                        <label class="custom-file-label" for="image">Choose file</label>
                                    </div>
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
    </table>
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#TambahModal">+ Tambah Library</button>
</div>

@endsection
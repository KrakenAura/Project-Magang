@extends('dashboard/adminlayouts')

@section('css')
<link rel="stylesheet" href="{{asset('/css/admin_library.css')}}">

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
                <td><img src="{{ asset('storage/'.$library->image) }}" alt="{{ $library->judul }}" class="library-image"></td>
                <td>{{ $library->judul }}</td>
                <td>{{ $library->deskripsi }}</td>
                <td><a href="{{ $library->link }}" target="_blank">{{ $library->link }}</a></td>
                <td>
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">Edit</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{route('admin.library_tambah')}}"><button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">+ Tambah Library</button></a>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Nama</label>
                            <input type="text" class="form-control" id="recipient-name">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Deskripsi</label>
                            <textarea class="form-control" id="message-text"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Link</label>
                            <input type="text" class="form-control" id="recipient-name">
                        </div>
                        <label for="recipient-name" class="col-form-label">Ganti Gambar</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Upload</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="inputGroupFile01" accept="image/*">
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
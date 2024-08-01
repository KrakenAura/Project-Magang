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
            @foreach ($librarys as $library)
            <tr>
                <td><img src="{{ asset('storage/'.$library->image) }}" alt="{{ $library->title }}" class="library-image"></td>
                <td>{{ $library->judul }}</td>
                <td><a href="{{ $library->link }}" target="_blank">{{ $library->link }}</a></td>
                <td>
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">Edit</button>
                </td>
            </tr>
            @endforeach
        </tbody>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </table>
    <a href="{{route('admin.library_tambah')}}"><button type="button" class="btn btn-success">+ Tambah Library</button></a>
</div>

@endsection
@extends('dashboard/adminlayouts')

@section('css')
<link rel="stylesheet" href="{{asset('/css/admin_profil.css')}}">

@endsection

@section('content')

<div class="profile-section">
    <table class="table">
        <thead>
            <tr>
                <th style="width: 20%">Profil Img</th>
                <th style="width: 30%">Sejarah</th>
                <th style="width: 20%">Deskripsi</th>
                <th style="width: 20%">Struktur Organisasi</th>
                <th style="width: 10%">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><img class="profil-img" src="{{ asset('storage/' . $profiles->image) }}"></td>
                <td>{{$profiles->sejarah}}</td>
                <td>{{$profiles->deskripsi}}</td>
                <td><img class="struktur-img" src="{{ asset('storage/' . $profiles->struktur_organisasi) }}"></td>
                <td>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editProfil">edit</button>
                </td>
            </tr>
        </tbody>

    </table>

    <!-- Modal -->
    <div class="modal fade" id="editProfil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('profile.update', $profiles->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Profil</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="image" class="form-label">Image Profil</label>
                            <input class="form-control" type="file" id="image" name="image">
                        </div>
                        <div class="mb-3">
                            <label for="sejarah" class="form-label">Sejarah</label>
                            <textarea class="form-control" id="sejarah" name="sejarah" rows="3">{{ $profiles->sejarah }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3">{{ $profiles->deskripsi }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="struktur_organisasi" class="form-label">Struktur Organisasi</label>
                            <input class="form-control" type="file" id="struktur_organisasi" name="struktur_organisasi">
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

</div>

@endsection
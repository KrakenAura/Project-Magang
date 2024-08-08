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

    <h1>Crew</h1>
    <div class="crew">
        <div class="team-item">
            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Manuella Nevoresky">
            <h5>Manuella Nevoresky</h5>
            <span>CEO - Founder</span>
            <div class="admin-buttons">
                <button class="btn btn-edit" data-toggle="modal" data-target="#editCrew">Edit</button>
                <button class="btn btn-delete">Delete</button>
            </div>
        </div>

        <div class="team-item">
            <img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="Samuel Hardy">
            <h5>Samuel Hardy</h5>
            <span>CEO - Founder</span>
            <div class="admin-buttons">
                <button class="btn btn-edit">Edit</button>
                <button class="btn btn-delete">Delete</button>
            </div>
        </div>

        <div class="team-item">
            <img src="https://bootdey.com/img/Content/avatar/avatar8.png" alt="Tom Sunderland">
            <h5>Tom Sunderland</h5>
            <span>CEO - Founder</span>
            <div class="admin-buttons">
                <button class="btn btn-edit">Edit</button>
                <button class="btn btn-delete">Delete</button>
            </div>
        </div>

        <div class="team-item">
            <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="John Tarly">
            <h5>John Tarly</h5>
            <span>CEO - Founder</span>
            <div class="admin-buttons">
                <button class="btn btn-edit">Edit</button>
                <button class="btn btn-delete">Delete</button>
            </div>
        </div>

        <!-- Add more team-item divs as needed -->
    </div>
    <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#addCrew">Tambah</button>

    <!-- Modal edit data profil -->
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

    <!-- Modal edit crew     -->
    <div class="modal fade" id="editCrew" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="image" class="form-label">Photo</label>
                        <input class="form-control" type="file" id="image" name="image">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="nama" class="form-control" id="inputName" placeholder="Enter name">
                    </div>
                    <div class="form-group">
                        <label for="jabatan">Jabatan</label>
                        <input type="jabatan" class="form-control" id="inputJabatan" placeholder="Jabatan Anda">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal add crew     -->
    <div class="modal fade" id="addCrew" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="image" class="form-label">Photo</label>
                        <input class="form-control" type="file" id="image" name="image">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="nama" class="form-control" id="inputName" placeholder="Enter name">
                    </div>
                    <div class="form-group">
                        <label for="jabatan">Jabatan</label>
                        <input type="jabatan" class="form-control" id="inputJabatan" placeholder="Jabatan Anda">
                    </div>

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
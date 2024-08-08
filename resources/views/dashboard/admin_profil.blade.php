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
                <th style="width: 50%">Sejarah</th>
                <th style="width: 20%">Struktur Organisasi</th>
                <th style="width: 10%">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><img class="profil-img" src="{{asset('images/banner6.jpg')}}"></td>
                <td>KIM adalah Komunitas yang dibentuk oleh masyarakat, dari masyarakat dan untuk masyarakat serta secara mandiri dan kreatif melakukan aktivitas pengelolaan informasi dan pemberdayaan guna memberikan nilai tambah bagi masyarakat itu sendiri. Berdasarkan Permenkominfo No. 8 Tahun 2019 tentang Penyelenggaraan Urusan Pemerintahan Konkuren Bidang Komunikasi dan Informatika, bahwa Dinas melaksanakan kemitraan dengan pemangku kepentingan, salah satunya adalah Komunitas Informasi Masyarakat, sebagaimana dimaksud dalam Pasal 16 ayat (2) huruf a.</td>
                <td><img class="struktur-img" src="{{asset('images/banner6.jpg')}}"></td>
                <td>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editProfil">edit</button>
                    <button type="button" class="btn btn-danger">delete</button>
                </td>
            </tr>
        </tbody>

    </table>

    <!-- Modal -->
    <div class="modal fade" id="editProfil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Profil</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Image Profil</label>
                        <input class="form-control" type="file" id="formFile">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Sejarah</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Struktur Organisasi</label>
                        <input class="form-control" type="file" id="formFile">
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
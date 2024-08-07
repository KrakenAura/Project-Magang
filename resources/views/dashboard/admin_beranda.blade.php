@extends('dashboard/adminlayouts')

@section('css')
<link rel="stylesheet" href="{{asset('css/admin_beranda.css')}}">
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <h1><strong>Halaman Beranda</strong></h1>
        <h2>Slideshow</h2>
        <div class="slideshow-img">
            <div class="change-img">
                <img src="{{asset('images/news 1.png')}}" alt="">
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#editGambar">Change</button>
            </div>

            <div class="change-img">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahGambar">Tambah</button>
            </div>
        </div>

        <h2>Link TV Desa</h2>
        <div class="link-tv">
            <div class="table-container">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Logo</th>
                            <th>Nama TV</th>
                            <th>Link</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><img src="{{ asset('images/logo tvd.png') }}" alt="Logo" class="table-logo"></td>
                            <td>TV Desa 1</td>
                            <td><a href="#">https://example.com</a></td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editTV">Edit</button>
                                <button type="button" class="btn btn-danger btn-sm">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td><img src="{{ asset('images/logo tvd.png') }}" alt="Logo" class="table-logo"></td>
                            <td>TV Desa 2</td>
                            <td><a href="#">https://example.com</a></td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm">Edit</button>
                                <button type="button" class="btn btn-danger btn-sm">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td><img src="{{ asset('images/logo tvd.png') }}" alt="Logo" class="table-logo"></td>
                            <td>TV Desa 3</td>
                            <td><a href="#">https://example.com</a></td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm">Edit</button>
                                <button type="button" class="btn btn-danger btn-sm">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td><img src="{{ asset('images/logo tvd.png') }}" alt="Logo" class="table-logo"></td>
                            <td>TV Desa 4</td>
                            <td><a href="#">https://example.com</a></td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm">Edit</button>
                                <button type="button" class="btn btn-danger btn-sm">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td><img src="{{ asset('images/logo tvd.png') }}" alt="Logo" class="table-logo"></td>
                            <td>TV Desa 4</td>
                            <td><a href="#">https://example.com</a></td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm">Edit</button>
                                <button type="button" class="btn btn-danger btn-sm">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td><img src="{{ asset('images/logo tvd.png') }}" alt="Logo" class="table-logo"></td>
                            <td>TV Desa 4</td>
                            <td><a href="#">https://example.com</a></td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm">Edit</button>
                                <button type="button" class="btn btn-danger btn-sm">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addTV">Tambah</button>
        </div>

        <h2>Link Live Streaming</h2>
        <div class="link-live">
            <table class="table">
                <thead>
                    <tr>
                        <th>Link</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><a href="#">https://streaming.com</a></td>
                        <td>
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#liveTV">Edit</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="footer-content">
        </div>
        <h2>Footer</h2>
        <div class="footer-edit">
            <table class="table">
                <thead>
                    <tr>
                        <th>Description</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><a>Deskripsi 1</a></td>
                        <td><a>Alamat</a></td>
                        <td>
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#footerData">Edit</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal section -->

<!-- Modal Edit Slider -->
<div class="modal fade" id="editGambar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Gambar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="formFile" class="form-label">Choose Image</label>
                    <input class="form-control" type="file" id="formFile" accept="image/*">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Slider -->
<div class="modal fade" id="tambahGambar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Gambar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="formFile" class="form-label">Choose Image</label>
                    <input class="form-control" type="file" id="formFile" accept="image/*">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Add</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Link TV -->
<div class="modal fade" id="editTV" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Link TV Desa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="formFile" class="form-label">Choose Image</label>
                    <input class="form-control" type="file" id="formFile" accept="image/*">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nama TV</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukan Nama">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Link TV</label>
                    <input type="link" class="form-control" id="exampleFormControlInput1" placeholder="Masukan Link TV">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save Changes</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Link TV -->
<div class="modal fade" id="addTV" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Link TV Desa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="formFile" class="form-label">Choose Image</label>
                    <input class="form-control" type="file" id="formFile" accept="image/*">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nama TV</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukan Nama">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Link TV</label>
                    <input type="link" class="form-control" id="exampleFormControlInput1" placeholder="Masukan Link TV">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Add</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Link stream TV -->
<div class="modal fade" id="liveTV" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Link Live Stream TV Desa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Link Live Stream</label>
                    <input type="link" class="form-control" id="exampleFormControlInput1" placeholder="Masukan Link Live Stream">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save Change</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit data footer -->
<div class="modal fade" id="footerData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Footer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Deskripsi</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Deskripsi">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Address</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Alamat">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save Change</button>
            </div>
        </div>
    </div>
</div>
@endsection
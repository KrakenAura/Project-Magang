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
                <button type="button" class="btn btn-info">Change</button>
            </div>
            <div class="change-img">
                <img src="{{asset('images/news 1.png')}}" alt="">
                <button type="button" class="btn btn-info">Change</button>
            </div>
            <div class="change-img">
                <img src="{{asset('images/news 1.png')}}" alt="">
                <button type="button" class="btn btn-info">Change</button>
            </div>
            <div class="change-img">
                <img src="{{asset('images/news 1.png')}}" alt="">
                <button type="button" class="btn btn-info">Change</button>
            </div>
            <div class="change-img">
                <button type="button" class="btn btn-success">Tambah</button>
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
                                <button type="button" class="btn btn-primary btn-sm">Edit</button>
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
            <button type="button" class="btn btn-success">Tambah</button>
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
                            <button type="button" class="btn btn-primary btn-sm">Edit</button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <button type="button" class="btn btn-success">Tambah</button>
        </div>
    </div>
</div>
@endsection
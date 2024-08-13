@extends('dashboard.adminlayouts')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin_beranda.css') }}">
@endsection

@section('content')

<div class="col-12">
    <h1><strong>Halaman Beranda</strong></h1>
    <!-- Slideshow Section -->
    <h2>Slideshow</h2>
    <div class="slideshow-container">
        @foreach ($slideshows as $slideshow)
        <div class="slideshow-img">
            <div class="change-img">
                <img src="{{ asset('storage/' . $slideshow->image_path) }}" alt="">
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#editGambar{{ $slideshow->id }}">Change</button>
            </div>
        </div>
        <div class="modal fade" id="editGambar{{ $slideshow->id }}" tabindex="-1" role="dialog" aria-labelledby="editGambarLabel{{ $slideshow->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editGambarLabel{{ $slideshow->id }}">Edit Gambar</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('slideshow.update', $slideshow->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <div class="form-group">
                                    <label for="image{{ $slideshow->id }}" class="col-form-label">Ganti Gambar</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image{{ $slideshow->id }}" name="image" accept="image/*">
                                        <label class="custom-file-label" for="image{{ $slideshow->id }}">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                            </div>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
        <div class="tambah-img">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahGambar">Tambah</button>
        </div>
    </div>
</div>

<div class="modal fade" id="tambahGambar" tabindex="-1" role="dialog" aria-labelledby="tambahGambarLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahGambarLabel">Tambah Gambar Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('slideshow.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <div class="form-group">
                            <label for="newImage" class="col-form-label">Pilih Gambar</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="newImage" name="image_path" accept="image/*">
                                <label class="custom-file-label" for="newImage">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Image</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Modal Tambah Slider -->
<div class="modal fade" id="tambahGambar" tabindex="-1" role="dialog" aria-labelledby="tambahGambarLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="change-img">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahGambar">Tambah</button>
                </div>
                <h5 class="modal-title" id="tambahGambarLabel">Tambah Gambar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('slideshow.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Choose Image</label>
                        <input class="form-control" type="file" id="formFile" name="image" accept="image/*">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Live TV Section -->
<h2>Link Live Streaming</h2>
<div class="table-container">
    <table class="table">
        <thead>
            <tr>
                <th>Link</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($livestreams as $livestream)
            <tr>
                <td class="link-live">{{ $livestream->stream_url }}</td>
                <td>
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#liveTV{{ $livestream->id }}">Edit</button>
                </td>
            </tr>
            <!-- Modal Edit Link Live Streaming -->
            <div class="modal fade" id="liveTV{{ $livestream->id }}" tabindex="-1" role="dialog" aria-labelledby="liveTVLabel{{ $livestream->id }}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="liveTVLabel{{ $livestream->id }}">Edit Link Live Streaming</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('livestream.update', $livestream->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="stream_url{{ $livestream->id }}" class="form-label">Link Live Streaming</label>
                                    <input type="text" class="form-control" id="stream_url{{ $livestream->id }}" name="stream_url" value="{{ $livestream->stream_url }}">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Footer Section -->
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
            @if ($footer)
            <tr>
                <td>{{ $footer->description }}</td>
                <td>{{ $footer->address }}</td>
                <td>
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#footerData">Edit</button>
                </td>
            </tr>
            @else
            <tr>
                <td colspan="3">No footer information available.</td>
            </tr>
            @endif
        </tbody>
    </table>
</div>

<!-- Modal Edit Footer -->
@if ($footer)
<div class="modal fade" id="footerData" tabindex="-1" role="dialog" aria-labelledby="footerDataLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="footerDataLabel">Edit Data Footer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('footer.update', $footer->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" class="form-control" id="description" name="description" value="{{ $footer->description }}">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address" value="{{ $footer->address }}">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endif

<h2>Banner Section</h2>
<div class="banner-section">
    <table class="table">
        <thead>
            <tr>
                <th>Banner Horizontal</th>
                <th>Banner Vertical</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach($banners as $banner)
                <td>
                    <div class="{{ $banner->id == 1 ? 'image-ads2' : 'image-ads1' }}">
                        <img src="{{ asset('storage/' . $banner->banner) }}" alt="">
                    </div>
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editbanner{{ $banner->id }}">Edit</button>
                </td>
                <!-- Edit Banner Modal -->
                <div class="modal fade" id="editbanner{{ $banner->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel{{ $banner->id }}" aria-hidden="true">
                    <form action="{{ route('banner.update', $banner->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel{{ $banner->id }}">Edit Banner {{ $banner->id == 1 ? 'Horizontal' : 'Vertical' }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="newImage{{ $banner->id }}" name="banner" accept="image/*">
                                        <label class="custom-file-label" for="newImage{{ $banner->id }}">Choose file</label>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                @endforeach
            </tr>
        </tbody>
    </table>
</div>



@endsection
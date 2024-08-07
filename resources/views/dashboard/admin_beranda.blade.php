@extends('dashboard.adminlayouts')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin_beranda.css') }}">
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <h1><strong>Halaman Beranda</strong></h1>

        <!-- Slideshow Section -->
        <h2>Slideshow</h2>
        @foreach ($slideshows as $slideshow)
        <div class="slideshow-img">
            <div class="change-img">
                <img src="{{ asset('storage/' . $slideshow->image) }}" alt="">
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#editGambar{{ $slideshow->id }}">Change</button>
            </div>
            <div class="change-img">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahGambar">Tambah</button>
            </div>
        </div>

        <!-- Modal Edit Slider -->
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
                                <label for="formFile{{ $slideshow->id }}" class="form-label">Choose Image</label>
                                <input class="form-control" type="file" id="formFile{{ $slideshow->id }}" name="image" accept="image/*">
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
        @endforeach

        <!-- Modal Tambah Slider -->
        <div class="modal fade" id="tambahGambar" tabindex="-1" role="dialog" aria-labelledby="tambahGambarLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
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
        <div class="live-tv">
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
                        <td>{{ $livestream->stream_url }}</td>
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

    </div>
</div>
@endsection
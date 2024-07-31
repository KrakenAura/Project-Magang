@extends('dashboard/adminlayouts')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin_galeri.css') }}">
@endsection

@section('content')
<div class="content">
    <div class="gallery-container">
        @foreach ( $galeries as $galeri)

        <div class="card galery-card">
            <div class="card-image">
                <img src="{{asset('storage/Galery_images/'.$galeri->image)}}" alt={{$galeri->title}}>
            </div>
            <div class="card-desc">
                <h4>{{$galeri->title}}</h4>
                <div class="card-actions">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalUpdate{{$galeri->id}}">Ganti</button>
                    <button class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <!--Modal -->
    <div class="modal fade" id="modalUpdate{{$galeri->id}}" tabindex="-1" role="dialog" aria-labelledby="modalUpdate" aria-hidden="true">
        <form action="{{ route('UpdateGaleri', $galeri->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="UpdateImage">Change images</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            @php
                            $debug_id = $galeri->id;
                            @endphp
                            <p>Debug ID: {{ $debug_id }}</p>
                            <label for="UpdateDeskripsi">Change Description</label>
                            <input type="text" class="form-control" id="UpdateDeskripsi" name="title" placeholder="Enter New Description" value="{{$galeri->title}}">

                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Change Image</label>
                            <input type="file" name="image" id="banner-image" class="banner-input" accept="image/*">
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
    <button class="btn btn-success">+ Add New Image</button>
</div>
@endsection
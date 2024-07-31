@extends('dashboard/adminlayouts')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin_galeri.css') }}">
@endsection

@section('content')
<div class="content">
    <div class="gallery-container">
        <div class="card galery-card">
            <div class="card-image">
                <img src="{{asset('images/news 4.png')}}" alt="Image Description">
            </div>
            <div class="card-desc">
                <h4>Image Description</h4>
                <div class="card-actions">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Ganti</button>
                    <button class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>
        <div class="card galery-card">
            <div class="card-image">
                <img src="{{asset('images/news 4.png')}}" alt="Image Description">
            </div>
            <div class="card-desc">
                <h4>Image Description</h4>
                <div class="card-actions">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Ganti</button>
                    <button class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>
        <div class="card galery-card">
            <div class="card-image">
                <img src="{{asset('images/news 4.png')}}" alt="Image Description">
            </div>
            <div class="card-desc">
                <h4>Image Description</h4>
                <div class="card-actions">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Ganti</button>
                    <button class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>
        <!-- Add more gallery items as needed -->
    </div>
    <button class="btn btn-success" data-toggle="modal" data-target="#exampleModal">+ Add New Image</button>

    <!--Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">images</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Enter Description</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Description">
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Image</label>
                        <input class="form-control" type="file" id="formFile" name="image" accept="image/*">
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
@extends('dashboard/adminlayouts')

@section('css')

@endsection

@section('content')

<div class="link-live">
    <table class="table">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Link</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>TES</td>
                <td><a href="#">https://streaming.com</a></td>
                <td>
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">Edit</button>
                </td>
            </tr>
        </tbody>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <label for="exampleInputEmail1">Ganti Link</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter new Link">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </table>
</div>

@endsection
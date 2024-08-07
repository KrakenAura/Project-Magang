@extends('dashboard/adminlayouts')

@section('css')
<link rel="stylesheet" href="{{ asset('/css/admin_contactus.css') }}">
@endsection

@section('content')

<div class="library">
    <h1>Contact Us</h1>
    <table class="table">
        <thead>
            <tr>
                <th style="width: 18%">Nama</th>
                <th style="width: 18%">Logo</th>
                <th style="width: 18%">Link Instagram</th>
                <th style="width: 18%">Link Web</th>
                <th style="width: 18%">Link YouTube</th>
                <th style="width: 10%">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($socials as $contact)
            <tr>
                <td>{{ $contact->nama_tv }}</td>
                <td><img src="{{ asset('storage/' . $contact->logo) }}" alt="{{ $contact->nama_tv }}" class="library-image"></td>
                <td>{{ $contact->link_insta }}</td>
                <td>{{ $contact->link_web }}</td>
                <td>{{ $contact->link_yt }}</td>
                <td>
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#EditModal{{ $contact->id }}">Edit</button>
                    <form action="{{ route('socials.destroy', $contact->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>

            <!-- Edit Modal -->
            <div class="modal fade" id="EditModal{{ $contact->id }}" tabindex="-1" role="dialog" aria-labelledby="EditModalLabel{{ $contact->id }}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="EditModalLabel{{ $contact->id }}">Edit Contact</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('socials.update', $contact->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="nama_tv{{ $contact->id }}" class="col-form-label">Nama</label>
                                    <input type="text" class="form-control" id="nama_tv{{ $contact->id }}" name="nama_tv" value="{{ $contact->nama_tv }}">
                                </div>
                                <div class="form-group">
                                    <label for="link_web{{ $contact->id }}" class="col-form-label">Link Web</label>
                                    <input type="text" class="form-control" id="link_web{{ $contact->id }}" name="link_web" value="{{ $contact->link_web }}">
                                </div>
                                <div class="form-group">
                                    <label for="link_insta{{ $contact->id }}" class="col-form-label">Link Instagram</label>
                                    <input type="text" class="form-control" id="link_insta{{ $contact->id }}" name="link_insta" value="{{ $contact->link_insta }}">
                                </div>
                                <div class="form-group">
                                    <label for="link_yt{{ $contact->id }}" class="col-form-label">Link YouTube</label>
                                    <input type="text" class="form-control" id="link_yt{{ $contact->id }}" name="link_yt" value="{{ $contact->link_yt }}">
                                </div>
                                <div class="form-group">
                                    <label for="logo{{ $contact->id }}" class="col-form-label">Ganti Logo</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="logo{{ $contact->id }}" name="logo" accept="image/*">
                                        <label class="custom-file-label" for="logo{{ $contact->id }}">Choose file</label>
                                    </div>
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
            @endforeach
        </tbody>
    </table>

    <!-- Add New Contact Modal -->
    <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahModalLabel">Tambah Contact</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('socials.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama_tv" class="col-form-label">Nama</label>
                            <input type="text" class="form-control" id="nama_tv" name="nama_tv" placeholder="Enter Nama">
                        </div>
                        <div class="form-group">
                            <label for="link_web" class="col-form-label">Link Web</label>
                            <input type="text" class="form-control" id="link_web" name="link_web" placeholder="Enter Link Web">
                        </div>
                        <div class="form-group">
                            <label for="link_insta" class="col-form-label">Link Instagram</label>
                            <input type="text" class="form-control" id="link_insta" name="link_insta" placeholder="Enter Link Instagram">
                        </div>
                        <div class="form-group">
                            <label for="link_yt" class="col-form-label">Link YouTube</label>
                            <input type="text" class="form-control" id="link_yt" name="link_yt" placeholder="Enter Link YouTube">
                        </div>
                        <div class="form-group">
                            <label for="logo" class="col-form-label">Logo</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="logo" name="logo" accept="image/*">
                                <label class="custom-file-label" for="logo">Choose file</label>
                            </div>
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
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahModal">+ Tambah</button>

@endsection
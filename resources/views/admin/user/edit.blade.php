@extends('admin.layouts.app')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title"> Edit profile </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page"> Dashboard </li>
                        <li class="breadcrumb-item active" aria-current="page"> Edit profile </li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" action="{{ URL('user/update') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" placeholder="Name"
                                        name="name" value="{{ Auth::user()->name }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input type="email" class="form-control" id="email" placeholder="Email" disabled
                                        name="email" value="{{ Auth::user()->email }}">
                                </div>
                                <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                            </form>
                        </div>
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <form class="form-sample" action="{{ URL('user/update-profile-photo') }}" method="POST"
                                        enctype="multipart/form-data">
                                        <div class="form-group">
                                            @csrf
                                            <label>Image upload</label>
                                            <input type="file" name="image" class="file-upload-default" required>
                                            <div class="input-group col-xs-12">
                                                <input type="text" class="form-control file-upload-info" disabled
                                                    placeholder="Upload Logo">
                                                <span class="input-group-append">
                                                    <button class="file-upload-browse btn btn-gradient-primary"
                                                        type="button">Upload</button>
                                                </span>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('admin.includes.footer')
    </div>
@endsection

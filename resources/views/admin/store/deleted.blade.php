@extends('admin.layouts.app')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title"> Recently deleted </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Stores</li>
                        <li class="breadcrumb-item active" aria-current="page">Recently deleted</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th> Store </th>
                                        <th> Name </th>
                                        <th> Address </th>
                                        <th> Restore </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($stores as $store)
                                        <tr>
                                            <td class="py-1">
                                                <img src="{{ $store->logo }}" alt="image" />
                                            </td>
                                            <td> {{ $store->name }} </td>
                                            <td>
                                                {{ $store->address }}
                                            </td>
                                            <td>
                                                <form action="{{ URL('store/restore/' . $store->id) }}" method="POST">
                                                    @csrf
                                                    <button class="btn btn-sm btn-gradient-success btn-rounded"
                                                        type="submit">Restore</button>
                                                </form>
                                            </td>
                                        </tr>
                                        <tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{ $stores->links('vendor.pagination.simple-bootstrap-4') }}
            </div>
        </div>
        @include('admin.includes.footer')
    </div>
@endsection

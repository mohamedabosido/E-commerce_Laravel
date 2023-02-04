@extends('admin.layouts.app')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title"> Show all stores </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Stores</li>
                        <li class="breadcrumb-item active" aria-current="page">Show all stores</li>
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
                                        <th> Edit </th>
                                        <th> Delete </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($stores as $store)
                                        <tr>
                                            <td class="py-1">
                                                <img src="{{$store->logo}}" alt="image" />
                                            </td>
                                            <td> {{ $store->name }} </td>
                                            <td>
                                                {{ $store->address }}
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-gradient-info btn-rounded"
                                                    href="{{ URL('store/edit/' . $store->id) }}">Edit</a>
                                            </td>
                                            <td>
                                                <form action="{{ URL('store/delete/' . $store->id) }}" method="POST">
                                                    @csrf
                                                    <button class="btn btn-sm btn-gradient-danger btn-rounded"
                                                        type="submit">Delete</button>
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

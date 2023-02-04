@extends('admin.layouts.app')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title"> Recently deleted </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Products</li>
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
                                        <th> Product </th>
                                        <th> Name </th>
                                        <th> Description </th>
                                        <th> Original Price </th>
                                        <th> Discount Price </th>
                                        <th> Has Discount </th>
                                        <th> Store </th>
                                        <th> Restore </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td class="py-1">
                                                <img src="{{$product->photo }}" alt="image" />
                                            </td>
                                            <td> {{ $product->name }} </td>
                                            <td>
                                                {{ $product->description }}
                                            </td>
                                            <td>
                                                {{ $product->base_price }}
                                            </td>
                                            <td>
                                                {{ $product->discount_price }}
                                            </td>
                                            <td>
                                                @if ($product->is_discount)
                                                YES
                                                @else
                                                NO
                                                @endif
                                            </td>
                                            <td>
                                                {{ $product->store->name }}
                                            </td>
                                            <td>
                                                <form action="{{ URL('product/restore/' . $product->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit"
                                                        class="btn btn-sm btn-gradient-success btn-rounded">Restore</button>
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
                {{$products->links('vendor.pagination.simple-bootstrap-4')}}
            </div>
        </div>
        @include('admin.includes.footer')
    </div>
@endsection

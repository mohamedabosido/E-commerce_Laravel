@extends('admin.layouts.app')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title"> Show all purchase transactions </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Purchase Transactions</li>
                        <li class="breadcrumb-item active" aria-current="page">Show all purchase transactions</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-lg-12 stretch-card">
                    <div class="card">
                      <div class="card-body">
                        </p>
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th> # </th>
                              <th> Product name </th>
                              <th> Store name </th>
                              <th> Purchase price </th>
                              <th> Time </th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($purchase_transactions as $purchase_transaction)
                            <tr class="table-info">
                              <td> {{$purchase_transaction->id}} </td>
                              <td> {{$purchase_transaction->product->name}} </td>
                              <td> {{$purchase_transaction->product->store->name}} </td>
                              <td> $ {{$purchase_transaction->purchase_price}} </td>
                              <td> {{$purchase_transaction->created_at}} </td>
                            </tr>                                
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  {{$purchase_transactions->links('vendor.pagination.simple-bootstrap-4')}}
            </div>
        </div>
        @include('admin.includes.footer')
    </div>
@endsection

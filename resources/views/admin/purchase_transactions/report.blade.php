@extends('admin.layouts.app')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title"> Total report </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Purchase Transactions</li>
                        <li class="breadcrumb-item active" aria-current="page">Total report</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            </p>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th> Product </th>
                                        <th> Total amount </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($purchase_transactions_prdoucts as $purchase_transaction_prdoucts)
                                        <tr>
                                             <td> {{ $purchase_transaction_prdoucts[0]->product->name }} </td>  {{--The Same Product Name --}}
                                            @php
                                                $total = 0;
                                            @endphp
                                            @foreach ($purchase_transaction_prdoucts as $purchase_transaction_prdouct)
                                                @php
                                                    $total = $total + $purchase_transaction_prdouct->purchase_price;
                                                @endphp
                                            @endforeach
                                            <td>$ {{ $total }}</td>
                                    @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('admin.includes.footer')
    </div>
@endsection

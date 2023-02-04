@extends('admin.layouts.app')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">
                    <span class="page-title-icon bg-gradient-primary text-white me-2">
                        <i class="mdi mdi-home"></i>
                    </span> Dashboard
                </h3>
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">
                            <span></span>Overview <i
                                class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="row">
                <div class="col-md-4 stretch-card grid-margin">
                    <div class="card bg-gradient-danger card-img-holder text-white">
                        <div class="card-body">
                            <img src="{{asset('admin_assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                            <h4 class="font-weight-normal mb-3">Total Sales <i
                                    class="mdi mdi-chart-line mdi-24px float-right"></i>
                            </h4>
                            <h2 class="mb-5">$ {{$total_sales}}</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 stretch-card grid-margin">
                    <div class="card bg-gradient-info card-img-holder text-white">
                        <div class="card-body">
                            <img src="{{asset('admin_assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                            <h4 class="font-weight-normal mb-3">Stores <i class="mdi mdi-store mdi-24px float-right"></i>
                            </h4>
                            <h2 class="mb-5">{{ count($stores) }}</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 stretch-card grid-margin">
                    <div class="card bg-gradient-success card-img-holder text-white">
                        <div class="card-body">
                            <img src="{{asset('admin_assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                            <h4 class="font-weight-normal mb-3">Products <i class="mdi mdi-cart mdi-24px float-right"></i>
                            </h4>
                            <h2 class="mb-5">{{ count($products) }}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Admins</h4>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th> Name </th>
                                            <th> Email </th>
                                            <th> Created at </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                        <tr>
                                            <td>
                                                <img src="{{'/storage/'.$user->image}}" class="me-2" alt="image">
                                               {{$user->name}}
                                            </td>
                                            <td> {{$user->email}} </td>
                                            <td> {{$user->created_at}} </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('admin.includes.footer')
    </div>
@endsection

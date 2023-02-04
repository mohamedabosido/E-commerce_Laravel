<div class="container-fluid page-body-wrapper">
    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
            <li class="nav-item nav-profile">
                <a href="{{URL('user/edit')}}" class="nav-link">
                    <div class="nav-profile-image">
                        <img src="{{ '/storage/'. Auth::user()->image }}" alt="profile">
                        <span class="login-status online"></span>
                        <!--change to offline or busy as needed-->
                    </div>
                    <div class="nav-profile-text d-flex flex-column">
                        <span class="font-weight-bold mb-2">{{ Auth::user()->name }}</span>
                        <span class="text-secondary text-small">{{ Auth::user()->name }}</span>
                    </div>
                    <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
                </a>
            </li>
            <li class="nav-item sidebar-actions border-bottom border-top">
                <span class="nav-link">
                    <a class=" btn btn-block btn-lg btn-gradient-primary" href="{{ URL('product/create') }}">NEW
                        PRODUCT</a>
                </span>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin') }}">
                    <span class="menu-title">Dashboard</span>
                    <i class="mdi mdi-home menu-icon"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#stores" aria-expanded="false"
                    aria-controls="stores">
                    <span class="menu-title">Stores</span>
                    <i class="menu-arrow"></i>
                    <i class="mdi mdi mdi-store menu-icon"></i>
                </a>
                <div class="collapse" id="stores" style="">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{ URL('store/create') }}">Add new
                                store</a>
                        </li>
                        <li class="nav-item"> <a class="nav-link" href="{{ URL('store') }}">Show all stores</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{ URL('store/deleted') }}">Recently deleted</a></li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#products" aria-expanded="false"
                    aria-controls="products">
                    <span class="menu-title">Products</span>
                    <i class="menu-arrow"></i>
                    <i class="mdi mdi-cart menu-icon"></i>
                </a>
                <div class="collapse" id="products" style="">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{ URL('product/create') }}">Add new product</a>
                        </li>
                        <li class="nav-item"> <a class="nav-link" href="{{ URL('product') }}">Show all products</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{ URL('product/deleted') }}">Recently deleted</a></li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#transactions" aria-expanded="false"
                    aria-controls="transactions">
                    <span class="menu-title">Purchase Transactions</span>
                    <i class="menu-arrow"></i>
                    <i class="mdi mdi-cash-multiple menu-icon"></i>
                </a>
                <div class="collapse" id="transactions" style="">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{URL('purchase_transactions')}}">Show all transactions</a>
                        </li>
                        <li class="nav-item"> <a class="nav-link" href="{{URL('purchase_transactions/report')}}">Total report</a></li>
                    </ul>
                </div>
            </li>

        </ul>
    </nav>

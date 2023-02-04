        <!-- header section strats -->
        <header class="header_section">
            <div class="container">
                <nav class="navbar navbar-expand-lg custom_nav-container ">
                    <a class="navbar-brand" href="{{URL('site')}}"><img width="250"
                            src="{{ asset('site_assets/images/logo.png') }}" alt="#" /></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class=""> </span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{URL('site')}}">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{URL('site/stores')}}">Stores</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{URL('site/products')}}">Products</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="{{URL('site'.'#search')}}"><i class="fa fa-search" aria-hidden="true"></i> Search</a>
                          </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
        <!-- end header section -->
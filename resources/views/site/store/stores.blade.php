@extends('site.layouts.app')
@section('content')
    <!-- product section -->
    <section class="inner_page_head">
        <div class="container_fuild">
           <div class="row">
              <div class="col-md-12">
                 <div class="full">
                    <h3>Stores Grid</h3>
                 </div>
              </div>
           </div>
        </div>
     </section>
    <section class="product_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    Our <span>Stores</span>
                </h2>
            </div>
            <div class="row">
                @foreach ($stores as $store)
                    <div class="col-sm-6 col-md-4 col-lg-4">
                        <div class="box">
                            <div class="option_container">
                                <div class="options">
                                    <a href="{{URL('site/store/'.$store->id)}}" class="option2">
                                        View Store
                                    </a>
                                </div>
                            </div>
                            <div class="img-box">
                                <img src="{{ $store->logo }}" alt="">
                            </div>
                            <div class="detail-box">
                                <h5>
                                    {{ $store->name }}
                                </h5>
                            </div>
                            <div class="detail-box">
                                <h6>
                                    <i class="fa fa-map-marker" aria-hidden="true"></i>  {{ $store->address }}
                                </h6>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="paginate-box mt-5">
                {{$stores->links('vendor.pagination.default')}}
            </div>
        </div>
    </section>
    <!-- end product section -->
@endsection
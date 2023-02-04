@extends('site.layouts.app')
@section('content')
    <section class="inner_page_head">
        <div class="container_fuild">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <h3>{{ $store->name }} Grid</h3>
                        <h5>{{ $store->address }}</h5>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product section -->
    <section class="product_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    Our <span>products</span>
                </h2>
            </div>
            <div class="row">
                @foreach ($store->products as $product)
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="box">
                            <div class="option_container">
                                <div class="options">
                                    <form action="{{ URL('purchase_transactions/store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" value="{{ $product->id }}" name="product_id">
                                        <input type="hidden"
                                            value="@if ($product->is_discount) {{ $product->discount_price }} @else {{ $product->base_price }} @endif"
                                            name="purchase_price">
                                        <button type="submit" class="option1" id="submit-btn">
                                            Buy Now
                                        </button>
                                    </form>

                                </div>
                            </div>
                            <div class="img-box">
                                <img src=" {{ $product->photo }}" alt="">
                            </div>
                            <div class="detail-box">
                                <h5>
                                    {{ $product->name }}
                                </h5>
                            </div>
                            <div class="detail-box">
                                <h6>
                                    {{ $product->description }}
                                </h6>
                            </div>
                            <div class="detail-box">
                                @if ($product->is_discount)
                                    <h6>
                                        <del>
                                            $ {{ $product->base_price }}
                                        </del>
                                    </h6>
                                    <h6>
                                        $ {{ $product->discount_price }}
                                    </h6>
                                @else
                                    <h6>
                                        $ {{ $product->base_price }}
                                    </h6>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
        </div>
        </div>
    </section>
    <!-- end product section -->
@endsection

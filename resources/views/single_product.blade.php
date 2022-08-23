@extends('layout.main')

@section('content')
    <div class="container-fluid page-header mb-5 position-relative overlay-bottom">
        <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5" style="min-height: 400px">
            <h1 class="display-4 mb-3 mt-0 mt-lg-5 text-white text-uppercase">Menu</h1>
            <div class="d-inline-flex mb-lg-5">
                <p class="m-0 text-white"><a class="text-white" href="">Home</a></p>
                <p class="m-0 text-white px-2">/</p>
                <p class="m-0 text-white">Menu</p>
            </div>
        </div>
    </div>

    <!-- Menu Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            @if (Session::get('message'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul class="p-0 m-0" style="list-style: none;">
                        <li>Please Login First!</li>
                    </ul>
                </div>
            @endif
            <div class="section-title">
                <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">Menu & Pricing</h4>
                <h1 class="display-4">Products</h1>
            </div>
            <div class=" row">
                <div class="col-lg-12">

                    @foreach ($product_array as $product)
                        <div class=" row align-items-center mb-5 text-center">
                            <div class="col-12 col-sm-12">
                                <img style="width:200px; height: 200px" class=" rounded-circle mb-3 mb-sm-8"
                                    src="{{ asset('img/' . $product->image) }}" alt="">
                                <h5 class="menu-price" style="width: 96px">৳{{ $product->price }}</h5>
                            </div>
                            <div class="col-12 col-Sm-12 mt-5">
                                <h4>{{ $product->name }}</h4>
                                <p class="m-0">{{ $product->description }}</p>
                            </div>
                            <form class="mx-auto mt-3" method="POST" action="{{ route('add_to_cart') }}">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="hidden" name="price" value="{{ $product->price }}">
                                <input type="hidden" name="qty" value="1">
                                <input type="submit" value="Add to Cart" class="btn btn-warning">
                            </form>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection
<!-- Menu End ->

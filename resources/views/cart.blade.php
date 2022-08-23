@extends ('layout.main')
@section('content')
    <!-- <Page Header Start> -->
    <div class="container-fluid page-header mb-5 position-relative overlay-bottom">
        <div class="d-flex flex-column align-items-center justify-content-cenrer pt-0 pt-lg-5" style="min-height: 400px">
            <h1 class="display-4 mb-3 mt-0 mt-lg-5 text-white text-uppercase"> Cart</h1>
            <div class="d-inline-flex mb-lg-5">
                <p class="m-0 text-white"><a class="text-white" href="">Home</a></p>
                <p class="m-0 text-white" px-2></p>
                <p class="m-0 text-white">/ Cart</p>
            </div>
        </div>
    </div>
    <!-- created by me -->

    <section class="cart container mt-2 my-3 py-5">
        <div class="container mt-2">

            <h4>Your Cart</h4>

        </div>
        <form method="POST" action="{{ route('checkout') }}">
            @csrf
            <table>
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($carts as $cart)
                        <tr>
                            <td>
                                <img class="w-50 rounded-circle mb-3 mb-sm-0" src="{{ asset('img/' . $cart->products->image ?? 'img/chocolate-cake.jpg') }}" alt="">
                            </td>
                            <td>{{ $cart->products->name ?? '' }}</td>
                            <td>
                                <input type="hidden" name="product_id[]" value="{{ $cart->products->id }}">
                                <input type="hidden" name="price[]" value="{{ $cart->products->price }}">
                                <input type="number" name="qty[]" min="1" max="1000" class="form-control" value="{{ $cart->qty }}" style="height: 35px">
                            </td>
                            {{-- <td>
                      <button class="btn btn-sm btn-info minus_qty" id="{{ $cart->id }}" onclick="minus_qty(this.id)">-</button> 
                      <input min="1" class="qty" value="{{ $cart->qty }}" disabled style="height: 35px">
                      <span class="new_qty"></span>
                      <button class="btn btn-sm btn-info plus_qty" id="{{ $cart->id }}" onclick="plus_qty(this.id)">+</button>
                    </td> --}}
                            <td>{{ $cart->price }}</td>
                        </tr>
                    @endforeach

                    {{-- <tr>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> --------------------------</td>
                </tr>
                <tr>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> Total = {{ $carts->sum('total_price') }} </td>
                </tr>
                <tr>
                </tr> --}}
                </tbody>
            </table>

            <div class="checkout-container">
                <!--this if codition will work if the cart is not empty or cart total is zero-->
                <input type="submit" class="btn checkout-btn" value="checkout" name="">
            </div>
        </form>
    </section>
@endsection

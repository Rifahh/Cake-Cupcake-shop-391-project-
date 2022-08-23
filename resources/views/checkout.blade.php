@extends ('layout.main')

@section('content')


<!-- <Page Header Start> -->
<div class="container-fluid page-header mb-5 position-relative overlay-bottom">
        <div class="d-flex flex-column align-items-center justify-content-cenrer pt-0 pt-lg-5" style="min-height: 400px">
        <h1 class="display-4 mb-3 mt-0 mt-lg-5 text-white text-uppercase"> Checkout</h1>
           <div class= "d-inline-flex mb-lg-5">
               <p class="m-0 text-white"><a class="text-white" href="">Home</a></p>
               <p class="m-0 text-white" px-2></p>
               <p class="m-0 text-white">Checkout</p>
            </div>
       </div>
     </div>   
<!-- <Page Header Ends> -->


<!-- Checkout -->
<section class="my-2 py-3 checkout">
    <div class= "container text-center mt-1 pt-5">
        <h2>Check Out</h2>
        <hr class="mx-auto">
    </div>    


    <div class="mx-auto container">
        <form id="checkout-form" method="POST" action="{{ route('place.order')}}">
            @csrf
            @foreach ($all_carts as $all_cart)
                <input type="hidden" name="product_id[]" value="{{ $all_cart->products->id }}">
                <input type="hidden" name="qty[]" value="{{ $all_cart->qty }}">
                <input type="hidden" name="price[]" value="{{ $all_cart->price }}">
            @endforeach
            <div class="form-group checkout-small-element">
                <label for="">Name</label>
                <input type="text" class="form-control" id="checkout-name" name="name"
                placeholder="name" required>
            </div>  
            
            <div class="form-group checkout-small-element">
                <label for="">Email</label>
                <input type="text" class="form-control" id="checkout-email" name="email"
                placeholder="email address" required>
            </div>  

            <div class="form-group checkout-small-element">
                <label for="">Phone</label>
                <input type="text" class="form-control" id="checkout-phone" name="phone"
                placeholder="phone number" required>
            </div>  

            <div class="form-group checkout-small-element">
                <label for="">City</label>
                <input type="text" class="form-control" id="checkout-city" name="city"
                placeholder="city" required>
            </div>  

            <div class="form-group checkout-large-element">
                <label for="">Address</label>
                <input type="text" class="form-control" id="checkout-address" name="address"
                placeholder="address" required>
            </div>  

            <!-- //that session code starts here -->

            <div class="form-group checkout-btn-container">
                <p>Total amount: ${{ $cart->sum('total_price') }}</p>
                <input type="submit" class="btn" id="checkout-btn" name="checkout_btn"
                value="Place Order">
            </div>
            <!-- //that session code ends here -->
        </form>
    </div>
</section>

@endsection
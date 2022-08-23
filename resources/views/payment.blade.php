@extends ('layout.main')
@section('content')

<!-- <Page Header Start> -->
<div class="container-fluid page-header mb-5 position-relative overlay-bottom">
        <div class="d-flex flex-column align-items-center justify-content-cenrer pt-0 pt-lg-5" style="min-height: 400px">
        <h1 class="display-4 mb-3 mt-0 mt-lg-5 text-white text-uppercase"> Payment</h1>
           <div class= "d-inline-flex mb-lg-5">
               <p class="m-0 text-white"><a class="text-white" href="">Home</a></p>
               <p class="m-0 text-white" px-2></p>
               <p class="m-0 text-white">/ Payment</p>
            </div>
       </div>
     </div>       

<section class="container mt-2 my-3 py-5">
    <div class="contaniner mt-2 text-center">
          <h4>Payment</h4>

          <h4 style="color:blue" class="my-5">Total: 70</h4>
          <a href="#" onclick="myFunction()" class="btn  btn-primary"> <span class="text">Cash On Delivery</span> <i class="fas fa-shopping-cart"></i>  </a> 
          <br>
          <script>
            function myFunction() {
              alert("Your order has been placed successfully!");
            }
          </script>
          <br>
          <a href="#" onclick="myFunction2()" class="btn  btn-primary"> <span class="text">Pay Online</span> <i class="fab fa-cc-visa"></i>  </a>
          <script> function myFunction2() {
            alert("Failed!");
             }
          </script>
     
        </div>         
</section>
@endsection
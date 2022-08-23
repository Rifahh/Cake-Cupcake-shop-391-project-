@extends ('layout.main')
@section('content')

<!-- <Page Header Start> -->
<div class="container-fluid page-header mb-5 position-relative overlay-bottom">
        <div class="d-flex flex-column align-items-center justify-content-cenrer pt-0 pt-lg-5" style="min-height: 400px">
        <h1 class="display-4 mb-3 mt-0 mt-lg-5 text-white text-uppercase"> Cart</h1>
           <div class= "d-inline-flex mb-lg-5">
               <p class="m-0 text-white"><a class="text-white" href="">Home</a></p>
               <p class="m-0 text-white" px-2></p>
               <p class="m-0 text-white">/ Cart</p>
            </div>
       </div>
     </div>       


<section class="cart container mt-2 my-3 py-5">
     <div class="container mt-2">
       <h4> Your Cart</h4>
</div>

  <table class= "pt-5">
   <tr>
      <th>Product</th>
      <th>Quantity</th>
      <th>Subtotal</th>
   </tr>

         <tr>
           <td>
             <div class= "product-info">
             <img src="{{asset('images/'.$product ['image'])}}">
               <div>
                 <p>Products</p>
                 <small><span>$</span>199</small>
                 <br>
                 <form>
                   <input type="hidden" name="id" value="1">
                   <input type="submit" name="remove_btn" class="remove_btn" value="remove">
                 </form>
               </div>
             </div>
           </td>

           <td>
             <form>
               <input type="number" name="quantity" value="1">
               <input type="submit" name="edit_product_quantity_btn" class="edit-btn" value="edit">   
             </form>
           </td> 

  </table>  
  
  <div class="cart-total">
    <table>
      <tr>
        <td> </td>
        <td></td>
     </tr>
    </table>
  </div>


  <div class="checkout_container">
    <form>
    <input type="submit" name="" class="btn checkout-btn" value="Checkout">   
    </form>
  </div>

</section>

           


@endsection




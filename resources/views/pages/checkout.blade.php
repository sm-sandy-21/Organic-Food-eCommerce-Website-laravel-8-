@extends('layout')
@section('content')
<section id="cart_item">
   <div class="container"> 
    <div class="register-req">
        <p>Please give your information to confrim your order</p>
    </div><!--/register-req-->

    <div class="shopper-informations">
        <div class="row">
            
            <div class="col-sm-12 clearfix">
                <div class="bill-to">
                    <p>shipping Address</p>
                    <div class="form-one">
                        <form action="{{ url('/save-shipping-details') }}" method="POST">   
                            @csrf                         
                            <input type="text" name="shipping_email"  placeholder="Email*">                          
                            <input type="text" name="shipping_first_name"  placeholder="First Name *">
                            <input type="text" name="shipping_last_name"  placeholder="Last Name *">
                            <input type="text" name="shipping_phone"  placeholder="Phone *">
                            <input type="text" name="shipping_address"  placeholder="Address  *">
                            <input type="text" name="shipping_city"  placeholder="City*">
                            <input type="submit" class="btn btn-warning" value="Done">
                        </form>
                    </div>                   
                </div>
            </div>				
        </div>
    </div>
    <div class="review-payment">
        <h2>Review & Payment</h2>
    </div>
   </div>
</section>
@endsection
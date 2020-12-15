@extends('layout')
@section('content')

<section id="cart_items">
    <div class="container col-sm-12">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="#">Home</a></li>
              <li class="active">Shopping Cart</li>
            </ol>
        </div>
        <div class="table-responsive cart_info">
            <?php
                $content=Cart::getContent();

             
                    
                // echo "<pre>";
                //     print_r($content) ;
                //     echo "</pre>";
                
            ?>
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image" >Image</td>
                        <td class="description">Name</td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                        <td class="a">Action</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($content as $view_content){ 
                       
                        ?>
                        
                    
                    <tr >
                        <td class="cart_product">
                            <a href=""><img src="{{ $view_content->attributes->image }}" height="50px" width="50px" alt=""></a>
                        </td>
                        <td class="cart_description">
                            <h4><a href="">{{ $view_content->name }}</a></h4>
                            
                        </td>
                        <td class="cart_price">
                            <p>{{ $view_content->price }} tk</p>
                        </td>
                        
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                 {{-- <form action="{{ url('/update-cart') }}" method="post">  --}}
                                    {{-- @csrf                        --}}
                                <a class="cart_quantity_down" href="{{ url('update-cart-m/'.$view_content->id.'/'.$view_content->quantity) }}"> - </a> 
                                <input class="cart_quantity_input" type="text" name="quantity" value="{{ $view_content->quantity }}" autocomplete="off" size="2">
                                <input type="hidden" name="id" value="{{ $view_content->id  }}" > 
                                              
                                <a class="cart_quantity_up" href="{{ url('update-cart-p/'.$view_content->id.'/'.$view_content->quantity) }}"> + </a>                             
                                 {{-- <input type="submit" name="submit" value="update" class="btn btn-sm btn-default">  --}}

                          {{-- </form>  --}}
                            </div>
                        </td>
                       
                        <td class="cart_total">
                            <p class="cart_total_price">{{$view_content->getPriceSum()}}</p>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" href="{{ url('/delete-to-cart/' . $view_content->id) }}"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>

                <?php } ?>
                   
                </tbody>
            </table>
        </div>
    </div>
	</section> <!--/#cart_items-->
<section id="do_action">

	<div class="container col-sm-12">
        <div class="row">
            <div class="paymentCont">
                            <div class="headingWrap">
                                    <h3 class="headingTop text-center">Select Your Payment Method</h3>	
                                    
                            </div>
                            <form action="{{ url('order-place') }}" method="POST">
                                @csrf
                            <div class="paymentWrap">
                                <div class="btn-group paymentBtnGroup btn-group-justified" data-toggle="buttons">
                                    <label class="btn paymentMethod active">
                                        <div class="method visa"></div>
                                        <input type="radio" name="payment_method" value="vis" checked> 
                                    </label>
                                    <label class="btn paymentMethod">
                                        <div class="method master-card"></div>
                                        <input type="radio" name="payment_method" value="vis1" > 
                                    </label>
                                    <label class="btn paymentMethod">
                                        <div class="method amex"></div>
                                        <input type="radio" name="payment_method" value="vis2" >
                                    </label>

                                 
                                </div>        
                            </div>
                            <button type="submit" class="btn btn-success pull-right btn-fyi"> CHECKOUT<span class="glyphicon glyphicon-chevron-right"></span></button>
                        </form>
                        <a href="{{ url('/') }}"><button type="submit" class="btn btn-success pull-left btn-fyi"><span class="glyphicon glyphicon-chevron-left"></span>Continue Shopping</button></a>
                            {{-- <div class="footerNavWrap clearfix">
                                <div  class="btn btn-success pull-left btn-fyi"><span class="glyphicon glyphicon-chevron-left"></span> CONTINUE SHOPPING</div>
                                <div class="btn btn-success pull-right btn-fyi">CHECKOUT<span class="glyphicon glyphicon-chevron-right"></span></div>
                            </div> --}}
                        
                        </div>
            
        </div>
    </div>
</section><!--/#do_action-->

@endsection
@extends('layout')
@section('content')

<div class="col-sm-9 padding-right">
    <div class="product-details"><!--product-details-->
        <div class="col-sm-5">
            <div class="view-product">
                <img src="{{url($show_product_by_id->product_image)}}" alt="" />
                
            </div>
           

        </div>
        <div class="col-sm-7">
            <div class="product-information"><!--/product-information-->
                <img src="" class="newarrival" alt="" />
                <h2>{{$show_product_by_id->product_name}}</h2>
                <p>Product id : {{$show_product_by_id->product_id}}</p>
                <p>{{$show_product_by_id->product_color}}</p>
                <img src="{{ url('frontend/images/product-details/rating.png') }}" alt="" />
                <span>
                    <span>{{$show_product_by_id->product_price}} Tk</span>                    
                   
                <form action="{{ url('/add-to-cart') }}" method="POST">
                @csrf
                    <label>Quantity:</label>
                    <input type="text" name="qty" value="1" />
                    <input type="hidden" name="product_id" value="{{$show_product_by_id->product_id}}">

                    <button type="submit" class="btn btn-fefault cart">
                        <i class="fa fa-shopping-cart"></i>
                        Add to cart
                    </button>

                </form>
                </span>
                <p><b>Availability:</b> In Stock</p>
                <p><b>Condition:</b> New</p>
                <p><b>Brand:</b> {{$show_product_by_id->manufacture_name}}</p>
                <p><b>Catagory:</b> {{$show_product_by_id->catagory_name}}</p>
                <p><b>Color:</b>{{$show_product_by_id->product_color}}</p>
                <a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
            </div><!--/product-information-->
        </div>
    </div><!--/product-details-->
    
    <div class="category-tab shop-details-tab"><!--category-tab-->
        <div class="col-sm-12">
            <ul class="nav nav-tabs">
                <li><a href="#details" data-toggle="tab">Details</a></li>                
                <li class="active"><a href="#reviews" data-toggle="tab">Reviews (5)</a></li>
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane fade" id="details" >
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{url($show_product_by_id->product_image)}}" alt="" />
                                <h2>{{$show_product_by_id->product_price}} Tk</h2>
                                <p>{{$show_product_by_id->product_name}}</p>
                                
                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                            </div>
                        </div>
                    </div>
                </div>     
            </div>                        
        </div>
            
               
                
            
            <div class="tab-pane fade active in" id="reviews" >
                <div class="col-sm-12">
                    <ul>
                        <li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
                        <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                        <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
                    </ul>
                    <p> modo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                    <p><b>Write Your Review</b></p>
                    
                    <form action="#">
                        <span>
                            <input type="text" placeholder="Your Name"/>
                            <input type="email" placeholder="Email Address"/>
                        </span>
                        <textarea name="" ></textarea>
                        <b>Rating: </b> <img src="{{ url('forntend/images/product-details/rating.png') }}" alt="" />
                        <button type="button" class="btn btn-default pull-right">
                            Submit
                        </button>
                    </form>
                </div>
            </div>
            
        </div>
    </div><!--/category-tab-->

@endsection
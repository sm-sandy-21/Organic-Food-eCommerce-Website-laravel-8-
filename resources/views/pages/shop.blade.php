@extends('layout')
@include('catagory_left_slider')
@section('content')


     <h2 class="title text-center">Features Items</h2>
            @foreach( $all_publish_product as $view_product)
            <div class="col-sm-4">
                
                <div class="product-image-wrapper">
                    <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{$view_product->product_image}}" style="height: 300px;" alt="" />

                                <h2>{{$view_product->product_price}}Tk</h2>

                                <p>{{$view_product->product_name}}</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                            <div class="product-overlay">
                                <div class="overlay-content">
                                    <a href="{{ url('/view-product/' .$view_product->product_id) }}">
                                        <h2>{{$view_product->product_price}}Tk</h2>
                                    </a>
                                    <a href="{{ url('/view-product/' .$view_product->product_id) }}">
                                        <p>{{$view_product->product_name}}</p>
                                    </a>
                                    <a href="{{ url('/view-product/' .$view_product->product_id) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                </div>
                            </div>
                    </div>
                    <div class="choose">
                        <ul class="nav nav-pills nav-justified">
                            <li><a href="{{ url('/view-product/' .$view_product->product_id) }}"><i class="fa fa-plus-square"></i>View Product</a></li>
                            <li><a href="#"><i class="fa fa-plus-square"></i>{{$view_product->manufacture_name}}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
          @endforeach
         </div>
            
        </div><!--features_items-->
       
        
        
</div>


@endsection
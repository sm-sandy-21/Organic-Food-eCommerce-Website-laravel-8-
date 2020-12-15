@extends('layout')
@section('catagory_left_slider')

<div class="left-sidebar">
    <h2>Category</h2>
    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
        <?php 
        $all_publish_catagory=DB::table('tbl_catagory')
                              ->where('publication_status',1)
                              ->get();
        
        
        foreach($all_publish_catagory as $view_catagory) { ?>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title"><a href="{{ url('/catagory_by_product/' .$view_catagory->catagory_id) }}">{{$view_catagory->catagory_name}}</a></h4>
            </div>
        </div>

        <?php } ?> 
    </div><!--/category-products-->

    <div class="brands_products"><!--brands_products-->
        <h2>Brands</h2>
        <div class="brands-name">
        <?php 
        $all_publish_manufacture=DB::table('tbl_manufacture')
                              ->where('publication_status',1)
                              ->get();

            foreach($all_publish_manufacture as $view_manufacture) { ?>	

            <ul class="nav nav-pills nav-stacked">
                <li><a href="{{ url('/manufacture_by_product/' .$view_manufacture->manufacture_id) }}"> <span class="pull-right"></span>{{$view_manufacture->manufacture_name}}</a></li>
                
            </ul>
            <?php } ?> 
        </div>
    </div><!--/brands_products-->
    
    <div class="price-range"><!--price-range-->
        <h2>Price Range</h2>
        <div class="well text-center">
             <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
             <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
        </div>
    </div><!--/price-range-->
    
    <div class="shipping text-center"><!--shipping-->
        <img src="{{ asset('frontend/images/home/shipping.jpg')}}" alt="" />
    </div><!--/shipping-->

</div>

@endsection
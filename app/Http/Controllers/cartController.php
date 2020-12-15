<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Cart;

use DB;

class cartController extends Controller
{
    public function add_to_cart(Request $request)
    {
        $qty=$request->qty;
        $product_id=$request->product_id;
        $product_info=DB::table('tbl_products') 
                    ->where('product_id',$product_id)
                    ->first();

               
                $data['quantity']=$qty;
                $data['id']=$product_info->product_id;
                $data['name']=$product_info->product_name;
                $data['price']=$product_info->product_price;
                $data['attributes']['image']=$product_info->product_image;

                Cart::add($data);
                return Redirect::to('/show-cart');
                   

    }

    public function show_cart()
    {
        $all_publish_catagory=DB::table('tbl_catagory')
                              ->where('publication_status',1)
                              ->get();
        $manageCatagory=view('pages.add_to_cart')
                        ->with('all_publish_catagory',$all_publish_catagory);  //all_catagory_info ayta use hobe foreach loop ar modha
         return view('layout')
                 ->with('pages.add_to_cart',$manageCatagory);
    }
    public function delete_to_cart($id)
    { 
        \Cart::remove($id);
         return Redirect::to('/show-cart');
                   

    }
    public function update_cart_p(Request $request)
    { 
       // $quantity=$request->quantity;
        $id=$request->id;
        \Cart::update($id, array('quantity' => +1) );
       
        return Redirect::to('/show-cart');
                    

    }
    public function update_cart_m(Request $request)
    { 
       // $quantity=$request->quantity;
        $id=$request->id;
        \Cart::update($id, array('quantity' => -1) );
       
        return Redirect::to('/show-cart');
                    

    }

}

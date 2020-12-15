<?php

namespace App\Http\Controllers;
use DB;

use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index()
    {
        $all_publish_product=DB::table('tbl_products')

                    ->join('tbl_catagory','tbl_products.catagory_id','=','tbl_catagory.catagory_id')
                    ->join('tbl_subcatagory','tbl_products.subcatagory_id','=','tbl_subcatagory.subcatagory_id')
                    ->join('tbl_manufacture','tbl_products.manufacture_id','=','tbl_manufacture.manufacture_id') //join('kon table ar shata join korbo','kar shata','=','kar')
                    ->select('tbl_products.*','tbl_catagory.catagory_name','tbl_subcatagory.subcatagory_name','tbl_manufacture.manufacture_name')
                    ->where('tbl_products.publication_status',1)               //multiple table mulltiple status,thats why select the table
                    ->limit(6)                    
                    ->get();

                

       $manageproduct=view('pages.home_content')
                       ->with('all_publish_product',$all_publish_product);  //all_publish_product ayta use hobe foreach loop ar modha
        return view('layout')
                ->with('pages.home_content',$manageproduct);

        //return view('pages.home_content');
    }
  
    public function show_product_by_catagory($catagory_id)
    {
        $product_by_catagory=DB::table('tbl_products')
                                ->join('tbl_catagory','tbl_products.catagory_id','=','tbl_catagory.catagory_id')
                                ->join('tbl_manufacture','tbl_products.manufacture_id','=','tbl_manufacture.manufacture_id')                                                                                                         //join('kon table ar shata join korbo','kar shata','=','kar')
                                ->select('tbl_products.*','tbl_manufacture.manufacture_name')
                                ->select('tbl_products.*','tbl_catagory.catagory_name')
                                ->where('tbl_catagory.catagory_id',$catagory_id) 
                                ->where('tbl_products.publication_status',1)               //multiple table mulltiple status,thats why select the table
                                ->limit(6)                    
                                ->get();

    

            $manage_by_product=view('pages.product_by_catagory')
                    ->with('product_by_catagory',$product_by_catagory);  //product_by_catagory ayta use hobe foreach loop ar modha
            return view('layout')
                ->with('pages.product_by_catagory',$manage_by_product);
    }

    public function show_product_by_manufacture($manufacture_id)
    {
        $product_by_manufacture=DB::table('tbl_products')
                                ->join('tbl_manufacture','tbl_products.manufacture_id','=','tbl_manufacture.manufacture_id') 
                                ->join('tbl_catagory','tbl_products.catagory_id','=','tbl_catagory.catagory_id')                                                                                                        //join('kon table ar shata join korbo','kar shata','=','kar')
                                ->select('tbl_products.*','tbl_manufacture.manufacture_name')
                                ->where('tbl_manufacture.manufacture_id',$manufacture_id) 
                                ->where('tbl_products.publication_status',1)               //multiple table mulltiple status,thats why select the table
                                ->limit(6)                    
                                ->get();

    

            $manage_by_product=view('pages.product_by_manufacture')
                    ->with('product_by_manufacture',$product_by_manufacture);  //product_by_manufacture ayta use hobe foreach loop ar modha
            return view('layout')
                ->with('pages.product_by_manufacture',$manage_by_product);
    }
    public function view_product_details($product_id)
    {
           
        $show_product_by_id=DB::table('tbl_products')

                    ->join('tbl_catagory','tbl_products.catagory_id','=','tbl_catagory.catagory_id')
                    ->join('tbl_subcatagory','tbl_products.subcatagory_id','=','tbl_subcatagory.subcatagory_id')
                    ->join('tbl_manufacture','tbl_products.manufacture_id','=','tbl_manufacture.manufacture_id') //join('kon table ar shata join korbo','kar shata','=','kar')
                    ->select('tbl_products.*','tbl_catagory.catagory_name','tbl_subcatagory.subcatagory_name','tbl_manufacture.manufacture_name')
                    ->where('tbl_products.publication_status',1)               //multiple table mulltiple status,thats why select the table
                    ->where('tbl_products.product_id',$product_id)               
                    ->first();

                

       $manageproduct=view('pages.product_details')
                       ->with('show_product_by_id',$show_product_by_id);  //all_publish_product ayta use hobe foreach loop ar modha
        return view('layout')
                ->with('pages.product_details',$manageproduct);

    }


    public function shop()
    {
        $all_publish_product=DB::table('tbl_products')

                            ->join('tbl_catagory','tbl_products.catagory_id','=','tbl_catagory.catagory_id')
                            ->join('tbl_subcatagory','tbl_products.subcatagory_id','=','tbl_subcatagory.subcatagory_id')
                            ->join('tbl_manufacture','tbl_products.manufacture_id','=','tbl_manufacture.manufacture_id') //join('kon table ar shata join korbo','kar shata','=','kar')
                            ->select('tbl_products.*','tbl_catagory.catagory_name','tbl_subcatagory.subcatagory_name','tbl_manufacture.manufacture_name')
                            ->where('tbl_products.publication_status',1)               //multiple table mulltiple status,thats why select the table
                            ->limit(6)                    
                            ->get();

    

$manageproduct=view('pages.shop')
           ->with('all_publish_product',$all_publish_product);  //all_publish_product ayta use hobe foreach loop ar modha
return view('layout')
    ->with('pages.shop',$manageproduct);
       // return view('pages.shop');
    }
    public function contact_us()
    {
//         $all_publish_product=DB::table('tbl_products')

//                             ->join('tbl_catagory','tbl_products.catagory_id','=','tbl_catagory.catagory_id')
//                             ->join('tbl_subcatagory','tbl_products.subcatagory_id','=','tbl_subcatagory.subcatagory_id')
//                             ->join('tbl_manufacture','tbl_products.manufacture_id','=','tbl_manufacture.manufacture_id') //join('kon table ar shata join korbo','kar shata','=','kar')
//                             ->select('tbl_products.*','tbl_catagory.catagory_name','tbl_subcatagory.subcatagory_name','tbl_manufacture.manufacture_name')
//                             ->where('tbl_products.publication_status',1)               //multiple table mulltiple status,thats why select the table
//                             ->limit(6)                    
//                             ->get();

    

// $manageproduct=view('pages.shop')
//            ->with('all_publish_product',$all_publish_product);  //all_publish_product ayta use hobe foreach loop ar modha
// return view('layout')
//     ->with('pages.shop',$manageproduct);
        return view('pages.contact_us');
    }


}

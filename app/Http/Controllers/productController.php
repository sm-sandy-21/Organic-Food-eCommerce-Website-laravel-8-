<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//use DB;                               
use Session;  
use Illuminate\Support\Str;
use Image;                    

session_start();

class productController extends Controller
{
    public function index()
    {
        return view ('admin.add_product');

    }
    public function save_product(Request $request)
    {
       $data=array();
       
       $data['product_name']=$request->product_name; 
       $data['catagory_id']=$request->catagory_id; 
       $data['subcatagory_id']=$request->subcatagory_id; 
       $data['manufacture_id']=$request->manufacture_id; 
       $data['product_short_description']=$request->product_short_description; 
       $data['product_long_description']=$request->product_long_description; 
       $data['product_price']=$request->product_price;  
       //$data['product_image']=$request->product_image;    
       $data['product_size']=$request->product_size;  
       $data['product_color']=$request->product_color;  
       $data['publication_status']=$request->publication_status; 
       
       $image=$request->file('product_image');
       if($image)
          {
            $image_name      = str::random(20);
            $ext             = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path     = 'image/';
            $image_url       = $upload_path . $image_full_name;
            $success         = $image->move($upload_path, $image_full_name);
    
            if($success)
            {
              $data['product_image'] = $image_url;

              //print_r($data);
                  
                   DB::table('tbl_products')->insert($data);
                   Session::put('message','Add Product Successfully !! ');
                   return Redirect::to('/add-product');
               }
           }
           //print_r($data);
       
       //$data['product_image']='';
        DB::table('tbl_products')->insert($data);
        Session::put('message','Add product Successfully without Image!! ');
       return Redirect::to('/add-product');
    }

    public function all_product()
    {
       $all_product_info=DB::table('tbl_products')
                    ->join('tbl_catagory','tbl_products.catagory_id','=','tbl_catagory.catagory_id')
                    ->join('tbl_subcatagory','tbl_products.subcatagory_id','=','tbl_subcatagory.subcatagory_id')
                    ->join('tbl_manufacture','tbl_products.manufacture_id','=','tbl_manufacture.manufacture_id') //join('kon table ar shata join korbo','kar shata','=','kar')
                     ->select('tbl_products.*','tbl_catagory.catagory_name','tbl_subcatagory.subcatagory_name','tbl_manufacture.manufacture_name')
                   ->get();

                //    echo "<pre>";
                //    print_r($all_product_info);
                //    echo "<pre>";
                //    exit();

       $manageproduct=view('admin.all_product')
                       ->with('all_product_info',$all_product_info);  //all_product_info ayta use hobe foreach loop ar modha
        return view('admin_layout')
                ->with('admin.all_product',$manageproduct);
              
    }

    public function unactive_product($product_id)
    {
        
        DB::table('tbl_products')
            ->where('product_id',$product_id)
            ->update(['publication_status'=>0]);

            Session::put('message','product Unactive Successfully !! ');

            return Redirect::to('/all-product');

        
      
       
    }
    public function active_product($product_id)
    {
       
        DB::table('tbl_products')
            ->where('product_id',$product_id)
            ->update(['publication_status'=>1]);
            
            Session::put('message','product Active Successfully !! ');
      

            return Redirect::to('/all-product');
      
       
    }
    public function delete_product($product_id)
    {
                    DB::table('tbl_products')
                    ->where('product_id',$product_id)
                    ->delete();

                    

                    return Redirect::to('/all-product');

       
    }
    public function edit_product($product_id)
    {
       
        $product_info=DB::table('tbl_products')
                    ->where('product_id',$product_id)
                    ->first();

        $manageproduct=view('admin.edit_product')
                        ->with('product_info',$product_info);  

        return view('admin_layout')
                    ->with('admin.edit_product',$manageproduct);
       
    }
    public function update_product(Request $request,$product_id)
    {
                  
                  

        $data=array();
        $data['product_name']=$request->product_name;       
    //    $data['catagory_id']=$request->catagory_id; 
    //    $data['subcatagory_id']=$request->subcatagory_id; 
    //    $data['manufacture_id']=$request->manufacture_id; 
    //    $data['product_short_description']=$request->product_short_description; 
    //    $data['product_long_description']=$request->product_long_description; 
    //    $data['product_price']=$request->product_price;  
    //    //$data['product_image']=$request->product_image;    
    //    $data['product_size']=$request->product_size;  
    //    $data['product_color']=$request->product_color;  
    //    $data['publication_status']=$request->publication_status; 

    //    $image=$request->file('product_image');
    //    if($image)
    //       {
    //         $image_name      = str::random(20);
    //         $ext             = strtolower($image->getClientOriginalExtension());
    //         $image_full_name = $image_name . '.' . $ext;
    //         $upload_path     = 'image/';
    //         $image_url       = $upload_path . $image_full_name;
    //         $success         = $image->move($upload_path, $image_full_name);
    
    //         if($success)
    //         {
    //           $data['product_image'] = $image_url;

    //              echo "<pre>";
    //                print_r($data);
    //                echo "<pre>";
    //                exit();
                            
    //                     // DB::table('tbl_products')
    //                     // ->where('product_id',$product_id)
    //                     // ->update($data);
    //                     // Session::put('message','product Update Successfully !! ');
            
    //                     // return Redirect::to('/all-product');
    //            }
    //        }
      
                   echo "<pre>";
                   print_r($data);
                   echo "<pre>";
                   exit();

    //    DB::table('tbl_products')
    //         ->where('product_id',$product_id)
    //         ->update($data);
    //     Session::put('message','product Update Successfully !! ');

    //     return Redirect::to('/all-product');

     }
}

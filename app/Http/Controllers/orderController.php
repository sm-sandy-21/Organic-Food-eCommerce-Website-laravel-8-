<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect; 
use Illuminate\Http\Request;
use DB;
//use DB;                               
use Session; 


class orderController extends Controller
{
    public function index()
    {
        $all_order_info=DB::table('tbl_order')
        ->join('tbl_customer','tbl_order.customer_id','=','tbl_customer.customer_id')                    
        ->select('tbl_order.*','tbl_customer.customer_name')
        ->get();

       $manageorder=view('admin.manage_order')
                       ->with('all_order_info',$all_order_info);  //all_order_info ayta use hobe foreach loop ar modha
        return view('admin_layout')
                ->with('admin.manage_order',$manageorder);
              
    }
    public function view_order($order_id)
    {
        $view_order_info=DB::table('tbl_order')
                            ->join('tbl_customer','tbl_order.customer_id','=','tbl_customer.customer_id' )
                            ->join('tbl_order_details','tbl_order.order_id','=','tbl_order_details.order_id')
                            ->join('tbl_payment','tbl_order.payment_id','=','tbl_payment.payment_id')
                            ->join('tbl_shipping','tbl_order.shipping_id','=','tbl_shipping.shipping_id') 
                            ->where('tbl_customer.order_id',$order_id)
                            ->where('tbl_order_details.order_id',$order_id)
                            ->where('tbl_payment.order_id',$order_id)
                            ->where('tbl_shipping.order_id',$order_id)
                            ->get();
                    // echo "<pre>";
                    // print_r($view_order_info);
                  
                    // echo "<pre>";
                    // exit();
                 
    
        $manageorder=view('admin.view_order')
                       ->with('view_order_info',$view_order_info); 
        return view('admin_layout')
                ->with('admin.view_order',$manageorder);

    //return view('admin.view_order');
              
    }
    public function unactive_order($order_id)
    {
        DB::table('tbl_order')
            ->where('order_id',$order_id)
            ->update(['order_status'=>0]);

            return Redirect::to('/manage-order');
            Session::put('message','order Unactive Successfully !! ');
      
       
    }
    public function active_order($order_id)
    {
        DB::table('tbl_order')
            ->where('order_id',$order_id)
            ->update(['order_status'=>1]);

            return Redirect::to('/manage-order');
            Session::put('message','order active Successfully !! ');
      
       
    }
    public function delete_order($order_id)
    {
            DB::table('tbl_order')
                ->where('order_id',$order_id)
                ->delete();

                DB::table('tbl_payment')
                ->where('order_id',$order_id)
                ->delete();

                DB::table('tbl_order_details')
                ->where('order_id',$order_id)
                ->delete();

                DB::table('tbl_shipping')
                ->where('order_id',$order_id)
                ->delete();    

                    

                    return Redirect::to('/manage-order');

    
    }
}

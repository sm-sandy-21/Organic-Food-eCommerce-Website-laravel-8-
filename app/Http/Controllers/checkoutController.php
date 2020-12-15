<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect; 
use Illuminate\Http\Request;
use DB;  
use Cart;                             
use Session; 

class checkoutController extends Controller
{
    public function login_checkout()
    {
        return view('pages.login');
    }
    public function customer_registration(Request $request)
    {
        $data=array();
        $data['order_id']=null;
        $data['customer_name']=$request->customer_name;
        $data['customer_email']=$request->customer_email;
        $data['phone_number']=$request->phone_number;
        $data['password']=md5($request->password);

        $customer_id=DB::table('tbl_customer')
                   ->insertGetid($data);

                   Session::put('customer_id',$customer_id);
                   Session::put('customer_name',$request->customer_name);


        return Redirect::to('/checkout');
    }

    public function checkout()
    {
        return view('pages.checkout');
    }
    public function save_shipping_details(Request $request)
    {
        $data=array();
        $data['order_id']=null;
        $data['shipping_email']=$request->shipping_email;
        $data['shipping_first_name']=$request->shipping_first_name;
        $data['shipping_last_name']=$request->shipping_last_name;
        $data['shipping_phone']=$request->shipping_phone;
        $data['shipping_address']=$request->shipping_address;
        $data['shipping_city']=$request->shipping_city;

        $shipping_id=DB::table('tbl_shipping')
                   ->insertGetid($data);

                   Session::put('shipping_id',$shipping_id);
                  
        return Redirect::to('/payment');

    }
    public function customer_login(Request $request)
    {       
        $customer_email=$request->customer_email;
        $password=md5($request->password);

        $result=DB::table('tbl_customer')
                   ->where('customer_email',$customer_email)
                   ->where('password',$password)
                   ->first();

        if ($result) {

            Session::put('customer_id',$result->customer_id);
            return Redirect::to('/checkout');
        } else {
            return Redirect::to('/login-check');
        }
    }
    public function payment()
    {
           
           return view('pages.payment');
    }
    public function customer_logout()
    {
        Session::flush();
        return Redirect::to('/');
    }

    public function order_place(Request $request)
    {
        $payment_method=$request->payment_method;
        
        $pdata=array();
        $pdata['order_id']=null;
        $pdata['payment_method']=$payment_method;
        $pdata['payment_status']=0;

        $payment_id=DB::table('tbl_payment')
                   ->insertGetid($pdata);

        $odata=array();
        $odata['customer_id']=Session::get('customer_id');
        $odata['shipping_id']=Session::get('shipping_id');
        $odata['payment_id']=$payment_id;
        $odata['order_total']=Cart::getTotal();
        $odata['order_status']=0;

        $order_id=DB::table('tbl_order')
        ->insertGetid($odata);

        
        $cus=array();
        $cus['customer_id']=Session::get('customer_id');

        DB::table('tbl_customer')
              ->where('customer_id',$cus)
              ->update(['order_id'=>$order_id]);

        DB::table('tbl_payment')
              ->where('payment_id',$payment_id)
              ->update(['order_id'=>$order_id]); 

        $ship=array();
        $ship['shipping_id']=Session::get('shipping_id');

        DB::table('tbl_shipping')
              ->where('shipping_id',$ship)
              ->update(['order_id'=>$order_id]);


        $content=Cart::getContent();
        $od_data=array();

        foreach($content as $view_content)
        {
            $od_data['order_id']=$order_id;
            $od_data['product_id']=$view_content->id;
            $od_data['product_name']=$view_content->name;
            $od_data['product_price']=$view_content->price;
            $od_data['product_sales_quantity']=$view_content->quantity;

            DB::table('tbl_order_details')
               ->insertGetid($od_data);
        }
        if ($payment_method == 'vis') {
            Cart::clear();
            return view('pages.cash_on_delevery');
        }elseif($payment_method == 'vis1'){
            echo "vis1";
        }elseif($payment_method == 'vis2'){
            echo "vis2";
        }
        else {
           echo"none";
        }
        

        
    }


}

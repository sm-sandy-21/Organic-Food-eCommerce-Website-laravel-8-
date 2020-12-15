<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;     //use Redirect
use DB;                                //use DB
use Session;                      //use Session 

session_start();

class adminController extends Controller
{
    public function index()
    {
        return view('admin.admin_login');
    }
   

    public function admindashboard(Request $request)
    {
        $admin_email=$request->admin_email;
        $admin_password=md5($request->admin_password);
        $result=DB::table('tbl_admin')
                ->where('admin_email',$admin_email)                      //kolapata colloer hocha DB ar table ar row                                                                                        
                ->where('admin_password',$admin_password)                 // R green collar hocha given value from user
                ->first();                    // use first only check one valu
               if($result)
               {
                    //Session::put('admin_password',$result->admin_password);
                   //Session::put('admin_name',$result->admin_name);

                   Session::put('admin_id',$result->admin_id);
                   return Redirect::to('/dashboard');

               }
               else
               {
                   Session::put('message','Email or Password is not correct');
                   return Redirect::to('/admin');

               }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;     //use Redirect
use DB;                                //use DB
use Session;                      //use Session 

session_start();


class SuperAdminController extends Controller
{
    public function index()
    {
        $this -> adminAuthCheck();
        return view('admin.dashboard');
        
    }
    public function logout(Request $request)
    {
        // Session::put('admin_name',null);
        // Session::put('admin_id',null);
        $request->session()->flush();

        return Redirect::to('/admin');
    }

    public function adminAuthCheck()
    {
        $admin_id= Session::get('admin_id');


        if($admin_id)
        {
            return;
        }
        else
        {
            return Redirect::to('/admin')->send();
        }
    }
}

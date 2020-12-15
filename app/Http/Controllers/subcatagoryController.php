<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect; 
use Illuminate\Http\Request;
use DB;                               
use Session;                      

session_start();

class subcatagoryController extends Controller
{
    public function index()
    {
       return view('admin.add_subcatagory');
    }
    public function save_subcatagory(Request $request)
    {
       $data=array();
       $data['catagory_id']=$request->catagory_id;
       $data['subcatagory_name']=$request->subcatagory_name;


        DB::table('tbl_subcatagory')->insert($data);
        Session::put('message','Add SubCatagory Successfully !! ');
        return Redirect::to('/add-subcatagory');
    }
}

<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect; 
use Illuminate\Http\Request;
use DB;                               
use Session;

class contactController extends Controller
{
    public function contact_us()
    {
        return view('pages.contact_us');
    }

    
    public function save_contact(Request $request)
    {
       $data=array();
       $data['contact_name']=$request->contact_name;       // Get the data from add_catagotory table
       $data['contact_email']=$request->contact_email;
       $data['contact_subject']=$request->contact_subject;
       $data['contact_message']=$request->contact_message;
       

       DB::table('tbl_contact')->insert($data);
       Session::put('message','Send Contact Inforfation Successfully,we will contact as soon as possible !! ');
       return Redirect::to('/');
    }
}

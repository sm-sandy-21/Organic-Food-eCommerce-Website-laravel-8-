<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect; 
use Illuminate\Http\Request;
use DB;                               
use Session;                      

session_start();


class catagoryController extends Controller
{
    public function index()
    {
        $this -> adminAuthCheck();
       return view('admin.add_catagory');
    } 
    public function all_catagory()
    {
        $this -> adminAuthCheck();
        
       $allCatagory=DB::table('tbl_catagory')->get();
       $manageCatagory=view('admin.all_catagory')
                       ->with('all_catagory_info',$allCatagory);  //all_catagory_info ayta use hobe foreach loop ar modha
        return view('admin_layout')
                ->with('admin.all_catagory',$manageCatagory);

       
       
        //return view('admin.all_catagory');
    }
    public function save_catagory(Request $request)
    {
       $data=array();
       $data['catagory_id']=$request->catagory_id;
       $data['catagory_name']=$request->catagory_name;       // Get the data from add_catagotory table
       $data['catagory_description']=$request->catagory_description;
       $data['publication_status']=$request->publication_status;

       DB::table('tbl_catagory')->insert($data);
       Session::put('message','Add Catagory Successfully !! ');
       return Redirect::to('/add-catagory');
    }
    public function unactive_catagory($catagory_id)
    {
        DB::table('tbl_catagory')
            ->where('catagory_id',$catagory_id)
            ->update(['publication_status'=>0]);

            return Redirect::to('/all-catagory');

            Session::put('sms','Catagory Unactive Successfully !! ');
      
       
    }
    public function active_catagory($catagory_id)
    {
        DB::table('tbl_catagory')
            ->where('catagory_id',$catagory_id)
            ->update(['publication_status'=>1]);

            return Redirect::to('/all-catagory');
      
       
    }

    public function edit_catagory($catagory_id)
    {
        $this -> adminAuthCheck();
        $Catagory_info=DB::table('tbl_catagory')
                    ->where('catagory_id',$catagory_id)
                    ->first();

        $manageCatagory=view('admin.edit_catagory')
                        ->with('catagory_info',$Catagory_info);  

        return view('admin_layout')
                    ->with('admin.edit_catagory',$manageCatagory);
       
    }

    public function update_catagory(Request $request,$catagory_id)
    {
        $this -> adminAuthCheck();
       $data=array();
       $data['catagory_name']=$request->catagory_name;       
       $data['catagory_description']=$request->catagory_description;

       // print_r($data);

       DB::table('tbl_catagory')
            ->where('catagory_id',$catagory_id)
            ->update($data);
        Session::put('message','Catagory Update Successfully !! ');

        return Redirect::to('/all-catagory');

    }

    public function delete_catagory($catagory_id)
    {
                    DB::table('tbl_catagory')
                    ->where('catagory_id',$catagory_id)
                    ->delete();

                    

                    return Redirect::to('/all-catagory');

       
    }

    //admin login check funtion
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

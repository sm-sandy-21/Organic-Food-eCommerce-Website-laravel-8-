<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect; 
use Illuminate\Http\Request;
use DB;                               
use Session;                      

session_start();

class manufactureController extends Controller
{
    public function index()
    {
      return view('admin.add_manufacture');
    }
    public function save_manufacture(Request $request)
    {
       $data=array();
       $data['manufacture_id']=$request->manufacture_id;
       $data['manufacture_name']=$request->manufacture_name;       // Get the data from add_catagotory table
       $data['manufacture_description']=$request->manufacture_description;
       $data['publication_status']=$request->publication_status;

       DB::table('tbl_manufacture')->insert($data);
       Session::put('message','Add manufacture Successfully !! ');
       return Redirect::to('/add-manufacture');
    }

    public function all_manufacture()
    {
       $allmanufacture=DB::table('tbl_manufacture')->get();
       $managemanufacture=view('admin.all_manufacture')
                       ->with('all_manufacture_info',$allmanufacture);  //all_manufacture_info ayta use hobe foreach loop ar modha
        return view('admin_layout')
                ->with('admin.all_manufacture',$managemanufacture);

       
       
        //return view('admin.all_manufacture');
    }
    public function unactive_manufacture($manufacture_id)
    {
        DB::table('tbl_manufacture')
            ->where('manufacture_id',$manufacture_id)
            ->update(['publication_status'=>0]);

            return Redirect::to('/all-manufacture');

            Session::put('message','manufacture Unactive Successfully !! ');
         
    }
    public function active_manufacture($manufacture_id)
    {
        DB::table('tbl_manufacture')
            ->where('manufacture_id',$manufacture_id)
            ->update(['publication_status'=>1]);

            return Redirect::to('/all-manufacture');
      
       
    }
    public function edit_manufacture($manufacture_id)
    {
       
        $manufacture_info=DB::table('tbl_manufacture')
                    ->where('manufacture_id',$manufacture_id)
                    ->first();

        $managemanufacture=view('admin.edit_manufacture')
                        ->with('manufacture_info',$manufacture_info);  

        return view('admin_layout')
                    ->with('admin.edit_manufacture',$managemanufacture);
       
    }
    public function update_manufacture(Request $request,$manufacture_id)
    {
       
       //echo $manufacture_id;
       $data=array();
       $data['manufacture_name']=$request->manufacture_name;       
       $data['manufacture_description']=$request->manufacture_description;

       //print_r($data);

       DB::table('tbl_manufacture')
            ->where('manufacture_id',$manufacture_id)
            ->update($data);
        Session::put('message','manufacture Update Successfully !! ');

        return Redirect::to('/all-manufacture');

    }
    public function delete_manufacture($manufacture_id)
    {
                    DB::table('tbl_manufacture')
                    ->where('manufacture_id',$manufacture_id)
                    ->delete();

                    

                    return Redirect::to('/all-manufacture');

       
    }




}

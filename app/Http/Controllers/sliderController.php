<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;                               
use Session;   
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;                   
session_start();


class sliderController extends Controller
{
    public function index()
    {    
        return view('admin.add_slider');
    }
    public function save_slider(Request $request)
    {
       $data=array(); 
       $data['publication_status']=$request->publication_status; 
       
       $image=$request->file('slider_image');
       if($image)
          {
            $image_name      = str::random(20);
            $ext             = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path     = 'slider_image/';
            $image_url       = $upload_path . $image_full_name;
            $success         = $image->move($upload_path, $image_full_name);
    
            if($success)
            {
              $data['slider_image'] = $image_url;

              //print_r($data);
                  
                   DB::table('tbl_slider')->insert($data);
                   Session::put('message','Add slider Successfully !! ');
                   return Redirect::to('/add-slider');
               }
           }
           //print_r($data);
       
       //$data['slider_image']='';
        DB::table('tbl_slider')->insert($data);
        Session::put('message','Add slider Successfully without Image!! ');
        return Redirect::to('/add-slider');
    }
    public function all_slider()
    {      
        
       $allslider=DB::table('tbl_slider')->get();
       $manageslider=view('admin.all_slider')
                       ->with('all_slider_info',$allslider);  //all_slider_info ayta use hobe foreach loop ar modha
        return view('admin_layout')
                ->with('admin.all_slider',$manageslider);

    }
    public function unactive_slider($slider_id)
    {
        DB::table('tbl_slider')
            ->where('slider_id',$slider_id)
            ->update(['publication_status'=>0]);

            return Redirect::to('/all-slider');

            Session::put('sms','slider Unactive Successfully !! ');
      
       
    }
    public function active_slider($slider_id)
    {
        DB::table('tbl_slider')
            ->where('slider_id',$slider_id)
            ->update(['publication_status'=>1]);

            return Redirect::to('/all-slider');
      
       
    }
    public function delete_slider($slider_id)
    {
                    DB::table('tbl_slider')
                    ->where('slider_id',$slider_id)
                    ->delete();

                    

                    return Redirect::to('/all-slider');

       
    }
}

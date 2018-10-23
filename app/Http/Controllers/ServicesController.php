<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\User;
use App\Services;
use App\Products;

class ServicesController extends Controller 
{
    public function serviceprofile($serviceid){

    	$user = Auth::user();
    	$services = Services::join('users', 'users.id', '=', 'services.user_id')
                               ->where('service_id', $serviceid)
                               ->select('*', 'users.id as uid', 'services.id as sid', 'services.image_path as imagepath')
                               ->first();
        if ($services){
            Services::where('service_id', $serviceid)->increment('clicks', 1);
        }
    	return view('services.service-profile', compact('services', 'user')); 

    }
    public function productdetails($productid){

    	$user = Auth::user();
        $allproducts = Products::all()->shuffle()->slice(0,8);
    	$products = Products::join('users', 'users.id', '=', 'products.user_id')
                               ->where('product_id', $productid)
                               ->select('*', 'users.id as uid', 'products.id as pid', 'products.image_path as imagepath')
                               ->first();

        if ($products){
            Products::where('product_id', $productid)->increment('clicks', 1);
        }
    	return view('products.product-details', compact('products', 'user', 'allproducts')); 

    }

    public function uploadVideo($id){

      $user = Auth::user();
      $service = Services::where('id', $id)->first();
      return view('upload-video', compact('user', 'id', 'service')); 

    }

    public function postVideo(Request $request){

      

        $user = Auth::user();
        $data = $request->all();

        $validator = Validator::make($data, Video::$rules);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }else{

            $pic = $request->file('jvideo');        
            $filename = $pic->getClientOriginalName(); 
            $serviceid = $request->Input('serviceid');  


            $job = new Job();       
            $job->user_id = $user->id;   
            $job->service_id = $request->Input('serviceid');                       
            $job->title = $request->Input('title');                    
            $job->video_path =  $pic->getClientOriginalName(); 
            $job->verification = '0';                                          

            
            if ($request->file('jjvideo')->move('public/img/videos/service-video-'.$serviceid.'/', $filename)){
                
                $job->save();
                $request->session()->flash('success_msg', 'Success.');          
                return redirect('upload-video');          
            }else{
                $request->session()->flash('error_msg', 'Error: Try Again');           
                return redirect('upload-video');   
            }

        }

    }
    
}

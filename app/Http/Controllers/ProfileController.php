<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Validator;
use DB;
use App\User;
use App\Services;
use App\Products;
use App\Cart;
use App\Feedback;
use App\Billing;
use App\Order;
use App\Messages;
use App\Thread;

class ProfileController extends Controller
{
    public function dashboard(){

        $user = Auth::user();
        $orders = DB::table('orders as o')
                    ->join('products as p', 'p.product_id', '=', 'o.ref_id')
                    ->join('users as u', 'p.user_id', '=', 'u.id')
                    ->select('*','o.id as oid', 'p.product_id as pid', 'u.id as uid', 'p.price as pprice', 'p.image_path as pimage')
                    ->where('o.user_id', $user->id)
                    ->get(5);
        //Messages control 
        $msgtos = DB::table('thread_table')                            
                            ->where('msg_to', $user->id)                                
                            ->join('users', 'users.id', '=', 'thread_table.msg_from')                             
                            ->get(); 
        $msgfroms = DB::table('thread_table')                            
                            ->where('msg_from', $user->id)                                
                            ->join('users', 'users.id', '=', 'thread_table.msg_to')                             
                            ->get(); 
    	return view('dashboard', compact('orders', 'msgtos', 'msgfroms'));

    }
    public function upgradeAccount(){
        
        $usercategorys = DB::table('client_category')->get();
        return view('upgrade-account', compact('usercategorys'));

    }
    public function editprofile(){

        $user = Auth::user();
       // $services = User::where('id', $user->id)->paginate(10);

        return view('profile', compact('user'));

    }
    public function profileedit(Request $request){        

        $user = Auth::user();
        $data = $request->all();

        $validator = Validator::make($data, User::$update_rules);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }else{


            $user = User::find($user->id);                           
            $user->telephone = $request->input('telephone');
            $user->full_name = $request->input('fullname');                       
            $user->country = $request->input('country');                          
            $user->state = $request->input('state'); 
            $user->city = $request->input('city');        
            //$user->resident_address = $request->input('address');                          

            
            if ($user->save()){                
                
                $request->session()->flash('success_msg', 'Success.');          
                return redirect('edit-profile');          
            }else{
                $request->session()->flash('error_msg', 'Error: Try Again');           
                return redirect('edit-profile');   
            }

        }

    } 
    public function profileimg(Request $request){

        $user = Auth::user();
        $data = $request->all();

        $validator = Validator::make($data, User::$profileimg_rules);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }else{

            $pic = $request->file('profileimg');        
            $filename = $pic->getClientOriginalName();   

            $profilepic = User::find($user->id);                   
            $profilepic->image_path =  $pic->getClientOriginalName();   

            if ($request->file('profileimg')->move('public/img/profile/profile-'.$user->id.'/profilepic/', $filename)){
                
                $profilepic->save();
                $request->session()->flash('success_msg', 'Upload successful.');          
                return redirect('edit-profile');          
            }else{
                $request->session()->flash('error_msg', 'Error: Try Again');           
                return redirect('edit-profile');   
            }

        }

    }
    public function changepassword(Request $request){        

        $user = Auth::user();
        $data = $request->all();

        $validator = Validator::make($data, User::$password_rules);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }else{


            $user = User::find($user->id);                           
            $user->password = bcrypt($request->input('newpassword'));
            
            if ($user->save()){                
                
                $request->session()->flash('success_msg', 'Password Changed Successfully.');          
                return redirect('edit-profile');          
            }else{
                $request->session()->flash('error_msg', 'Error: Try Again');           
                return redirect('edit-profile');   
            }

        }

    }
    public function verifyprofile(){

        $user = Auth::user();
       // $services = User::where('id', $user->id)->paginate(10);

        return view('verify-profile', compact('user'));

    }
    public function verifydoc(Request $request){

        $user = Auth::user();
        $data = $request->all();

        $validator = Validator::make($data, User::$verifydoc_rules);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }else{

            $pic = $request->file('docimg');        
            $filename = $pic->getClientOriginalName();   

            $verifydoc = User::find($user->id);                   
            $verifydoc->verify_doc =  $pic->getClientOriginalName();   

            if ($request->file('docimg')->move('public/img/profile/profile-'.$user->id.'/verifydoc/', $filename)){
                
                $verifydoc->save();
                $request->session()->flash('success_msg', 'Upload successful. Once verification is completed our team will activate your account.');          
                return redirect('verify-profile');          
            }else{
                $request->session()->flash('error_msg', 'Error: Try Again');           
                return redirect('verify-profile');   
            }

        }

    }
    public function updatesocial(Request $request){

        $user = Auth::user();
        $data = $request->all();

        $validator = Validator::make($data, User::$socialmedia);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }else{            

            $updatesocial = User::find($user->id);                   
            $updatesocial->facebook =  $request->Input('facebook');   
            $updatesocial->twitter =  $request->Input('twitter');   
            $updatesocial->instagram =  $request->Input('instagram');   
            $updatesocial->linkendin =  $request->Input('linkedin');   

            if ($updatesocial->save()){                
                
                $request->session()->flash('success_msg', 'Update Successful.');          
                return redirect('verify-profile');          
            }else{
                $request->session()->flash('error_msg', 'Error: Try Again');           
                return redirect('verify-profile');   
            }

        }

    }
    public function myservices(){

        $user = Auth::user();
        $services = Services::where('user_id', 'LIKE', $user->id)->paginate(10);

    	return view('services.myservices', compact('services', 'user'));

    }    
    public function postservice(){

        $categorys = DB::table('services_category')->get();
    	return view('services.post-service', compact('categorys'));

    } 
    public function servicepost(Request $request){        

        $user = Auth::user();
        $data = $request->all();

        $validator = Validator::make($data, Services::$rules);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }else{

            $pic = $request->file('serviceimg');        
            $filename = $pic->getClientOriginalName();   
            $serviceid = $request->Input('serviceid');


            $services = new Services();       
            $services->user_id = $user->id; 
            $services->service_id = $request->Input('serviceid');
            $services->title = $request->Input('title');             
            $services->description = $request->Input('description');        
            $services->category = $request->Input('category');        
            $services->duration = $request->Input('duration');   
            $services->price = $request->Input('price');   
            $services->requirement = $request->Input('requirement'); 
            $services->image_path =  $pic->getClientOriginalName();   
            $services->verification = '0';                                          

            
            if ($request->file('serviceimg')->move('public/img/services/service-'.$serviceid.'/', $filename)){
                
                $services->save();
                $request->session()->flash('success_msg', 'Success.');          
                return redirect('services/post-service');          
            }else{
                $request->session()->flash('error_msg', 'Error: Try Again');           
                return redirect('services/post-service');   
            }

        }

    } 
    public function postproduct(){

        $categorys = DB::table('product_category')->get();
        return view('products.post-product', compact('categorys'));

    }   
    public function productpost(Request $request){        

        $user = Auth::user();
        $data = $request->all();

        $validator = Validator::make($data, Products::$rules);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }else{

            $pic = $request->file('productimg');        
            $filename = $pic->getClientOriginalName(); 
            $productid = $request->Input('productid');


            $products = new Products();       
            $products->user_id = $user->id; 
            $products->product_id = $request->Input('productid');
            $products->title = $request->Input('title');             
            $products->description = $request->Input('description');        
            $products->category = $request->Input('category');        
            $products->duration = $request->Input('duration');   
            $products->price = $request->Input('price');   
            $products->quantity_available = $request->Input('available');  
            $products->image_path =  $pic->getClientOriginalName(); 
            $products->verification = '0';                                          
            $products->clicks = 0; 

            
            if ($request->file('productimg')->move('public/img/products/product-'.$productid.'/', $filename)){
                
                $products->save();
                $request->session()->flash('success_msg', 'You product has been successfully posted.');          
                return redirect('products/post-product');          
            }else{
                $request->session()->flash('error_msg', 'Error: Try Again');           
                return redirect('products/post-product');   
            }

        }

    } 
    public function myproducts(){

        $user = Auth::user();
        $products = Products::where('user_id', 'LIKE', $user->id)->paginate(10);
        return view('products.myproducts', compact('products', 'user'));

    } 

    public function editProducts($id){

        $user = Auth::user();
        $products = Products::where('user_id', 'LIKE', $user->id)->paginate(10);
        return view('products.myproducts', compact('products', 'user'));

    } 
}

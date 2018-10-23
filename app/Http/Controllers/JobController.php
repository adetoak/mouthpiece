<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Validator;
use App\Services;
use App\Products;
use DB;
use App\Job;

class JobController extends Controller
{
    public function joboffers(){

        $user = Auth::user();
    	$services = Services::where('user_id', $user->id)->get();
        //$servicess= DB::table('services')->join('products', 'products.user_id', '=', 'services.user_id');
        foreach ($services as $service) {
            $jobs = Job::where('category', $service->category)->paginate(10);
        }
        return view('job-offers', compact('jobs'));

    }
    public function postjob(){

    	return view('post-job');

    }
    public function jobpost(Request $request){

    	

        $user = Auth::user();
        $data = $request->all();

        $validator = Validator::make($data, Job::$rules);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }else{

            $pic = $request->file('jobimg');        
            $filename = $pic->getClientOriginalName(); 
            $jobid = $request->Input('jobid');  


            $job = new Job();       
            $job->user_id = $user->id;   
            $job->job_id = $request->Input('jobid');                       
            $job->description = $request->Input('description');        
            $job->category = $request->Input('category');        
            $job->duration = $request->Input('duration');   
            $job->price = $request->Input('price');   
            $job->requirement = $request->Input('requirement'); 
            $job->image_path =  $pic->getClientOriginalName(); 
            $job->verification = '0';                                          

            
            if ($request->file('jobimg')->move('public/img/jobs/job-'.$jobid.'/', $filename)){
                
                $job->save();
                $request->session()->flash('success_msg', 'Success.');          
                return redirect('post-job');          
            }else{
                $request->session()->flash('error_msg', 'Error: Try Again');           
                return redirect('post-job');   
            }

        }

    }
    
    
}

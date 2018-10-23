<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Subscribers;
use Illuminate\Support\Facades\Validator;

class SubscriberController extends Controller
{
    public function postSubmit(Request $request) {

	  //we check if it's really an AJAX request
	 	if(Request::ajax()) {
	    
		    $validation = Validator::make($request->all(), [
		      //email field should be required, should be in an email//format, and should be unique
		      'email' => 'required|email|unique:subscribers'
		    ]);

		    if($validation->fails()) {
		      return $validation->errors()->first();
		    } else {

		      $create = Subscribers::create(array(
		        'email' => $request->input('email');
		      ));

		      //If successful, we will be returning the '1' so the form//understands it's successful
		      //or if we encountered an unsuccessful creation attempt,return its info
		      return $create?'1':'We could not save your address to our system, please try again later';
		    }

	 	} else {
	    	return Redirect::to('/');
	  	}
	}

}

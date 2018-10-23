<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Validator;
use App\Services;
use App\Job;
use App\Products;
use App\Cart;

class CartController extends Controller
{	
    public function cart(){
        
        $user = Auth::user();              
        return view('cart', compact(array('carts')));           

    }
    
}
 
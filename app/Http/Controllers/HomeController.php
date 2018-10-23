<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Services;
use App\Products;
use DB;
use App\Job;
use App\Order;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Services::all()->shuffle()->slice(0,6);
        $products = Products::all()->shuffle()->slice(0,6);
        $posts = DB::table('blog')->orderBy('created_at', 'latest')->limit(6)->get();
        return view('index', compact('services', 'products', 'posts'));
    }
}

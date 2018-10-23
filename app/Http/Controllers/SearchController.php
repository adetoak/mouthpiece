<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Validator;
use App\Services;
use App\Job;
use App\Products;

class SearchController extends Controller
{
    
    public function servicesearch(Request $request){

		$user = Auth::user();		
		$data = $request->all();

		$validator = Validator::make($data, Services::$search_rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}else{
		
			$search = strip_tags($request->Input('search'));
			$searchresults =preg_replace('#[ ]#', ' ', $request->Input('search'));		
			$resultsterm = explode(" ", $searchresults);

			foreach ($resultsterm as $results) {
				$results = trim($results);
			
				$searchss = Services::where('title', 'LIKE', '%'. $results .'%')->orWhere('category', 'LIKE', '%'. $results .'%')->orWhere('description', 'LIKE', '%'. $results .'%')->paginate(30);
				$count = $searchss->count();
				return view('services.results', compact(array('user', 'searchss', 'search', 'count')));

			}
		}
	}
    public function productsearch(Request $request){

    	$user = Auth::user();		
		$data = $request->all();

		$validator = Validator::make($data, Products::$search_rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}else{
		
			$search = strip_tags($request->Input('search'));
			$searchresults =preg_replace('#[ ]#', ' ', $request->Input('search'));		
			$resultsterm = explode(" ", $searchresults);

			foreach ($resultsterm as $results) {
				$results = trim($results);
			
				$searchss = Products::where('title', 'LIKE', '%'. $results .'%')->orWhere('category', 'LIKE', '%'. $results .'%')->orWhere('description', 'LIKE', '%'. $results .'%')->paginate(30);
				$count = $searchss->count();
				return view('products.results', compact(array('user', 'searchss', 'search', 'count')));

			}
		}    	

    }
}

<?php

namespace App\Http\Controllers;
//namespace App\Http\Auth;

/* use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests; */
//use Illuminate\Routing\Controller as BaseController;

use Illuminate\Http\Request;

class LangController extends Controller
{
    //use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
	
	public function index(Request $request){
		 
			$request->validate([
				'fname' => 'required',
				'lname' => 'required',
			]);
		 
		 print_r($request->input());
		 
		
		$title = 'Home Page';
		return view('dashboard', array('title'=>$title));
	}
	
}

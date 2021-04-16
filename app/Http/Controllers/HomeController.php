<?php

namespace App\Http\Controllers;

use Mail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
//use Illuminate\Pagination\Paginator;
//use Illuminate\Pagination\LengthAwarePaginator;

class HomeController extends Controller
{
    //use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
	
	public function index(){
		 
		 
		
		$title = 'Home Page';
		return view('dashboard', array('title'=>$title));
	}

	public function userlist(){
		
		$userlist = DB::table('users_details')->orderBy('id', 'desc')->paginate(5);

		
		$title= 'User List Page';
		//$data= $userlist;
		return  view('userlist', ['data'=>$userlist]);
	}
	//profile language contact-us
	public function dashboard(Request $request){
		
		// print_r($request->input());
		
		$data['title'] = 'Dashboard Page';
		return view('dashboard', $data);
	}
	
	public function dd(Request $request){
		
		 
		//$users = DB::table('users')->select('id','name','email')->get();
		//$users = DB::table('users_details');
		//$users = DB::select('select * from users_details');
		/* $insert = DB::table('users_details')->where('id',3)->update(
			    array(
			      'address' => 'Bihar',
			      'email' => 'pankaj@gmail.com',
			    )
			); */
			
				/* $names = array(
					'Juan',
					'Luis',
					'Pedro',

				);
				$name =  $names[rand ( 0 , count($names) -1)];
		
		 $insert = DB::table('users_details')->insert(
			    array(
			      'name' => $name, 
			      'address' => 'up',
			      'email' => $name.'@gmail.com',
			    )
			);  */
		$title = 'Profile Page';	
		$users = DB::table('users_details')->paginate(2);
		return view('dashboard', ['data'=>$users,'title'=>$title]);
		//$users->links() 
		//$users = DB::table('users_details')->paginate(3);
		//echo '<pre>'; print_r($users);
			

		/*  print_r($request->input());
		
		$data['title'] = 'Dashboard Page';
		return view('dashboard', $data); */
	}
	
	function aboutus(Request $request){
		//echo '<pre>'; print_r($request->method());
		
		$data['title'] = 'About Us Page';
		return view('aboutus', $data);
	}
	function productlist(){
		$data['title'] = 'Product list Page';
		return view('productlist', $data);
	}
	function product(){
		$data['title'] = 'Add Product Page';
		return view('product', $data);
	}
	function contactus(){
		
		$data['title'] = 'Contact Us Page';
		return view('contactus', $data);
	}
	

	public function basic_email() {
		$data = array('name'=>"pankaj gupta");
	  $message = 'test';
		Mail::send('mail', $data, function($message) {
		   $message->to('pankajgupta7000@gmail.com', 'Learing Laravel Tutorials Point')->subject
			  ('Laravel Basic Testing Mail');
		   $message->from('pankajgupta7000@gmail.com','pankaj Gandhi');
		});
		echo "Basic Email Sent. Check your inbox.";  
		//return view('contactus');
	 }
}

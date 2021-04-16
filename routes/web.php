<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Login;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Route::get('/', function () {
    return view('welcome');
}); */
Route::get('/logout', 'Login@logout');	

Route::get('/', 'HomeController@index');
Route::post('/doLogin', 'Login@doLogin');
Route::get('/userlogin', 'Login@login');
Route::post('/registration', 'Login@registration');
		
Route::get('/registration', 'Login@registration');

Route::middleware(['logauth'])->group(function (){
	    Route::get('/dashboard', 'HomeController@dashboard');
		Route::get('/contactus', 'HomeController@contactus');
		Route::get('/userlist', 'HomeController@userlist');
		Route::get('/aboutus', 'HomeController@aboutus');
		//Route::get('/basic_email', 'HomeController@basic_email');
		Route::get('sendbasicemail','HomeController@basic_email');
		Route::get('/edituser/{id}', 'Login@edituser');
        Route::get('/userdelete/{id}', 'Login@userdelete');


		Route::get('/productlist', 'ProductController@show');
		Route::post('/product', 'ProductController@store');
		Route::get('/product', 'ProductController@store');

		// Route::get('/productedit{id}', 'ProductController@productedit');
		// Route::get('/productdelete{id}', 'ProductController@pdelete');
		Route::get('/pdelete/{id}', 'ProductController@pdelete');
		Route::get('/productedit/{id}', 'ProductController@productedit');
		
		
});


//Route::get('/product', 'HomeController@product');
//Route::get('/productlist', 'HomeController@productlist');

//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

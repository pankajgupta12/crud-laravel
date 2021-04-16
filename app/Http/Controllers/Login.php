<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\DB;
class Login extends Controller
{
    //
       
       function login(){
       
            $data['title'] = 'Login Page';
            return  view('login.login', $data);

       }

 public function edituser(Request $request ,  $id){

     $method =  $request->method();

     if($method == 'GET' && $id != '') {
          $userData =  DB::table('users_details')->find($id);
        }

        
        $title = 'Edit Registration Page';
        return  view('login.registration', ['data'=>$userData,'title'=>$title]);
 }

       function registration(Request $request){
          // echo  ( $id); 
          $method =  $request->method();
          $id =  $request->input('id');
          $title = 'Registration Page';
          $name =  $request->input('username');
          $email =  $request->input('email');
          $password =  $request->input('password');
          $created_at =  date('Y-m-d H:i:s');


          if($method  == 'POST' && $id != '') {

               $this->validate($request, [
                    'username' => 'required',
                    'email' => 'required',
               ]);
               
               DB::table('users_details')->where('id', $id)->update(
                    array(
                         'name'=>$name,
                         'email'=>$email
                    )
                    );
                         $request->session()->flash('message', 'Record successfully upadted!'); 

               $data = [];
                //return  view('userlist',['data'=>$data, 'title'=>$title]);          
                return redirect('userlist');
           }



          if($method  == 'POST' && $id == '') {
              
                    $this->validate($request, [
                         'username' => 'required',
                         'email' => 'required',
                         'password' => 'required',
                         'password_confirm' => 'required',
                    ]);

                    
           
                    DB::table('users_details')->insert([
                     'name' => $name,
                     'email' => $email,
                     'password' => $password,
                     'created_at' => $created_at
                 ]);

                 $request->session()->flash('message', 'Record successfully added!'); 
                // Session::flash('success', 'Record successfully added!'); 
               
         }
         $data = [];
         return  view('login.registration',['data'=>$data, 'title'=>$title]);

       }

       public function userdelete(Request $request,  $id){
             //echo  $id;
             DB::delete('delete from users_details where id = '.$id);
             $request->session()->flash('message', 'Record Delete successfully!'); 
             return redirect('userlist');
       }

          public function doLogin(Request $request) {
         
                // print_r($request->input()); die;  
               // $request->flashOnly('username', 'email');

               $this->validate($request ,  [
                    'username' => 'required',
                    'password' => 'required',
                 ]);

             $logindata =   DB::table('users_details')
                ->where('name',$request->username)
                ->where('password',$request->password)
                 ->get();   
                
              //print_r($logindata); die;    

              if(!empty($logindata) && count($logindata) >0) {
                  
              // echo  $logindata[0]->id;

              //echo '<pre>'; print_r($logindata); die;

                $request->session()->put('id', $logindata[0]->id);
                $request->session()->put('name', $logindata[0]->name);

                 return redirect('dashboard');   
              }else{
               $request->session()->flash('message', 'Your User Name and password missmatch');  
               return redirect('userlogin');    
              }

          }

          public function logout(Request $request){
               // $request->session()->forget('id');
               // $request->session()->forget('nanme');
               // $request->session()->flush();
                    Session::forget('id');
                    Session::forget('name');
                    session()->forget('id');
                    session()->forget('name');
                    session()->flush();
               
               return redirect('userlogin');
          }
}

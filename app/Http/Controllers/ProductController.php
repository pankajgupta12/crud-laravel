<?php

namespace App\Http\Controllers;

use App\Product;
//use Illuminate\Http\Request;
use Session;
//use Validator, Input, Redirect; 

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    //  print_r($request->file('file_name')); die;
         
     $product = new Product;
    
     if($request->method() == 'POST'  && $request->input('id') != '') {

        $this->validate($request, [
            'name' => 'required',
            'title' => 'required',
            'city' => 'required',
            'description' => 'required',
        ]);

        $filename = '';
         if($request->file('file_name') != '') {
            $file = $request->file('file_name');
            // $path = $request->file('file_name')->store('photos');
            // generate a new filename. getClientOriginalExtension() for the file extension
            $filename = 'profile-photo-' . time() . '.' . $file->getClientOriginalExtension();
            // save to storage/app/photos as the new $filename
            // $path = $file->storeAs('photos', $filename);
            $file->move('images', $filename);
         }
         $product = Product::find($request->input('id'));
         $product->img = $filename;
         $product->name =   $request->input('name');
         $product->title =   $request->input('title');
         $product->city =   $request->input('city');
         $product->description =   $request->input('description');
         $product->save();
         Session::flash('message', 'One record updated!'); 
          return redirect ('productlist');

     } else if($request->method() == 'POST' && $request->input('id') == '') {

        $this->validate($request, [
            'name' => 'required',
            'title' => 'required',
            'city' => 'required',
            'description' => 'required',
        ]);
           
        $filename = '';
        if($request->file('file_name') != '') { 
            $file = $request->file('file_name');
           // $path = $request->file('file_name')->store('photos');
            // generate a new filename. getClientOriginalExtension() for the file extension
            $filename = 'profile-photo-' . time() . '.' . $file->getClientOriginalExtension();
            // save to storage/app/photos as the new $filename
           // $path = $file->storeAs('photos', $filename);
             $file->move('images', $filename);
        }

            $product->img = $filename;
            $product->name =   $request->input('name');
            $product->title =   $request->input('title');
            $product->city =   $request->input('city');
            $product->description =   $request->input('description');
            //$product->comment =   $request->input('description');
            
            //echo '<pre>'; print_r($product); die;

            // product::create($product->all());  
            $product->save();
            Session::flash('message', 'One record added!'); 
        }
         $products = array();
        return view('product',['products'=>$products]);

         //  return view('product');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
       
        $products = Product::paginate(10);
       //print_r($products); die;
         
       $title = 'Product Page List';
       return view('productlist', ['title'=>$title, 'data'=>$products]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    public function pdelete(Request $request, $id )
    {
        Product::find($id)->delete();
        Session::flash('message', 'One record Delete!'); 
        // return view('productlist');
        $title = 'Product Page List';
        return redirect('productlist');
    }

    public function productedit(Request $req, $id)
     {
         //echo $id; die;
         $products = Product::find($id);
          //echo '<pre>'; print_r($products); die;

          return view('product',['products'=>$products]);
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit_(Product $product, $id)
    {
          
          echo $id;
    }
}

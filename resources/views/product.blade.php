@extends('footer')
@extends('layout')

@section('header')
  
<?php  
 
 // print_r($products);
 
?>


  
  <div class="container">
  <h3>Product Page</h3>

   @foreach($errors->all() as $items)
     <p style="color:red; text-align:center;">{{$items}}</p>
    @endforeach
    
    @if(Session::has('message'))
      <p class="alert alert-info">{{ Session::get('message') }}</p>
     @endif
  
   
  <form action="/product" method="post" enctype="multipart/form-data">
  @csrf
    <div class="row">
      <div class="col-25">
        <label for="fname">Product Name</label>
      </div>
      <input type="hidden" id="id" name="id"  value="{{  $products->id ?? '' }}" ">
      <div class="col-75">
        <input type="text" id="name" name="name"  value="{{  $products->name ?? '' }}"   placeholder="Product name..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="title">Title</label>
      </div>
      <div class="col-75">
        <input type="text" id="title" name="title" value="{{ old('title', $products->title ?? '') }}" placeholder="Product title name..">
      </div>
    </div>
    
    <div class="row">
      <div class="col-25">
        <label for="title">Images</label>
      </div>
      <div class="col-75">
        <input type="file" id="file" name="file_name" value="{{$products->img ?? ''}}">
         @if(isset($products->img))
        <p><img src="{{ asset('images/'.$products->img) }}" style="width:40px"/></p>
       @endif
      </div>
    </div>
    

    <div class="row">
      <div class="col-25">
        <label for="city">City</label>
      </div>
      <div class="col-75">
        <select id="city" name="city">
          <option value="Delhi" {{old('city',$products->city ?? '')=="Delhi"? 'selected':''}}>Delhi</option>
          <option value="Noida"  {{old('city',$products->city ?? '')=="Noida"? 'selected':''}}>Noida</option>
          <option value="Panjab"  {{old('city',$products->city ?? '')=="Panjab"? 'selected':''}}>Panjab</option>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="description">Description</label>
      </div>
      <div class="col-75">
        <textarea id="description" name="description" placeholder="Write something.." style="height:200px">{{ old('description', $products->description ?? '') }}</textarea>
      </div>
    </div>
    <div class="row">
      <input type="submit" value="Submit">
    </div>
  </form>
</div>
     
    @section('footer_data')
    @endsection
 @endsection
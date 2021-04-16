@extends('footer')
@extends('layout')

@section('header')
   
 
<div id="legend">
      <legend class="">{{$title}} </legend>
    </div>
 @if(count($errors->all())>0)
   @foreach ($errors->all() as $error)
      <div style="color:red">{{ $error }}</div>
  @endforeach
@endif

@if(Session::has('message'))
<p class="alert alert-info">{{ Session::get('message') }}</p>
@endif

  <form class="form-horizontal" action="{{url('/registration')}}"   method="POST">
   @csrf
  <fieldset>
    
    <div class="control-group">
      <!-- Username -->
      <label class="control-label"  for="username">Username</label>
      <div class="controls">
      @if(isset($data->name))
        <input type="text" id="username" name="username" placeholder=""    value="{{$data->name}} " class="input-xlarge">
      @else
      <input type="text" id="username" name="username" placeholder=""    value="" @endi class="input-xlarge">
      @endif
      </div>
    </div> 
 
    <div class="control-group">
      <!-- E-mail -->
      <label class="control-label" for="email">E-mail</label>
      <div class="controls">
      @if(isset($data->name))
        <input type="text" id="email" name="email" value="{{$data->email}}" placeholder="" class="input-xlarge">
        <input type="hidden" name="id" value="{{$data->id}}"/>
       @else
       <input type="text" id="email" name="email" value="" placeholder="" class="input-xlarge">
       <input type="hidden" name="id" value=""/>
       @endif
     
      </div>
    </div>
 

    @if(empty($data))
    <div class="control-group">
      <!-- Password-->
      <label class="control-label" for="password">Password</label>
      <div class="controls">
        <input type="password" id="password" name="password"  placeholder="" class="input-xlarge">
      </div>
    </div>
 
    <div class="control-group">
      <!-- Password -->
      <label class="control-label"  for="password_confirm">Password (Confirm)</label>
      <div class="controls">
        <input type="password" id="password_confirm" name="password_confirm" placeholder="" class="input-xlarge">
      </div>
    </div>
    
    @endif
    <br/>
    <div class="control-group">
      <!-- Button -->
      <div class="controls">
      @if(empty($data))
        <button class="btn btn-success">Register</button>
        @else
        <button class="btn btn-success">Update</button>
        
        @endif
       
      </div>
    </div>
  </fieldset>
</form>



    @section('footer_data')
    @endsection
 @endsection




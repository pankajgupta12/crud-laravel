@extends('footer')
@extends('layout')

@section('header')

<div id="legend">
      <legend class="">Login</legend>
    </div>

    @if(Session::has('message'))
      <p class="alert alert-danger">{{ Session::get('message') }}</p>
     @endif

<form class="form-horizontal" action='/doLogin' method="POST">
@csrf
  <fieldset>
    
    <div class="control-group">
      <!-- Username -->
      <label class="control-label"  for="username" >Username</label>
      <div class="controls">
        <input type="text" id="username" name="username" placeholder=""  value = "{{ old('username') }}" class="input-xlarge">
        <p class="error"><?php echo   $errors->first('username'); ?></p>
      </div>
    </div>
 
    <div class="control-group">
      <!-- Password-->
      <label class="control-label" for="password">Password</label>
      <div class="controls">
        <input type="password" id="password" name="password" placeholder="" class="input-xlarge">
        <p class="error"><?php echo  ($errors->first('password')); ?></p>
      </div>
    </div>
 
    <br/>
    <div class="control-group">
      <!-- Button -->
      <div class="controls">
        <button class="btn btn-success">Login</button>
      </div>
    </div>
  </fieldset>
</form>

    @section('footer_data')
    @endsection
 @endsection
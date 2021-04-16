
@extends('footer')
@extends('layout')

@section('header')
   <div class="container">
        <h3><?php echo $title; ?></h3>
        <h3 style="float:right;margin-top: -47px;">Welcom : {{ Session::get('name')  }}<h3>
  </div>
  <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <?php // echo   $val=Session::get('id'); ?>
        <!-- {{ Session::get('id') }} -->

		<form method="post" action="">
 @csrf
	  <label for="fname">First name:</label><br>
	  <input type="text" id="fname" name="fname" value=""><br>
	  <label for="lname">Last name:</label><br>
	  <input type="text" id="lname" name="lname" value="">
	  <br/>
	  <br/>
	  <input type="submit" id="submit" name="submit" value="submit">
 </form>

    @section('footer_data')
    @endsection
 @endsection

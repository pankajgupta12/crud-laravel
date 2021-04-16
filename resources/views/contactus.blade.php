@extends('footer')
@extends('tpl.contactus')
@extends('layout')


@section('header')
   <div class="container">
        <h3><?php echo $title; ?></h3>
  </div>
  @section('contactus')
  @endsection

    @section('footer_data')
    @endsection
 @endsection
@extends('footer')
@extends('tpl.tplaboutus')
@extends('layout')


@section('header')

   <div class="container">
        <h3><?php echo $title; ?></h3>
  </div>
       @section('aboutus')
       @endsection
      
       @section('footer_data')
        @endsection
        
@endsection     
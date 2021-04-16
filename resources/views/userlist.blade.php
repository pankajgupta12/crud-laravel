@extends('footer')
@extends('layout')

@section('header')
   <div class="container">
        <h3><?php //echo $title; ?></h3>
  </div>
  @if(Session::has('message'))
    <p class="alert alert-success">{{ Session::get('message') }}</p>
   @endif
  <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">UserName</th>
      <th scope="col">Email</th>
      <th scope="col">CreatedOn</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

   @foreach($data as $key=>$items)

    <tr>
      <th scope="row">{{$items->id}}</th>
      <td>{{$items->name}}</td>
      <td>{{$items->email}}</td>
      <td>{{$items->created_at}}</td>
      <td><a href="{{url('/edituser/'.$items->id)}}">Edit</a> / <a href="{{url('/userdelete/'.$items->id)}}">Delete</a></td>
    </tr>
   @endforeach 

  </tbody>
</table>

<div>
 {{$data->links()}}
</div>

    @section('footer_data')
    @endsection
 @endsection
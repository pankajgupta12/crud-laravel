@extends('footer')
@extends('layout')


@section('header')
   <div class="container">
        <h3><?php echo $title; ?></h3>
  </div>
  
  <table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Product </th>
      <th scope="col">title</th>
      <th scope="col">city</th>
      <th>description</th>
      <th>Images</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

   @foreach($data as $key=>$items)

    <tr>
      <th scope="row">{{$items->id}}</th>
      <td>{{$items->name}}</td>
      <td>{{$items->title}}</td>
      <td>{{$items->city}}</td>
      <td>{{$items->description}}</td>
      <td><a href="{{ asset('images/'.$items->img) }}"  target="_blank"><img  style="width:100px;" src="{{ asset('images/'.$items->img) }}"></a></td>
      <td><a href="{{url('/productedit/'.$items->id)}}">Edit</a> / <a href="{{url('/productdelete/'.$items->id)}}">Delete</a></td>
    </tr>
   @endforeach 

  </tbody>
   <div>
   {{$data->links()}}
   </dib>

</table>

    @section('footer_data')
    @endsection
 @endsection
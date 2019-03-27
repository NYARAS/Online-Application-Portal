@extends('layouts.app')

@section('content')




<div class="container">
<div class="row">
 <legend style="color: green; font-family: Poppins">List of available vacancies</legend>
  <div class="row">
 <div class="col-md-12 col-lg-12">
 @if(session('info'))
 <div style="color: green" class="alert alert-success">
 	

 {{session('info')}}
  </div>
 @endif
 </div>
 </div>

<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  
  
    <tr class="table-active">

      <td>{{$vacancy->id}}</td>
      <td style="color:green">{{$vacancy->title}}</td>
      <td>{{$vacancy->body}}</td>
      <td>
      <a href="{{url('')}}" class="btn btn-primary">View</a>|
       <a href='{{url("/update/{$vacancy->id}")}}' class="btn btn-success">Update</a>|
        <a href='{{url("/delete/{$vacancy->id}")}}' class="btn btn-danger">Delete</a>|
      </td>
    </tr>



  </tbody>
</table>
	
</div>
	
</div>
 @endsection
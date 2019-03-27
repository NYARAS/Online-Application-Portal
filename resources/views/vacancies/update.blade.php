@extends('layouts.app')

@section('content')


<div class="container">
<div class="row">
<div class="col-md-6">
  <form class="form-horizontal" method="POST" action="{{url('/edit', array($vacancy->id))}}">
  {{csrf_field()}}
  <fieldset>
    <legend>Online Job Application</legend>
  @if(count($errors) > 0)
  @foreach($errors -> all() as $error)
  <div class="alert alert-danger">
  {{$error}}
    
  </div>
  @endforeach
  @endif
    
    <div class="form-group">
      <label style="color:green;font-style: Poppins" class="col-lg-2 control-label" for="exampleInputEmail1">Title</label>
      <div class="col-lg-10">
      <input type="text" class="form-control" name="title" id="InputEmail" value="<?php echo $vacancy->title;  ?>" placeholder="Title">
     
    </div>
    </div>
    <div class="form-group">
     
  <label style="color:green;font-style: Poppins" class="col-lg-2 control-label" for="exampleInputEmail1">Description</label>
      <div class="col-lg-10">
      
     <textarea name="body" class="form-control" placeholder="Description"><?php echo $vacancy->body;  ?></textarea>
    </div>
   
    <br >
</div>
      
    <div class="form-group">
    <div class="col-lg-10 col-lg-offset-2">
    <button type="submit" class="btn btn-primary">Submit</button>
    <button type="reset" class="btn btn-danger">Cancel</button>
    <a href="{{url('/vacancies.show')}}" class="btn btn-primary">Back</a>
      
    </div>
      
    </div>
</form>
</div>
  
</div>
  
</div>
@endsection
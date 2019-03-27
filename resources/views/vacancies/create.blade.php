@extends('layouts.app')

@section('content')


<h3>Create Vacancy</h3>
<div class="container">
<div class="row">
<div class="col-md-6">
	<form class="form-horizontal" method="POST" action="{{url('/insert')}}">
  {{csrf_field()}}
  <fieldset>
    <legend>Recent Vacancies</legend>
  @if(count($errors) > 0)
  @foreach($errors -> all() as $error)
  <div class="alert alert-danger">
  {{$error}}
    
  </div>
  @endforeach
  @endif
    @if(session('info'))
    <div class="alert alert-success">{{session('info')}}</div>
    @endif
    <div class="form-group">
      <label style="color:green;font-style: Poppins" class="col-lg-2 control-label" for="exampleInputEmail1">Position</label>
      <div class="col-lg-4">
        <select name="title" class="col-md-4 form-control">
                  <option>Choose from list</option>
                <option style="font-weight: bold;">Professor</option>
                <option style="font-weight: bold;">Senior Lecturer</option>
                <option style="font-weight: bold;">Lecturer</option>
                <option style="font-weight: bold;">Tutorial fellow</option>
                <option style="font-weight: bold;">Registrar</option>
                <option style="font-weight: bold;">Technician</option>
              </select>
     
    </div>
    </div>
     <div class="form-group">
      <label style="color:green;font-style: Poppins" class="col-md-2 control-label" for="exampleInputEmail1">Department/School</label>
      <div class="col-lg-4">
            <select name="department" class="col-md-4 form-control">
               <option>Choose from List</option>
                <option style="font-weight: bold;">School of Science</option>
                <option style="font-weight: bold;">School of Education</option>
                <option style="font-weight: bold;">School of Tourism and Nat. Resources</option>
                <option style="font-weight: bold;">School of Business</option>
                <option style="font-weight: bold;">School of Arts</option>
                <option style="font-weight: bold;">Management</option>
                <option style="font-weight: bold;">Security</option>
              </select>
     
    </div>
    </div>
     <div class="form-group">
      <label style="color:green;font-style: Poppins" class="col-lg-2 control-label" for="exampleInputEmail1">Job Code</label>
      <div class="col-lg-4">
                <select name="jobcode" class="col-md-4 form-control">
                <option selected="selected">Choose from List</option>
                <option style="font-weight: bold;">COM 23234V</option>
                <option style="font-weight: bold;">REF 234123G</option>
                <option style="font-weight: bold;">REF 234527T</option>
                <option style="font-weight: bold;">TED 23546Y</option>
              </select>
     
    </div>
    </div>
    <div class="form-group">
     
  <label style="color:green;font-style: Poppins" class="col-lg-2 control-label" for="exampleInputEmail1">Description</label>
      <div class="col-lg-10">
      
     <textarea name="body" class="form-control" placeholder="Description"></textarea>
    </div>
   </div>
   

    
    <div class="form-group">
    <div class="col-lg-10 col-lg-offset-2">
    <button type="submit" class="btn btn-primary">Submit</button>
    <button type="reset" class="btn btn-danger">Cancel</button>
    <a href="{{url('/')}}" class="btn btn-primary">Back</a>
      
    </div>
      
    </div>
</form>
</div>
	
</div>
	
</div>

@endsection
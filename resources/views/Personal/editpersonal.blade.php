@extends('layouts.app')
<style type="text/css">
    .form-group.required .control-label:after {
    color: #ff0000;
    content: "*";
   
}
.form-group .control-label{
    color: green;
}
</style>
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-1">
                                               @if(count($errors) > 0)
  @foreach($errors -> all() as $error)  
  <div class="alert alert-danger">
  {{$error}}
    
  </div>
  @endforeach
  @endif
   @if(session('info'))
 <div style="color: green" class="alert alert-success">
    

 {{session('info')}}
  </div>
 @endif
            <div class="panel panel-default">
                <div class="panel-heading" style="color: green;font-family: Poppins">Personal Information</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{url('/editpersonal',array($personals->id)) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('fname') ? ' has-error' : '' }} required">
                          

                       
                             <div class="col-md-3">
                              <label for="first_name" class="control-label">First Name</label>
                                <input id="first_name" type="text" class="form-control" name="first_name" value="{{ Auth::user()->first_name }}" required autofocus>

                                @if ($errors->has('first_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>

                      
                      
                          

                            <div class="col-md-3">
                              <label for="second_name" class=" control-label">Second Name</label>
                                <input id="second_name" type="text" class="form-control" name="second_name" value="{{ Auth::user()->second_name }}"  required autofocus>

                                @if ($errors->has('second_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('second_name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-3">
                              <label for="last_name" class=" control-label">Last Name</label>
                                <input id="last_name" type="text" class="form-control" name="last_name" value="{{ Auth::user()->last_name }}"required autofocus>

                                @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-3">
                              <label for="physical_address" class=" control-label">Physical Address</label>
                                <input id="physical_address" type="text" class="form-control" name="physical_address" value="{{ ($personals->physical_address) }}" required autofocus>

                                @if ($errors->has('physical_address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('physical_address') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-3">
                              <label for="box_number" class=" control-label">BOX Number</label>
                                <input id="box_number" type="text" class="form-control" name="box_number" value="{{ ($personals->box_number) }}" required autofocus>

                                @if ($errors->has('box_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('box_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                    

                       
                           

                            <div class="col-md-3">
                             <label for="country" class=" control-label">Country</label>
                                <input id="country" type="text" class="form-control" name="country"  value="{{ ($personals->country) }}" required>

                                @if ($errors->has('country'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                @endif
                          
                        </div>
                         <div class="col-md-3">
                             <label for="city" class=" control-label">City</label>
                                <input id="city" type="text" class="form-control" name="city"  value="{{ ($personals->city) }}" required> 

                                @if ($errors->has('city'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                          
                        </div>
                      
                           

                            <div class="col-md-3">
                               <label for="email" class=" control-label">Email Address</label>
                                <input id="email" type="email" class="form-control" name="email" value="{{ ($personals->email) }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                           
                        </div>

                       
                         

                            <div class="col-md-3">
                               <label for="mobile_number" class=" control-label">Mobile Number</label>
                                <input id="mobile_number" type="text" class="form-control" name="mobile_number" value="{{ ($personals->mobile_number) }}" required>

                                @if ($errors->has('mobile_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mobile_number') }}</strong>
                                    </span>
                                @endif
                                                    </div>

                  
                          


                            <div class="col-md-3">
                            <label for="photo_image" class=" control-label">Attach Photo</label>
                                <input id="photo_image" type="file" class="form-control" name="photo_image" required>

                                @if ($errors->has('photo_image'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('photo_image') }}</strong>
                                    </span>
                                @endif
                            </div>
                               <div class="col-md-3">
                            <label for="cover_letter" class=" control-label">Attach cover letter</label>
                                <input id="cover_letter" type="file" class="form-control" name="cover_letter" required>

                                @if ($errors->has('cover_letter'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cover_letter') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-3">
                            <label for="curriculum_vitae" class=" control-label">Attach CV</label>
                                <input id="curriculum_vitae" type="file" class="form-control" name="curriculum_vitae" required>

                                @if ($errors->has('curriculum_vitae'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('curriculum_vitae') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-3">
                               <label for="gender" class=" control-label">Gender</label>
                                <input id="gender" type="text" class="form-control" name="gender" value="{{ ($personals->gender) }}" required>

                                @if ($errors->has('gender'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                                                    </div>
                                                     <div class="col-md-3">
                               <label for="post_id" class=" control-label">Job Applying for</label>
                                <select style="font-weight: bold;" id="post_id" type="text" class="form-control" name="post_id" value="{{ old('post_id') }}"required>
                                 <option   value="{{$posts->id}}">{{$posts->post_title}}</option>
                                  @if(count($post) > 0)
                                @foreach($post ->all() as $posts)
                                <option style="font-weight: bold;" value="{{$posts->id}}">{{$posts->post_title}}</option>

                                @endforeach

                                @endif
                                </select>

                                @if ($errors->has('post_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('post_id') }}</strong>
                                    </span>
                                @endif
                                                    </div>
                                                     <div class="col-md-3">
                               <label for="school_id" class=" control-label">School/Dept/Section</label>
                                <select style="font-weight: bold;" id="school_id" type="text" class="form-control" name="school_id" value="{{ old('school_id') }}"required>
                                   <option    value="{{$school->id}}">{{$school->school}}</option>
                                  @if(count($school) > 0)
                                @foreach($school ->all() as $schools)
                                <option style="font-weight: bold;" value="{{$schools->id}}">{{$schools->school}}</option>

                                @endforeach

                                @endif
                                </select>

                                @if ($errors->has('school_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('school_id') }}</strong>
                                    </span>
                                @endif
                                                    </div>


                   
<br>
                     </div>
<div class="form-group">
                            <div class="col-md-8 ">
                                <button type="submit" class="btn btn-success">
                                    Save

                                </button>
                                    <a href="{{url('/personal')}}" class="btn btn-primary">Back</a>|
                                      <button type="submit" class="btn btn-danger">
                                    Reset
                                </button>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
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
                    <form class="form-horizontal" method="POST" action="{{url('/editcandidates',array($personals->applicant_id)) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('fname') ? ' has-error' : '' }} required">



                             <div class="col-md-3">
                              <label for="first_name" class="control-label">First Name</label>
                                <input id="first_name" type="text" class="form-control" disabled="true" name="first_name" value="{{$personals->first_name}}" required autofocus>

                                @if ($errors->has('first_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>





                            <div class="col-md-3">
                              <label for="second_name" class=" control-label">Second Name</label>
                                <input id="second_name" type="text" class="form-control" name="second_name" disabled="true"value="{{$personals->second_name}}"  required autofocus>

                                @if ($errors->has('second_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('second_name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-3">
                              <label for="sname" class=" control-label">Last Name</label>
                                <input id="lname" type="text" class="form-control" name="lname" disabled="true" value="{{ old('lname') }}" required autofocus>

                                @if ($errors->has('lname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lname') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-3">
                              <label for="physical_address" class=" control-label">Physical Address</label>
                                <input id="physical_address" type="text" class="form-control" disabled="true" name="physical_address" value="{{ ($personals->physical_address) }}" required autofocus>

                                @if ($errors->has('physical_address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('physical_address') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-3">
                              <label for="box_number" class=" control-label">BOX Number</label>
                                <input id="box_number" type="text" class="form-control" disabled="true" name="box_number" value="{{ ($personals->box_number) }}" required autofocus>

                                @if ($errors->has('box_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('box_number') }}</strong>
                                    </span>
                                @endif
                            </div>





                            <div class="col-md-3">
                             <label for="country" class=" control-label">Country</label>
                                <input id="country" type="text" class="form-control" name="country" disabled="true" value="{{ ($personals->country) }}" required>

                                @if ($errors->has('country'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                @endif

                        </div>
                         <div class="col-md-3">
                             <label for="city" class=" control-label">City</label>
                                <input id="city" type="text" class="form-control" name="city" disabled="true" value="{{ ($personals->city) }}" required>

                                @if ($errors->has('city'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif

                        </div>



                            <div class="col-md-3">
                               <label for="email" class=" control-label">Email Address</label>
                                <input id="email" type="email" class="form-control" name="email" disabled="true" value="{{ ($personals->email) }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif

                        </div>




                            <div class="col-md-3">
                               <label for="mobileno" class=" control-label">Mobile Number</label>
                                <input id="mobileno" type="text" class="form-control" name="mobileno" disabled="true" value="{{ ($personals->mobileno) }}" required>

                                @if ($errors->has('mobileno'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mobileno') }}</strong>
                                    </span>
                                @endif
                                                    </div>





                            <div class="col-md-3">
                            <label for="photo_image" class=" control-label">Attach Photo</label>
                                <input id="photo_image" type="file" class="form-control" disabled="true" name="photo_image" required>

                                @if ($errors->has('photo_image'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('photo_image') }}</strong>
                                    </span>
                                @endif
                            </div>
                               <div class="col-md-3">
                            <label for="cover_letter" class=" control-label">Attach cover letter</label>
                                <input id="cover_letter" type="file" class="form-control" name="cover_letter" disabled="true" required>

                                @if ($errors->has('cover_letter'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cover_letter') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-3">
                            <label for="file_cv" class=" control-label">Attach CV</label>
                                <input id="file_cv" type="file" class="form-control" disabled="true" name="file_cv" required>

                                @if ($errors->has('file_cv'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('file_cv') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-3">
                               <label for="gender" class=" control-label">Gender</label>
                                <input id="gender" type="text" class="form-control" name="gender" disabled="true" value="{{ ($personals->gender) }}" required>

                                @if ($errors->has('gender'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                                                    </div>
                                                     <div class="col-md-3">
                               <label for="post_id" class=" control-label">Job Applying for</label>
                                <select style="font-weight: bold;" id="post_id" type="text" class="form-control" disabled="true" name="post_id" value="{{ old('post_id') }}"required>
                                 <option   value="{{$posts->post_id}}"></option>
                                  @if(count($post) > 0)
                                @foreach($post ->all() as $posts)
                                <option style="font-weight: bold;" value="{{$posts->post_id}}"></option>

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
                               <label for="status" class=" control-label">Status</label>
                                <select style="font-weight: bold;" id="qualified_candidate" type="text" class="form-control"  name="qualified_candidate" value="{{$personals->status}}" required>
                                 <option  value="">Select......</option>

                                <option style="font-weight: bold;">Qualified</option>
                                <option style="font-weight: bold;">Not Qualified</option>



                                </select>

                                @if ($errors->has('status'))
                                    <span class="help-block">
                                        <strong style="color: red">{{ $errors->first('status') }}</strong>
                                    </span>
                                @endif
                                                    </div>



<br>
                     </div>
<div class="form-group">
                            <div class="col-md-8 ">
                                <button type="submit" class="btn btn-success">
                                  Update

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

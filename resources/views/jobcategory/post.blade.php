@extends('layouts.app')
<style type="text/css">
    .avatar{
        border-radius: 100px;
        max-width: 120px;
    }
      .panel-green > .panel-heading {
        border-color: #5cb85c;
        color: green;
    }

.panel-green {
    border-color: red;
}

.form-group.required .control-label:after {
    color: #ff0000;
    content: "*";

}
.control-label{
    color: green;
}
.lead{
    font-weight: bold;
}

</style>
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
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
            <div class="panel panel-green">
                <div class="panel-heading">Add New Job Vacancy </div>

                <div class="panel-body">
                @if(!empty($profile))

               <div class="col-md-4">
                  <img src="{{$profile->profile_pic}}" class="avatar" alt="">
                @else
                <div class="col-md-4">
                  <img src="{{url('public/images/unnamed.png')}}" class="avatar" alt="">


                @endif
                 @if(!empty($profile))

             <p  style="font-weight: bold;" class="lead">{{$profile->username}}</p>
                @else


  <p class="lead"><p>
                @endif

                  <p class="lead"><p>

              </div>
                <div class="col-md-8">
                  <form class="form-horizontal" method="POST" action="{{url('/addpost') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('post_title') ? ' has-error' : '' }}">
                         <div class="col-md-8">
                            <label for="post_title" class="control-label">Post/Vacancy</label>


                                <input id="post_title" type="text" class="form-control" name="post_title" value="{{ old('post_title') }}" required autofocus>

                                @if ($errors->has('post_title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('post_title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                          <div class="form-group required{{ $errors->has('jobcode_id') ? ' has-error' : '' }}">
                         <div class="col-md-8">
                            <label for="jobcode_id" class="control-label">Job Code</label>


                                <select style="font-weight: bold;" id="jobcode_id" type="text" class="form-control" name="jobcode_id" value="{{ old('jobcode_id') }}" required autofocus>
                                 <option   value="">Select......</option>
                                @if(count($jobcode) > 0)
                                @foreach($jobcode ->all() as $jobcodes)
                                <option style="font-weight: bold;" value="{{$jobcodes->jobcode_id}}">{{$jobcodes->jobcode_name}}</option>

                                @endforeach

                                @endif
                                </select>

                                @if ($errors->has('jobcode_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('jobcode_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <div class="form-group{{ $errors->has('school_id') ? ' has-error' : '' }}">
                         <div class="col-md-8">
                            <label for="school_id" class="control-label">School/Dept./Section</label>


                                <select style="font-weight: bold;" id="school_id" type="text" class="form-control" name="school_id" value="{{ old('school_id') }}" required autofocus>
                                <option  value="">Select......</option>
                                @if(count($schools) > 0)
                                @foreach($schools ->all() as $school)
                                <option style="font-weight: bold;" value="{{$school->id}}">{{$school->school}}</option>

                                @endforeach

                                @endif
                                </select>

                                @if ($errors->has('school_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('school_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                             <div  class="form-group{{ $errors->has('post_body') ? ' has-error' : '' }}">
                         <div class="col-md-12">
                            <label for="post_body" class="control-label">Body/description/Requirements</label>


                                <textarea id="article-ckeditor"  rows="10" type="text" class="form-control" name="post_body" value="{{ old('post_body') }}" required autofocus>
                                </textarea>
                                @if ($errors->has('post_body'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('post_body') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


</div>

                        <div class="form-group">
                            <div class="col-md-4 col-md-offset-4">
                                <button type="submit" class="btn btn-success btn-block">
                                 Add
                                </button>


                            </div>
                        </div>
                    </form>

                </div>
                </div>
                </div>
                        </div>
                                </div>

@endsection

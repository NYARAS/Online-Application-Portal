@extends('layouts.app')
<style type="text/css">
    .avatar{
        border-radius: 100px;
        max-width: 100px;
    }
      .panel-green > .panel-heading {
        border-color: #5cb85c;
        color: green;
    }

.panel-green {
    border-color: red;
}
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
            <div class="panel panel-default">
                <div style="color: green; font-weight: bold;" class="panel-heading">School/Dept/Section</div>


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
               

  <p class="lead"></p>
                @endif
</div>
                  <div class="col-md-8">
                <form class="form-horizontal" method="POST" action="{{url('/addschool') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('school') ? ' has-error' : '' }}">
                           <div class="col-md-12">
                            <label for="email" class="control-label">School/Dept/Section</label>

                          
                                <input id="email" type="text" class="form-control" name="school" value="{{ old('school') }}" required autofocus>

                                @if ($errors->has('school'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('school') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-success">
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
                                </div>
                                
@endsection
@extends('layouts.app')
<style type="text/css">
    .avatar{
     display: block;
      border-radius: 100px;
     margin-left: auto;
     margin-right: auto;
     width: 40%;

    }
    strong{
        color: red;
    }
</style>
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
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
            <div class="panel panel-secondary">
                <div class="panel-heading" style="color: green;font-family: Poppins">REFEREES DETAILS AND RECOMMENDATION LETTER</div>

                <div class="panel-body">
               

                    <form class="form-horizontal" method="POST" action="{{url('/addreferees') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('fname') ? ' has-error' : '' }}">
                            <label for="referee_one" style="color:green" class="col-md-4 control-label">1. Name of Referee:  
 

 </label>

                            <div class="col-md-2">
                                <input id="referee_one" type="text" class="form-control" name="referee_one" value="{{ old('referee_one') }}" required autofocus>

                                @if ($errors->has('referee_one'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('referee_one') }}</strong>
                                    </span>
                                @endif
                                </div>
                                  <label style="color: green" for="referee_one_recommendation" class="col-md-3 control-label">Attach Recommendation Letter: </label>

                            <div class="col-md-3">
                                <input id="referee_one_recommendation" type="file" class="form-control" name="referee_one_recommendation" value="{{ old('referee_one_recommendation') }}" required autofocus>

                                @if ($errors->has('referee_one_recommendation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('referee_one_recommendation') }}</strong>
                                    </span>
                                @endif
                            </div>
                            </div>
                                <div class="form-group{{ $errors->has('fname') ? ' has-error' : '' }}">
                            <label for="referee_two" style="color:green" class="col-md-4 control-label">2. Name of Referee:  </label>

                            <div class="col-md-2">
                                <input id="referee_two" type="text" class="form-control" name="referee_two" value="{{ old('referee_two') }}" required autofocus>

                                @if ($errors->has('referee_two'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('referee_two') }}</strong>
                                    </span>
                                @endif
                                </div>
                                  <label style="color: green" for="referee_two_recommendation" class="col-md-3 control-label">  Attach Recommendation Letter:  </label>

                            <div class="col-md-3">
                                <input id="referee_two_recommendation" type="file" class="form-control" name="referee_two_recommendation" value="{{ old('referee_two_recommendation') }}" required autofocus>

                                @if ($errors->has('referee_two_recommendation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('referee_two_recommendation') }}</strong>
                                    </span>
                                @endif
                            </div>
                            </div>
                  
                          <div class="form-group{{ $errors->has('fname') ? ' has-error' : '' }}">
                            <label for="referee_three" style="color:green" class="col-md-4 control-label">
3. Name of Referee:  </label>

                            <div class="col-md-2">
                                <input id="referee_three" type="text" class="form-control" name="referee_three" value="{{ old('referee_three') }}" required autofocus>

                                @if ($errors->has('referee_three'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('referee_three') }}</strong>
                                    </span>
                                @endif
                                </div>
                                  <label style="color: green" for="referee_three_recommendation" class="col-md-3 control-label">   Attach Recommendation Letter: </label>

                            <div class="col-md-3">
                                <input id="referee_three_recommendation" type="file" class="form-control" name="referee_three_recommendation" value="{{ old('referee_three_recommendation') }}" required autofocus>

                                @if ($errors->has('referee_three_recommendation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('referee_three_recommendation') }}</strong>
                                    </span>
                                @endif
                            </div>
                            </div>
                           
                           
                        

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-success">
                                    Save

                                </button>
                                   <button class="btn btn-primary">
                                    Back
                                </button>  <button  class="btn btn-danger">
                                    Reset
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

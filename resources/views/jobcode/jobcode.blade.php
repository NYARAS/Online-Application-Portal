@extends('layouts.app')

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
                <div style="color: green; font-weight: bold;" class="panel-heading">Job Code</div>


                <div class="panel-body">
                <form class="form-horizontal" method="POST" action="{{url('/addjobcode') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('jobcode_name') ? ' has-error' : '' }}">
                            <label for="jobcode_name" class="col-md-4 control-label">Job Code</label>

                            <div class="col-md-6">
                                <input id="jobcode_name" type="text" class="form-control" name="jobcode_name" value="{{ old('jobcode_name') }}" required autofocus>

                                @if ($errors->has('jobcode_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('jobcode_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
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
                                
@endsection
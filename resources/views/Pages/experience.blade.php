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
            <div class="panel panel-default">
                <div class="panel-heading" style="color: green;font-family: Poppins">Experiences</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('fname') ? ' has-error' : '' }} required">
                          
<div class="row">  
<label for="years" class=" col-md-4 control-label">Total Full Time Experience: Years</label>
                            <div class="col-md-2 ">
                            
                                <input id="years" type="text" class="form-control" name="fname" value="{{ old('years') }}" required autofocus>

                                @if ($errors->has('years'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('years') }}</strong>
                                    </span>
                                @endif
                            </div>
                                  <label for="months" class=" col-md-2 control-label">Months</label>
                             <div class="col-md-2">
                        
                                <input id="months" type="text" class="form-control" name="months" value="{{ old('months') }}" required autofocus>

                                @if ($errors->has('months'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('months') }}</strong>
                                    </span>
                                @endif
                            </div>

                      </div>
                      
                          

                            <div class="col-md-4">
                              <label for="institutionname1" class=" control-label">1: Institution Name</label>
                                <input id="institutionname1" type="text" class="form-control" name="sname" value="{{ old('institutionname1') }}" required autofocus>

                                @if ($errors->has('institutionname1'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('institutionname1') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-4">
                              <label for="workedas1" class=" control-label">Worked as</label>
                                <input id="workedas1" type="text" class="form-control" name="workedas1" value="{{ old('workedas1') }}" required autofocus>

                                @if ($errors->has('workedas1'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('workedas1') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-2">
                              <label for="from1" class=" control-label">From</label>
                                <input id="from1" type="date" class="form-control" name="from1" value="{{ old('from1') }}" required autofocus>

                                @if ($errors->has('from1'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('from1') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-2">
                              <label for="to1" class=" control-label">To</label>
                                <input id="to1" type="date" class="form-control" name="to1" value="{{ old('to1') }}" required autofocus>

                                @if ($errors->has('to1'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('to1') }}</strong>
                                    </span>
                                @endif
                            </div>
                             <div class="col-md-4">
                              <label for="institutionname2" class=" control-label">2: Institution Name</label>
                                <input id="institutionname2" type="text" class="form-control" name="institutionname2" value="{{ old('institutionname2') }}" required autofocus>

                                @if ($errors->has('institutionname2'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('institutionname2') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-4">
                              <label for="workedas2" class=" control-label">Worked as</label>
                                <input id="workedas2" type="text" class="form-control" name="workedas2" value="{{ old('workedas2') }}" required autofocus>

                                @if ($errors->has('workedas2'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('workedas2') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-2">
                              <label for="from2" class=" control-label">From</label>
                                <input id="from2" type="date" class="form-control" name="from2" value="{{ old('from2') }}" required autofocus>

                                @if ($errors->has('from2'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('from2') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-2">
                              <label for="to2" class=" control-label">To</label>
                                <input id="to2" type="date" class="form-control" name="to2" value="{{ old('to2') }}" required autofocus>

                                @if ($errors->has('to2'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('to2') }}</strong>
                                    </span>
                                @endif
                            </div>
                             <div class="col-md-4">
                              <label for="institutionname3" class=" control-label">3: Institution Name</label>
                                <input id="institutionname3" type="text" class="form-control" name="institutionname3" value="{{ old('institutionname3') }}" required autofocus>

                                @if ($errors->has('institutionname3'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('institutionname3') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-4">
                              <label for="workedas3" class=" control-label">Worked as</label>
                                <input id="workedas3" type="text" class="form-control" name="workedas3" value="{{ old('workedas3') }}" required autofocus>

                                @if ($errors->has('workedas3'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('workedas3') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-2">
                              <label for="from3" class=" control-label">From</label>
                                <input id="from3" type="date" class="form-control" name="from3" value="{{ old('from3') }}" required autofocus>

                                @if ($errors->has('from3'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('from3') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-2">
                              <label for="to3" class=" control-label">To</label>
                                <input id="to3" type="date" class="form-control" name="to3" value="{{ old('to3') }}" required autofocus>

                                @if ($errors->has('to3'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('to3') }}</strong>
                                    </span>
                                @endif
                            </div>
                    

                       
                           

                            
                   
<br>
                     </div>
                            <div class="col-md-8 ">
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
             <div class="col-md-12 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading" style="color: green;font-family: Poppins">Publications/Conferences and Workshops</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('fname') ? ' has-error' : '' }} required">
                          
<div class="row">  
<label for="years" class=" col-md-4 control-label">Total Full Time Experience: Years</label>
                            <div class="col-md-2 ">
                            
                                <input id="years" type="text" class="form-control" name="fname" value="{{ old('years') }}" required autofocus>

                                @if ($errors->has('years'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('years') }}</strong>
                                    </span>
                                @endif
                            </div>
                                  <label for="months" class=" col-md-2 control-label">Months</label>
                             <div class="col-md-2">
                        
                                <input id="months" type="text" class="form-control" name="months" value="{{ old('months') }}" required autofocus>

                                @if ($errors->has('months'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('months') }}</strong>
                                    </span>
                                @endif
                            </div>

                      </div>
                      
                          

                            <div class="col-md-4">
                              <label for="institutionname1" class=" control-label">1: Institution Name</label>
                                <input id="institutionname1" type="text" class="form-control" name="sname" value="{{ old('institutionname1') }}" required autofocus>

                                @if ($errors->has('institutionname1'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('institutionname1') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-4">
                              <label for="workedas1" class=" control-label">Worked as</label>
                                <input id="workedas1" type="text" class="form-control" name="workedas1" value="{{ old('workedas1') }}" required autofocus>

                                @if ($errors->has('workedas1'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('workedas1') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-2">
                              <label for="from1" class=" control-label">From</label>
                                <input id="from1" type="date" class="form-control" name="from1" value="{{ old('from1') }}" required autofocus>

                                @if ($errors->has('from1'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('from1') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-2">
                              <label for="to1" class=" control-label">To</label>
                                <input id="to1" type="date" class="form-control" name="to1" value="{{ old('to1') }}" required autofocus>

                                @if ($errors->has('to1'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('to1') }}</strong>
                                    </span>
                                @endif
                            </div>
                             <div class="col-md-4">
                              <label for="institutionname2" class=" control-label">2: Institution Name</label>
                                <input id="institutionname2" type="text" class="form-control" name="institutionname2" value="{{ old('institutionname2') }}" required autofocus>

                                @if ($errors->has('institutionname2'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('institutionname2') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-4">
                              <label for="workedas2" class=" control-label">Worked as</label>
                                <input id="workedas2" type="text" class="form-control" name="workedas2" value="{{ old('workedas2') }}" required autofocus>

                                @if ($errors->has('workedas2'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('workedas2') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-2">
                              <label for="from2" class=" control-label">From</label>
                                <input id="from2" type="date" class="form-control" name="from2" value="{{ old('from2') }}" required autofocus>

                                @if ($errors->has('from2'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('from2') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-2">
                              <label for="to2" class=" control-label">To</label>
                                <input id="to2" type="date" class="form-control" name="to2" value="{{ old('to2') }}" required autofocus>

                                @if ($errors->has('to2'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('to2') }}</strong>
                                    </span>
                                @endif
                            </div>
                             <div class="col-md-4">
                              <label for="institutionname3" class=" control-label">3: Institution Name</label>
                                <input id="institutionname3" type="text" class="form-control" name="institutionname3" value="{{ old('institutionname3') }}" required autofocus>

                                @if ($errors->has('institutionname3'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('institutionname3') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-4">
                              <label for="workedas3" class=" control-label">Worked as</label>
                                <input id="workedas3" type="text" class="form-control" name="workedas3" value="{{ old('workedas3') }}" required autofocus>

                                @if ($errors->has('workedas3'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('workedas3') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-2">
                              <label for="from3" class=" control-label">From</label>
                                <input id="from3" type="date" class="form-control" name="from3" value="{{ old('from3') }}" required autofocus>

                                @if ($errors->has('from3'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('from3') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-2">
                              <label for="to3" class=" control-label">To</label>
                                <input id="to3" type="date" class="form-control" name="to3" value="{{ old('to3') }}" required autofocus>

                                @if ($errors->has('to3'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('to3') }}</strong>
                                    </span>
                                @endif
                            </div>
                    

                       
                           

                            
                   
<br>
                     </div>
                            <div class="col-md-8 ">
                                <button type="submit" class="btn btn-primary">
                                    Save
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
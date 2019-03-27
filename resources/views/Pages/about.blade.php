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
                <div class="panel-heading" style="color: green;font-family: Poppins">Qualifications</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('fname') ? ' has-error' : '' }} required">
                          

                            <div class="col-md-4">
                              <label for="secondary" class="control-label">Secondary Education</label>
                                <input id="secondary" type="text" class="form-control" name="secondary" value="{{ old('secondary') }}" required autofocus>

                                @if ($errors->has('secondary'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('secondary') }}</strong>
                                    </span>
                                @endif
                            </div>
                             <div class="col-md-3">
                              <label for="syear" class="control-label">Year</label>
                                <input id="syear" type="date" class="form-control" name="syear" value="{{ old('fname') }}" required autofocus>

                                @if ($errors->has('syear'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('syear') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                      
                      
                          

                            <div class="col-md-3">
                              <label for="s_copy" class=" control-label">Attach Copy</label>
                                <input id="s_copy" type="file" class="form-control" name="s_copy" value="{{ old('s_copy') }}" required autofocus>

                                @if ($errors->has('s_copy'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('s_copy') }}</strong>
                                    </span>
                                @endif
                            </div>
                             <div class="col-md-4">
                              <label for="undergraduate" class="control-label">Undergraduate</label>
                                <input id="undergraduate" type="text" class="form-control" name="undergraduate" value="{{ old('undergraduate') }}" required autofocus>

                                @if ($errors->has('undergraduate'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('undergraduate') }}</strong>
                                    </span>
                                @endif
                            </div>
                             <div class="col-md-3">
                              <label for="uyear" class="control-label">Year</label>
                                <input id="syear" type="date" class="form-control" name="uyear" value="{{ old('uyear') }}" required autofocus>

                                @if ($errors->has('uyear'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('uyear') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                      
                      
                          

                            <div class="col-md-3">
                              <label for="u_copy" class=" control-label">Attach Copy</label>
                                <input id="u_copy" type="file" class="form-control" name="u_copy" value="{{ old('u_copy') }}" required autofocus>

                                @if ($errors->has('u_copy'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('u_copy') }}</strong>
                                    </span>
                                @endif
                            </div>
                             <div class="col-md-4">
                              <label for="post_graduate" class="control-label">Post Graduate</label>
                                <input id="post_graduate" type="text" class="form-control" name="post_graduate" value="{{ old('post_graduate') }}" required autofocus>

                                @if ($errors->has('post_graduate'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('post_graduate') }}</strong>
                                    </span>
                                @endif
                            </div>
                             <div class="col-md-3">
                              <label for="pyear" class="control-label">Year</label>
                                <input id="pyear" type="date" class="form-control" name="pyear" value="{{ old('pyear') }}" required autofocus>

                                @if ($errors->has('pyear'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pyear') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                      
                      
                          

                            <div class="col-md-3">
                              <label for="p_copy" class=" control-label">Attach Copy</label>
                                <input id="p_copy" type="file" class="form-control" name="p_copy" value="{{ old('s_copy') }}" required autofocus>

                                @if ($errors->has('p_copy'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('p_copy') }}</strong>
                                    </span>
                                @endif
                            </div>
                             <div class="col-md-4">
                              <label for="phd" class="control-label">Phd</label>
                                <input id="phd" type="text" class="form-control" name="phd" value="{{ old('phd') }}" required autofocus>

                                @if ($errors->has('phd'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phd') }}</strong>
                                    </span>
                                @endif
                            </div>
                             <div class="col-md-3">
                              <label for="phdyear" class="control-label">Year</label>
                                <input id="phdyear" type="date" class="form-control" name="phdyear" value="{{ old('phdyear') }}" required autofocus>

                                @if ($errors->has('phdyear'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phdyear') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                      
                      
                          

                            <div class="col-md-3">
                              <label for="phd_copy" class=" control-label">Attach Copy</label>
                                <input id="phd_copy" type="file" class="form-control" name="phd_copy" value="{{ old('phd_copy') }}" required autofocus>

                                @if ($errors->has('phd_copy'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phd_copy') }}</strong>
                                    </span>
                                @endif
                            </div>
                             <div class="col-md-4">
                              <label for="other" class="control-label">Other</label>
                                <input id="other" type="text" class="form-control" name="other" value="{{ old('other') }}" required autofocus>

                                @if ($errors->has('other'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('other') }}</strong>
                                    </span>
                                @endif
                            </div>
                             <div class="col-md-3">
                              <label for="otheryear" class="control-label">Year</label>
                                <input id="otheryear" type="date" class="form-control" name="otheryear" value="{{ old('otheryear') }}" required autofocus>

                                @if ($errors->has('otheryear'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('otheryear') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                      
                      
                          

                            <div class="col-md-3">
                              <label for="other_copy" class=" control-label">Attach Copy</label>
                                <input id="other_copy" type="file" class="form-control" name="other_copy" value="{{ old('other_copy') }}" required autofocus>

                                @if ($errors->has('other_copy'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('other_copy') }}</strong>
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
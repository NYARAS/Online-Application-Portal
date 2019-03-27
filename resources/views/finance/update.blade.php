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
                <div class="panel-heading" style="color: green;font-family: Poppins">Payment Information</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{url('/updatepayment',array($personals->applicant_id)) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('fname') ? ' has-error' : '' }} required">





                                                     <div class="col-md-3">
                               <label for="status" class=" control-label">Status</label>
                                <select style="font-weight: bold;" id="paid" type="text" class="form-control"  name="paid" value="{{$personals->paid}}" required>
                                 <option  value="">Select......</option>

                                <option style="font-weight: bold;">verified</option>
                                <option style="font-weight: bold;">not verified</option>



                                </select>

                                @if ($errors->has('paid'))
                                    <span class="help-block">
                                        <strong style="color: red">{{ $errors->first('paid') }}</strong>
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

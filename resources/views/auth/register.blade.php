@extends('layouts.header')
@section('content')
<style type="text/css">
@import url('https://fonts.googleapis.com/css?family=Spicy+Rice');
@import url('https://fonts.googleapis.com/css?family=Roboto');

body{
  background: white;
  font-family: 'Roboto', sans-serif;
}
    .avatar{
     display: block;
      border-radius: 100px;
     margin-left: auto;
     margin-right: auto;
     width: 40%;

    }
    .form-group.required .control-label:after {
        color: #ff0000;
        content: "*";

    }
    .control-label{
        color: green;
        font-weight: bold;
    }
</style>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-secondary">
                <div class="panel-heading" style="font-style: Poppins; color: Black">Register</div>

                <div class="panel-body">
                <div class="avatar"><img   src="{{url('public/images/mmu2.jpg')}}" class="avatar" alt=""></div>
                <br>
                <br>

                    <form class="form-validate " method="POST" id="register_form" action="{{ route('register') }}">
                        {{ csrf_field() }}
                        <div class="row">




                              <div class="input-field required ">

                                <div class="col-md-4">
                                      <i class="material-icons prefix">account_circle</i>
                                  <input class=" form-control" id="first_name" name="first_name" type="text" placeholder="Your First Name" />
                                          <label style="color: green;font-weight:bold" for="first_name" class="control-label col-md-4"> <span class="required"></span></label>
                                </div>
                              </div>


                              <div class="input-field required ">

                                <div class="col-md-4">
                                      <i class="material-icons prefix">account_circle</i>
                                  <input class=" form-control" id="second_name" name="second_name" type="text" placeholder="Your Second Name" />
                                          <label style="color: green;font-weight:bold" for="second_name" class="control-label col-md-4"> <span class="required"></span></label>
                                </div>
                              </div>

                              <div class="input-field required ">

                                <div class="col-md-4">
                                      <i class="material-icons prefix">account_circle</i>
                                  <input class=" form-control" id="last_name" name="last_name" type="text" placeholder="Your Last Name" />
                                          <label style="color: green;font-weight:bold" for="last_name" class="control-label col-md-4"> <span class="required"></span></label>
                                </div>
                              </div>





                              <div class="input-field required ">

                                <div class="col-md-6">
                                      <i class="material-icons prefix">mode_edit</i>
                                  <input class=" form-control" id="email" name="email" type="text" placeholder="Your email Address" />
                                          <label style="color: green;font-weight:bold" for="email" class="control-label col-md-4"> <span class="required"></span></label>

                                </div>
                              </div>






                              <div class="input-field ">
                                <div class="col-md-3">
                                    <i class="material-icons prefix">mode_edit</i>
                               <select id="gender" type="text"  name="gender">
                                 <option value="" disabled selected>Select your Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>


                               </select>
                            <label></label>
                            </div>
                           </div>
                               </div>

                           <div class="row">




                           <div class="input-field required ">

                             <div class="col-md-6">
                                   <i class="material-icons prefix">mode_edit</i>
                               <input class=" form-control" id="password" name="password" type="password" placeholder="Your Password" />
                                       <label style="color: green;font-weight:bold" for="email" class="control-label col-md-4"> <span class="required"></span></label>
                                       @if ($errors->has('password'))
                                           <span class="help-block">
                                               <strong>{{ $errors->first('password') }}</strong>
                                           </span>
                                       @endif
                             </div>
                           </div>


                           <div class="input-field required ">

                             <div class="col-md-4">
                                   <i class="material-icons prefix">mode_edit</i>
                               <input class=" form-control" id="" name="password_confirmation" type="password" placeholder="Password Confirmation" />
                                       <label style="color: green;font-weight:bold" for="password_confirmation" class="control-label col-md-4"> <span class="required"></span></label>
                                       @if ($errors->has('password'))
                                           <span class="help-block">
                                               <strong>{{ $errors->first('password') }}</strong>
                                           </span>
                                       @endif
                             </div>
                           </div>
                              </div>




























                              <div class="input-field required ">

                                <div class="col-md-4">
                      <label >
                        <input type="checkbox" name="agree" id="agree"    value="">
                        <span>Terms and Policy</span>
                      </label>

                  </div>
                     </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-success">
                                    Register
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
@section('script')
@include('script.register-form')

<script type="text/javascript">
var elems = document.querySelector('select');
  M.FormSelect.init(elems, {});

</script>

@endsection

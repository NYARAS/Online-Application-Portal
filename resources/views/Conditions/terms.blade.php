@extends('layouts.header')
<style type="text/css">

@import url('https://fonts.googleapis.com/css?family=Spicy+Rice');
@import url('https://fonts.googleapis.com/css?family=Roboto');
@import url('https://fonts.googleapis.com/css?family=Lato:700');
@import url('https://fonts.googleapis.com/css?family=Poppins');
@import url('https://fonts.googleapis.com/css?family=Anton');
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
    p{
        color: black;
        font-family: Poppins;
        font-style: italic;
        font-weight: bold;
    }
    .input-field .control-label{
         color: black;
        font-weight: bold;
        font-family: 'Poppins', sans-serif;
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
            <div class="panel panel-secondary">
              @if(count($terms)>0)


                             @foreach($terms as $term)

                             <p>{{($term -> first_name)}}</p>


                             @endforeach



                               {{----------------------------------End Edit---------------------------}}



                               @else
                <div class="panel-heading">Terms and Conditions</div>
                <div class="panel-body">
                <div class="avatar"><img   src="{{url('public/images/mmu2.jpg')}}" class="avatar" alt=""></div>
                <p>All Information and documents attached with application are for safe and secure and for the further process of short listing. Apllication fees is for making ten copies of your documents and it is non refundable.If you fullfil the applied job critariaare the we shall get back to you soon.</p>
                <br>
                <br>
                    <form  method="POST" action="{{route('storeTerms') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="col s12 input-field">
                          <i class="material-icons prefix"></i>
                          <input  value="" name="transaction_code" id="transaction_code" type="text" class="validate">
                          <label for="transaction_code" class="active  control-label " >Transaction Code</label>

                        </div>

                                @if ($errors->has('transaction_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('transaction_code') }}</strong>
                                    </span>
                                @endif




                        <div class="col s12 file-field input-field">

                        <div class="btn">
                          <span>Transaction Copy</span>
                          <input type="file" name="transaction_copy"  value="" required autofocus>

                        </div>
                        <div class="file-path-wrapper">
                          <input type="text" name="transaction_copy" value="" class="file-path validate" placeholder="upload a scanned copy of the transaction">
                          @if ($errors->has('transaction_copy'))
                              <span class="help-block">
                                  <strong style="color:red">{{ $errors->first('transaction_copy') }}</strong>
                              </span>
                          @endif
                        </div>

                        </div>



                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-6">
                                <button type="submit" class="btn btn-success">
                             Submit
                                </button>


                            </div>
                        </div>
                    </form>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection



@section('script')

<script type="text/javascript">
    $('#undergraduate_year').datepicker({
      changeMonth:true,
      changeYear:true,
      dateFormat: 'yy-mm-dd'

  });
  //===============================================
</script>



@endsection

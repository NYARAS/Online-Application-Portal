@extends('layouts.header')
@section('content')
@include('Application.popup.form-qualification')
@include('Application.popup.form-experience')

<style type="text/css">

@import url('https://fonts.googleapis.com/css?family=Spicy+Rice');
@import url('https://fonts.googleapis.com/css?family=Roboto');
@import url('https://fonts.googleapis.com/css?family=Lato:700');
@import url('https://fonts.googleapis.com/css?family=Poppins');
@import url('https://fonts.googleapis.com/css?family=Anton');
       .form-group.required .control-label:after {
    color: #ff0000;
    content: "*";

}
.form-group .control-label{
    color: green;
    font-weight: bold;
}
.input-group.required .control-label:after {
color: #ff0000;
content: "*";

}
.input-group .control-label{
color: green;
font-weight: bold;
}
p{
    font-weight: bold;
}
small{
  color: blue;
  font-family: 'Roboto', sans-serif;
}

</style>





{{---------------------------}}
<div class="container">
    <div class="row">
<p>Part 2 of 3</p>
<div class="panel panel-default">
<div class="panel-heading">
<b><i class="fa fa-apple"></i>Qualifications and Publication </b>
<small>(Please give your qualification. Scanned  documents of your educational background as outlined in your CV)</small>




</div>

<div class="panel panel-body" style="padding-bottom: 10px; margin-top: 0;">
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
  @if(count($qualifications)>0)


                 @foreach($qualifications as $q)


                 @endforeach
                 @else


  <form action="#" enctype="multipart/form-data" method="POST" id="frm-create-student">
    <a href="#" onclick="addForm()"  style="margin-top: -8px"></a>

    {!!csrf_field()!!}
    <div class="row">
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
      <input type="hidden" name="academic_level" value="Secondary">
    <div class="col-lg-12">

    {{--------Education Qualification Files------------}}


    <div class="col s12 file-field input-field">

    <div class="btn">
      <span>Qualification Files</span>
      <input type="file" name="curriculum_vitae"  value="" required autofocus multiple>

    </div>
    <div class="file-path-wrapper">
      <input type="text" class="file-path validate" name="curriculum_vitae" placeholder="upload all the files" required autofocus>

    </div>

    </div>



</div>
</div>

</div>
<div class="panel panel-default">
<div class="panel-heading">
<b><i class="fa fa-apple"></i>Publications and Conference </b>



</div>

<div class="panel panel-body" style="padding-bottom: 10px; margin-top: 0;">
  <form action="#" enctype="multipart/form-data" method="POST" id="frm-create-student">
    {!!csrf_field()!!}
    <div class="row">
      <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">


    {{--------Number of Journals------------}}


    <div class="col s4 input-field">
      <i class="material-icons prefix"></i>
      <input  value="" name="number_of_journals" id="number_of_journals" type="number" min="1" class="validate">
      <label for="number_of_journals" class="active  control-label " >Number of Journals Published</label>

    </div>

    	{{--------List Of Journals------------}}


      <div class="col s6 file-field input-field">

      <div class="btn">
        <span>Attach List</span>
        <input type="file" name="list_of_journals"  value="" >

      </div>
      <div class="file-path-wrapper">
        <input type="text" class="file-path validate" name="curriculum_vitae" placeholder="upload one or more files">

      </div>

      </div>

</div>
      {{--------Number of Books ------------}}

    <div class="col s4 input-field">
      <i class="material-icons prefix"></i>
      <input  value="" name="number_of_books" id="number_of_books" type="number" min="1" class="validate">
      <label for="number_of_books" class="active  control-label " >Number of Books Published</label>

    </div>


    			{{--------List of Books ------------}}

        <div class="col s6 file-field input-field">

        <div class="btn">
          <span>Attach List</span>
          <input type="file" name="list_of_books"  value="" >

        </div>
        <div class="file-path-wrapper">
          <input type="text" class="file-path validate" name="list_of_books" placeholder="upload one or more files">

        </div>
     <p class="err">--</p>
        </div>

</div>
</div>

<div class="panel panel-default">
<div class="panel-heading">
<b><i class="fa fa-apple"></i>Referees</b>
<small>(Please  give at least 3 referee recommendation letters as outlined in your CV)</small>



</div>

<div class="panel panel-body" style="padding-bottom: 10px; margin-top: 0;">
  <form action="#" enctype="multipart/form-data" method="POST" id="frm-create-student">
    {!!csrf_field()!!}
    <div class="row">
      <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">


    {{--------Number of Referee------------}}
    <div class="col s4 input-field">
      <i class="material-icons prefix"></i>
      <input  value="" name="first_referee" id="number_of_journals" type="text"  class="validate" required autofocus>
      <label for="number_of_journals" class="active  control-label " >First Referee Name</label>

    </div>
    <div class="col s4 input-field">
      <i class="material-icons prefix"></i>
      <input  value="" name="second_referee" id="number_of_journals" type="text"  class="validate" required autofocus>
      <label for="number_of_journals" class="active  control-label " >Second Referee Name</label>

    </div>
    <div class="col s4 input-field">
      <i class="material-icons prefix"></i>
      <input  value="" name="third_referee" id="number_of_journals" type="text"  class="validate" required autofocus>
      <label for="number_of_journals" class="active  control-label " >Third Referee Name</label>

    </div>




    	{{--------Their Recommendation Letter if any------------}}


      <div class="col s12 file-field input-field">

      <div class="btn">
        <span>Attach Recommendation</span>
        <input type="file" name="recommendation_letter"  value="" required autofocus multiple>

      </div>
      <div class="file-path-wrapper">
        <input type="text" class="file-path validate" name="recommendation_letter" placeholder="upload one or more files">

      </div>

      </div>

</div>


</div>
</div>

@endif



<button value="button" class="btn btn-success btn-save">Submit<i class="fa fa-save"></i></button>


<a href="{{url('/personal')}}" class="btn btn-primary pull-right">Back</a>
  <a href="{{url('/publication')}}"  class="btn btn-success pull-right">Next</a>








</div>
</div>






@endsection

@section('script')
@include('script.form-validation')
@include('script.form-qualification')
<script type="text/javascript">

var elems = document.querySelector('select');
  M.FormSelect.init(elems, {});

  var elems = document.querySelector('.datepicker');
M.Datepicker.init(elems, {

  showClearBtn:true,
  format:'dd/mm/yyyy',
  i18n:{
    clear:'remove',
    done:'Yes'
  }
});
</script>

@endsection

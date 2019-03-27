@extends('layouts.header')
@section('content')



<style type="text/css">
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

</style>





{{---------------------------}}

<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-offset-1">

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
{{-----------------------------}}


{{------------------------------}}

<div class="panel panel-default">
<div class="panel-heading">
<b><i class="fa fa-apple"></i>Publications, Conferences and Workshops. </b>(Upload new files if your updating your information)

</div>

<div class="panel panel-body" style="padding-bottom: 10px; margin-top: 0;">
<form  method="POST"  action="{{url('/editpublication',array($publications->applicant_id)) }}" enctype="multipart/form-data" id="frm-create-student">
{!!csrf_field()!!}


<div class="row">
<div class="col-lg-12">

{{--------Number of Journals Published------------}}

<div class="row">


	<div class="col-md-4">
	<div class="form-group ">
	<label for="secondary" class="control-label">
	Number of Journals Published
	</label>
	<input type="text" name="number_of_journals" id="number_of_journals" class="form-control"   value="{{ ($publications->number_of_journals) }}"></input>

	</div>
		</div>

	{{--------Number of Journals Copy------------}}


  	<div class="col-md-4">
  	<div class="form-group ">
  	<label for="list_of_journals" class="control-label">
  		Attach a List
  	</label>
  	<input type="file" name="list_of_journals" id="list_of_journals" class="form-control"  value="{{ ($publications->list_of_journals) }}"></input>
  		</div>
  		</div>

  </div>



			{{--------Number Of Books Published ------------}}

<div class="row">


	<div class="col-md-4">
	<div class="form-group ">
	<label for="number_of_books" class="control-label">
		Number Of Books Published
	</label>
	<input type="text" name="number_of_books" id="number_of_books" class="form-control" value="{{ ($publications->number_of_books) }}"></input>
		</div>
		</div>

		{{--------Copy of Books------------}}


			<div class="col-md-4">
			<div class="form-group " required>
			<label for="undergraduate" class="control-label">
			Attach a List
			</label>
			<input type="file" name="list_of_books" id="list_of_books" class="form-control" value="{{ ($publications->list_of_books) }}"  ></input>

			</div>
				</div>
</div>


{{----------------------------------------------}}

</div>


{{---------------------------}}






</div>

</div>


<br>

{{-----address----------------}}

<div class="panel-heading" style="margin-top: -20px">
<b><i class="fa fa-apple"></i>Referees</b>

</div>
<div class="panel-body" style="padding-bottom: 10px; margin-top: 0;">
<div class="row">


<div class="col-md-6">
<div class="form-group ">
<label for="country" class="control-label">1. Full Name of First Referee</label>
<input type="text" name="referee_one" id="referee_one" class="form-control" value="{{ ($publications->referee_one) }}" required autofocus></input>

</div>

</div>
{{----------Recommendation Letter------------}}
<div class="col-md-3">
<div class="form-group ">
<label for="province" class="control-label">Attach Recommendation Letter</label>
<input type="file" name="referee_one_recommendation" id="referee_one_recommendation" class="form-control"  value="{{ ($publications->referee_one_recommendation) }}"></input>

</div>

</div>


{{----------Name of Referee Two------------}}
<div class="col-md-6">
<div class="form-group " >
<label for="district" class="control-label">2:Full Name of Second Referee</label>
<input type="text" name="referee_two" id="referee_two" class="form-control" value="{{ ($publications->referee_two) }}" required autofocus></input>

</div>

</div>

{{----------Recommendation Letter Two------------}}
<div class="col-md-3">
<div class="form-group ">
<label for="current_address" class="control-label">Attach Recommendation Letter</label>
<input type="file" name="referee_two_recommendation" id="referee_two_recommendation" class="form-control"  value="{{ ($publications->referee_two_recommendation) }}"></input>

</div>

</div>



{{----------Name of Referee Three------------}}
<div class="col-md-6">
<div class="form-group ">
<label for="referee_three" class="control-label">2:Full Name of Third Referee</label>
<input type="text" name="referee_three" id="referee_three"  value="{{ ($publications->referee_three) }}" class="form-control"></input>

</div>

</div>

{{----------Recommendation Letter Three-----------}}
<div class="col-md-3">
<div class="form-group ">
<label for="referee_three_recommendation" class="control-label">Attach Recommendation Letter</label>
<input type="file" name="referee_three_recommendation" id="referee_three_recommendation" value="{{ ($publications->referee_three_recommendation) }}"  class="form-control" ></input>

</div>

</div>

	{{----------address-----------}}
</div>

</div>


<div class="panel-footer">
<button value="button" class="btn btn-success btn-save"> Update<i class="fa fa-save"></i></button>
<a   class="btn btn-success btn-xs pull-right">
    <span class="btn btn-success btn-save">Next</span>
</a>
</div>


</form>

</div>
</div>

</div>
</div>
@endsection

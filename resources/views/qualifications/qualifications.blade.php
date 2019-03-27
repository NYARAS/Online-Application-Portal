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


{{------------------------------}}

<div class="panel panel-default">
<div class="panel-heading">
<b><i class="fa fa-apple"></i>Qualifications </b>

</div>

@if(count($qualifications)>0)


               @foreach($qualifications as $qualification)
<div class="panel panel-body" style="padding-bottom: 10px; margin-top: 0;">



<form action="#" enctype="multipart/form-data" method="POST" id="frm-create-student">
{!!csrf_field()!!}



<div class="row">
<div class="col-lg-12">

{{--------Secondary Education------------}}


	<div class="col-md-4">
	<div class="form-group required">
	<label for="secondary" class="control-label">
		Secondary School
	</label>
	<input type="text" name="secondary" id="secondary" class="form-control" value="{{ ($qualification->secondary) }}"  required autofocus></input>

	</div>
		</div>

	{{--------Secondary Year------------}}


	<div class="col-md-4">
	<label for="secondary_year" style="color:green;font-weight:bold" class="control-label">
	Year
	</label>
	<div class="input-group required">
	<input class="form-control" name="secondary_year" id="secondary_year" value="{{ ($qualification->secondary_year) }}" required autofocus>

	  <div class="input-group-addon">
	    <span class="fa fa-calendar"></span>
	  </div>
	</div>

	</div>



			{{--------Copy of Secondary ------------}}


	<div class="col-md-4">
	<div class="form-group required">
	<label for="copy_of_secondary" class="control-label">
		Attach a Copy
	</label>
	<input type="file" name="copy_of_secondary" id="copy_of_secondary" class="form-control"  ></input>
		</div>
		</div>

		{{--------Undergraduate Education------------}}


			<div class="col-md-4">
			<div class="form-group required" required>
			<label for="undergraduate" class="control-label">
				Undergraduate Education
			</label>
			<input type="text" name="undergraduate" id="undergraduate" class="form-control"  value="{{ ($qualification->undergraduate) }}"></input>

			</div>
				</div>



	{{--------Year Of Undergraduate------------}}



<div class="col-md-4">
<label for="undergraduate_year" class="control-label" style="color:green;font-weight:bold">
Year
</label>
<div class="input-group required">
<input class="form-control" name="undergraduate_year" id="undergraduate_year"  value="{{ ($qualification->undergraduate_year) }}">

  <div class="input-group-addon">
    <span class="fa fa-calendar"></span>
  </div>
</div>

</div>
{{--------Copy of Undergraduate ------------}}


<div class="col-md-4">
<div class="form-group required">
<label for="copy_of_undergraduate" class="control-label">
Attach a Copy
</label>
<input type="file" name="copy_of_undergraduate" id="copy_of_undergraduate" class="form-control"  value="{{ ($qualification->copy_of_undergraduate) }}" ></input>
</div>
</div>

{{-----------Post Graduate--------------}}

<div class="col-md-4">
<div class="form-group required">
<label for="Post Graduate" class="control-label">
Post Graduate Education
</label>
<input type="text" name="post_graduate" id="post_graduate" class="form-control"  value="{{ ($qualification->post_graduate) }}"></input>

</div>

</div>

{{-----------Year--------------}}
<div class="col-md-4">
<label for="post_graduate_year" style="color:green;font-weight:bold" class="control-label">
Year
</label>
<div class="input-group required">
<input class="form-control" name="post_graduate_year" id="post_graduate_year"  value="{{ ($qualification->post_graduate_year) }}">

  <div class="input-group-addon">
    <span class="fa fa-calendar"></span>
  </div>
</div>

</div>


{{-----------Post Graduate Copy--------------}}

<div class="col-md-4">
<div class="form-group ">
<label for="post_graduate_copy" class="control-label">
Attach a copy
</label>
<input type="file" name="post_graduate_copy" id="post_graduate_copy" class="form-control" value="{{ ($qualification->post_graduate_copy) }}"></input>

</div>

</div>

{{-----------Phd Education--------------}}

<div class="col-md-4">
<div class="form-group">
<label for="Phd" class="control-label">
Phd
</label>
<input type="text" name="phd" id="phd" class="form-control" ></input>

</div>

</div>

{{-----------Year--------------}}
<div class="col-md-4">
<label for="phd_year" style="color:green;font-weight:bold" class="control-label">
Year
</label>
<div class="input-group">
<input class="form-control" name="phd_year" id="phd_year" required autofocus>

  <div class="input-group-addon">
    <span class="fa fa-calendar"></span>
  </div>
</div>

</div>


{{-----------Phd copy--------------}}

<div class="col-md-4">
<div class="form-group ">
<label for="copy_of_phd" class="control-label">
Attach a copy
</label>
<input type="file" name="copy_of_phd" id="copy_of_phd" class="form-control" required autofocus></input>

</div>

</div>
{{-----------Other Education--------------}}

<div class="col-md-4">
<div class="form-group">
<label for="Phd" class="control-label">
Other Qualifications
</label>
<input type="text" name="other_qualification" id="other_qualification" class="form-control" ></input>

</div>

</div>

{{-----------Year--------------}}
<div class="col-md-4">
<label for="phd_year" style="color:green;font-weight:bold" class="control-label">
Year
</label>
<div class="input-group">
<input class="form-control" name="year" id="year" required autofocus>

  <div class="input-group-addon">
    <span class="fa fa-calendar"></span>
  </div>
</div>

</div>


{{-----------Other Qualifications copy--------------}}

<div class="col-md-4">
<div class="form-group ">
<label for="copy_of_phd" class="control-label">
Attach a copy
</label>
<input type="file" name="other_qualification_copy" id="copy_of_phd" class="form-control" required autofocus></input>

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
<b><i class="fa fa-apple"></i>Experience</b>

</div>
<div class="panel-body" style="padding-bottom: 10px; margin-top: 0;">
<div class="row"><div class="row">
  <div>
<label for="years" class=" col-md-4 control-label">Total Full Time Experience:</label>
</div>
{{----------Years------------}}
<div class="col-md-3">
<div class="form-group">
<label for="years" class="control-label">Years</label>
<input type="text" name="years" id="years" class="form-control"></input>

</div>

</div>

{{----------Months------------}}
<div class="col-md-3">
<div class="form-group required">
<label for="months" class="control-label">Months</label>
<input type="text" name="months" id="months" class="form-control" required autofocus></input>

</div>

</div>

                      </div>

{{----------First Institution------------}}
<div class="col-md-3">
<div class="form-group">
<label for="first_institution" class="control-label">1. Institution Name</label>
<input type="text" name="first_institution" id="first_institution" value="{{ ($qualification->first_institution) }}" class="form-control"></input>

</div>

</div>

{{----------Worked As------------}}
<div class="col-md-3">
<div class="form-group required">
<label for="workedas1" class="control-label">Worked As</label>
<input type="text" name="workedas1" id="workedas1" class="form-control" value="{{ ($qualification->workedas1) }}" required autofocus></input>

</div>

</div>
{{----------From------------}}
<div class="col-md-3">
<label for="from1" class="control-label" value="{{ ($qualification->from1) }}" style="color:green;font-weight:bold">
From
</label>
<div class="input-group required">
<input class="form-control" name="from1" id="from1" required autofocus>

  <div class="input-group-addon">
    <span class="fa fa-calendar"></span>
  </div>
</div>

</div>
{{----------To------------}}
<div class="col-md-3">
<div class="form-group required">
<label for="to1" class="control-label">To</label>
<input type="text" name="to1" id="to1" class="form-control" value="{{ ($qualification->to1) }}" required autofocus></input>

</div>

</div>

{{----------Second Institution------------}}
<div class="col-md-3">
<div class="form-group required">
<label for="institutionname2" class="control-label">2.Institution Name</label>
<input type="text" name="second_institution" id="second_institution" class="form-control" required autofocus></input>

</div>

</div>
{{----------Worked As------------}}
<div class="col-md-3">
<div class="form-group required">
<label for="workedas2" class="control-label">Worked As</label>
<input type="text" name="workedas2" id="workedas2" class="form-control" required autofocus></input>

</div>

</div>

{{----------From------------}}
<div class="col-md-3">
<label for="from2" class="control-label" style="color:green;font-weight:bold">
From
</label>
<div class="input-group required">
<input class="form-control" name="from2" id="from2" required autofocus>

  <div class="input-group-addon">
    <span class="fa fa-calendar"></span>
  </div>
</div>

</div>

{{----------To------------}}
<div class="col-md-3">
<div class="form-group required">
<label for="to2" class="control-label">To</label>
<input type="text" name="to2" id="to2" class="form-control" placeholder="dd/mm/yyyy" required autofocus></input>

</div>

</div>

{{----------Institution Three------------}}
<div class="col-md-3">
<div class="form-group required">
<label for="institutionname3" class="control-label">3. Institution Name</label>
<input type="text" name="third_institution" id="third_institution" class="form-control" required autofocus></input>

</div>

</div>

{{----------Worked As------------}}
<div class="col-md-3">
<div class="form-group required">
<label for="workedas3" class="control-label">Worked As</label>
<input type="text" name="workedas3" id="workedas3" class="form-control" required autofocus></input>

</div>

</div>

{{----------From------------}}
<div class="col-md-3">
<label for="from3" class="control-label" style="color:green;font-weight:bold">
From
</label>
<div class="input-group required">
<input class="form-control" name="from3" id="from3" required autofocus>

  <div class="input-group-addon">
    <span class="fa fa-calendar"></span>
  </div>
</div>

</div>

{{----------To------------}}
<div class="col-md-3">
<label for="to3" class="control-label" style="color:green;font-weight:bold">
To
</label>
<div class="input-group required">
<input class="form-control" name="to3" id="to3" required autofocus>

  <div class="input-group-addon">
    <span class="fa fa-calendar"></span>
  </div>
</div>

</div>

	{{----------address-----------}}
</div>

</div>


<div class="panel-footer">
  <a href='{{url("/editqualifications/{$qualification->qualification_id}")}}' class="btn btn-success btn-xs">
      <span class="fa fa-pencil-square-o">Edit</span>
  </a>

</div>


</form>


</div>


</div>
</div>

@endforeach

{{------------------------------------End Of Edit-----------------------------------------------}}

@else

<div class="container">
    <div class="row">




{{------------------------------}}


<div class="panel panel-body" style="padding-bottom: 10px; margin-top: 0;">



<form action="{{route('storeQualifications')}}" enctype="multipart/form-data" method="POST" id="frm-create-student">
{!!csrf_field()!!}

<div class="row">
<div class="col-lg-12">

{{--------Secondary Education------------}}


	<div class="col-md-4">
	<div class="form-group required">
	<label for="secondary" class="control-label">
		Secondary School
	</label>
	<input type="text" name="secondary" id="secondary" class="form-control"  required autofocus></input>

	</div>
		</div>

	{{--------Secondary Year------------}}


	<div class="col-md-4">
	<label for="secondary_year" style="color:green;font-weight:bold" class="control-label">
	Year
	</label>
	<div class="input-group required">
	<input class="form-control" name="secondary_year" id="secondary_year" required autofocus>

	  <div class="input-group-addon">
	    <span class="fa fa-calendar"></span>
	  </div>
	</div>

	</div>



			{{--------Copy of Secondary ------------}}


	<div class="col-md-4">
	<div class="form-group required">
	<label for="copy_of_secondary" class="control-label">
		Attach a Copy
	</label>
	<input type="file" name="copy_of_secondary" id="copy_of_secondary" class="form-control" required autofocus></input>
		</div>
		</div>

		{{--------Undergraduate Education------------}}


			<div class="col-md-4">
			<div class="form-group required" required>
			<label for="undergraduate" class="control-label">
				Undergraduate Education
			</label>
			<input type="text" name="undergraduate" id="undergraduate" class="form-control"  required autofocus></input>

			</div>
				</div>



	{{--------Year Of Undergraduate------------}}



<div class="col-md-4">
<label for="undergraduate_year" class="control-label" style="color:green;font-weight:bold">
Year
</label>
<div class="input-group required">
<input class="form-control" name="undergraduate_year" id="undergraduate_year" required autofocus>

  <div class="input-group-addon">
    <span class="fa fa-calendar"></span>
  </div>
</div>

</div>
{{--------Copy of Undergraduate ------------}}


<div class="col-md-4">
<div class="form-group required">
<label for="copy_of_undergraduate" class="control-label">
Attach a Copy
</label>
<input type="file" name="copy_of_undergraduate" id="copy_of_undergraduate" class="form-control" required autofocus ></input>
</div>
</div>

{{-----------Post Graduate--------------}}

<div class="col-md-4">
<div class="form-group required">
<label for="Post Graduate" class="control-label">
Post Graduate Education
</label>
<input type="text" name="post_graduate" id="post_graduate" class="form-control" required autofocus></input>

</div>

</div>

{{-----------Year--------------}}
<div class="col-md-4">
<label for="post_graduate_year" style="color:green;font-weight:bold" class="control-label">
Year
</label>
<div class="input-group required">
<input class="form-control" name="post_graduate_year" id="post_graduate_year" required autofocus>

  <div class="input-group-addon">
    <span class="fa fa-calendar"></span>
  </div>
</div>

</div>


{{-----------Post Graduate Copy--------------}}

<div class="col-md-4">
<div class="form-group ">
<label for="post_graduate_copy" class="control-label">
Attach a copy
</label>
<input type="file" name="post_graduate_copy" id="post_graduate_copy" class="form-control" ></input>

</div>

</div>

{{-----------Phd Education--------------}}

<div class="col-md-4">
<div class="form-group">
<label for="Phd" class="control-label">
Phd
</label>
<input type="text" name="phd" id="phd" class="form-control" ></input>

</div>

</div>

{{-----------Year--------------}}
<div class="col-md-4">
<label for="phd_year" style="color:green;font-weight:bold" class="control-label">
Year
</label>
<div class="input-group">
<input class="form-control" name="phd_year" id="phd_year" required autofocus>

  <div class="input-group-addon">
    <span class="fa fa-calendar"></span>
  </div>
</div>

</div>


{{-----------Phd copy--------------}}

<div class="col-md-4">
<div class="form-group ">
<label for="copy_of_phd" class="control-label">
Attach a copy
</label>
<input type="file" name="copy_of_phd" id="copy_of_phd" class="form-control" required autofocus></input>

</div>

</div>
{{-----------Other Education--------------}}

<div class="col-md-4">
<div class="form-group">
<label for="Phd" class="control-label">
Other Qualifications
</label>
<input type="text" name="other_qualification" id="other_qualification" class="form-control" ></input>

</div>

</div>

{{-----------Year--------------}}
<div class="col-md-4">
<label for="phd_year" style="color:green;font-weight:bold" class="control-label">
Year
</label>
<div class="input-group">
<input class="form-control" name="year" id="year" required autofocus>

  <div class="input-group-addon">
    <span class="fa fa-calendar"></span>
  </div>
</div>

</div>


{{-----------Other Qualifications copy--------------}}

<div class="col-md-4">
<div class="form-group ">
<label for="copy_of_phd" class="control-label">
Attach a copy
</label>
<input type="file" name="other_qualification_copy" id="copy_of_phd" class="form-control" required autofocus></input>

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
<b><i class="fa fa-apple"></i>Experience</b>

</div>
<div class="panel-body" style="padding-bottom: 10px; margin-top: 0;">
<div class="row"><div class="row">
  <div>
<label for="years" class=" col-md-4 control-label">Total Full Time Experience:</label>
</div>
{{----------Years------------}}
<div class="col-md-3">
<div class="form-group">
<label for="years" class="control-label">Years</label>
<input type="text" name="years" id="years" class="form-control"></input>

</div>

</div>

{{----------Months------------}}
<div class="col-md-3">
<div class="form-group required">
<label for="months" class="control-label">Months</label>
<input type="text" name="months" id="months" class="form-control" required autofocus></input>

</div>

</div>

                      </div>

{{----------First Institution------------}}
<div class="col-md-3">
<div class="form-group">
<label for="first_institution" class="control-label">1. Institution Name</label>
<input type="text" name="first_institution" id="first_institution"  class="form-control"></input>

</div>

</div>

{{----------Worked As------------}}
<div class="col-md-3">
<div class="form-group required">
<label for="workedas1" class="control-label">Worked As</label>
<input type="text" name="workedas1" id="workedas1" class="form-control" required autofocus></input>

</div>

</div>
{{----------From------------}}
<div class="col-md-3">
<label for="from1" class="control-label" style="color:green;font-weight:bold">
From
</label>
<div class="input-group required">
<input class="form-control" name="from1" id="from1" required autofocus>

  <div class="input-group-addon">
    <span class="fa fa-calendar"></span>
  </div>
</div>

</div>
{{----------To------------}}
<div class="col-md-3">
<div class="form-group required">
<label for="to1" class="control-label">To</label>
<input type="text" name="to1" id="to1" class="form-control" required autofocus></input>

</div>

</div>

{{----------Second Institution------------}}
<div class="col-md-3">
<div class="form-group required">
<label for="institutionname2" class="control-label">2.Institution Name</label>
<input type="text" name="second_institution" id="second_institution" class="form-control" required autofocus></input>

</div>

</div>
{{----------Worked As------------}}
<div class="col-md-3">
<div class="form-group required">
<label for="workedas2" class="control-label">Worked As</label>
<input type="text" name="workedas2" id="workedas2" class="form-control" required autofocus></input>

</div>

</div>

{{----------From------------}}
<div class="col-md-3">
<label for="from2" class="control-label" style="color:green;font-weight:bold">
From
</label>
<div class="input-group required">
<input class="form-control" name="from2" id="from2" required autofocus>

  <div class="input-group-addon">
    <span class="fa fa-calendar"></span>
  </div>
</div>

</div>

{{----------To------------}}
<div class="col-md-3">
<div class="form-group required">
<label for="to2" class="control-label">To</label>
<input type="text" name="to2" id="to2" class="form-control" placeholder="dd/mm/yyyy" required autofocus></input>

</div>

</div>

{{----------Institution Three------------}}
<div class="col-md-3">
<div class="form-group required">
<label for="institutionname3" class="control-label">3. Institution Name</label>
<input type="text" name="third_institution" id="third_institution" class="form-control" required autofocus></input>

</div>

</div>

{{----------Worked As------------}}
<div class="col-md-3">
<div class="form-group required">
<label for="workedas3" class="control-label">Worked As</label>
<input type="text" name="workedas3" id="workedas3" class="form-control" required autofocus></input>

</div>

</div>

{{----------From------------}}
<div class="col-md-3">
<label for="from3" class="control-label" style="color:green;font-weight:bold">
From
</label>
<div class="input-group required">
<input class="form-control" name="from3" id="from3" required autofocus>

  <div class="input-group-addon">
    <span class="fa fa-calendar"></span>
  </div>
</div>

</div>

{{----------To------------}}
<div class="col-md-3">
<label for="to3" class="control-label" style="color:green;font-weight:bold">
To
</label>
<div class="input-group required">
<input class="form-control" name="to3" id="to3" required autofocus>

  <div class="input-group-addon">
    <span class="fa fa-calendar"></span>
  </div>
</div>

</div>

	{{----------address-----------}}
</div>

</div>


<div class="panel-footer">
  |<button value="submit" class="btn btn-success btn-save"> Next<i class="fa fa-save"></i></button>
  |
    <a href="{{url('/dashboard')}}" class="btn btn-primary">Back</a>  |
  <button type="reset" class="btn btn-danger">
  Reset
  </button>

</div>


</form>


</div>


</div>
</div>


@endif



@endsection

@section('script')


<script type="text/javascript">

     //=============================================

	//=========================================
	$('#secondary_year').datepicker({
		changeMonth:true,
		changeYear:true,
		dateFormat:'yy-mm-dd',
    minDate: new Date(1980,4,9),
    maxDate: new Date(1980,4,9)
	})
	//=========================================
	$('#undergraduate_year').datepicker({
		changeMonth:true,
		changeYear:true,
		dateFormat:'yy-mm-dd',
    minDate: new Date(2000,4,9),
    maxDate: new Date(2001,4,9)
	})

	//=========================================
	$('#post_graduate_year').datepicker({
		changeMonth:true,
		changeYear:true,
		dateFormat:'yy-mm-dd'
	})
	//=========================================
	$('#phd_year').datepicker({
		changeMonth:true,
		changeYear:true,
		dateFormat:'yy-mm-dd'
	})

  //=========================================
  $('#year').datepicker({
    changeMonth:true,
    changeYear:true,
    dateFormat:'yy-mm-dd'
  })

  //=========================================
  $('#from1').datepicker({
    changeMonth:true,
    changeYear:true,
    dateFormat:'yy-mm-dd'
  })
  //=========================================
  $('#to1').datepicker({
    changeMonth:true,
    changeYear:true,
    dateFormat:'yy-mm-dd'
  })

  //=========================================
  $('#from2').datepicker({
    changeMonth:true,
    changeYear:true,
    dateFormat:'yy-mm-dd'
  })
  //=========================================
  $('#to2').datepicker({
    changeMonth:true,
    changeYear:true,
    dateFormat:'yy-mm-dd'
  })
  //=========================================
  $('#from3').datepicker({
    changeMonth:true,
    changeYear:true,
    dateFormat:'yy-mm-dd'
  })
  //=========================================
  $('#to3').datepicker({
    changeMonth:true,
    changeYear:true,
    dateFormat:'yy-mm-dd'
  })










	//-=========================================

</script>
@endsection

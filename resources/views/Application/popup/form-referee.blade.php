<div class="modal fade modal-lg" id="experience-show"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">


<div class="modal-dialog modal-lg">
<div class="modal-content">
  <form action="#" method="POST" enctype="multipart/form-data" id="register_form" data-toggle="validator">
        {!!csrf_field()!!} {{method_field('POST')}}
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title"></h4>

</div>

<div class="modal-body">
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

<input type="hidden" id="id" value="id">
<br>
<div class="container">
  <div class="panel panel-default">
  <div class="panel-heading">
  <b><i class="fa fa-apple"></i>Qualifications </b>

  </div>




  <div class="panel panel-body" style="padding-bottom: 10px; margin-top: 0;">

<div class="row">

<div class=" form-group required col-md-6">
  <label for="nameoftheinstitution" class="control-label">
    Name Of the Institution
  </label>
<input type="text" name="institution_name" id="institution_name" class="form-control" placeholder="Name of the Institution" required></input>
<span class="help-block with-errors"></span>

</div>
<div class=" form-group required col-md-6">
  <label for="levelofeducation" class="control-label">
    Level Of Education
  </label>
<select type="text" name="academic_level" id="academic_level" class="form-control" placeholder="Level of education e.g Certificate" >
<option  value="">Select......</option>
<option value="Secondary">Secondary</option>
<option value="Certificate">Certificate</option>
<option value="Diploma">Diploma</option>
<option value="Undergraduate">Undergraduate</option>
<option value="Master Degree">Master Degree</option>
<option value="PHD">Phd Degree</option>



</select>
<span class="help-block with-errors"></span>


</div>

<br>
</div>

<div class="row">

<br>
<div class=" form-group required col-md-6">
  <label for="yearofcompletion" class="control-label">
    Year of Completion
  </label>
<input type="text" name="year_of_completion" id="year_of_completion" class="form-control" placeholder="dd/mm/yyyy"></input>


</div>

<div class=" form-group required col-md-6">
  <label for="attachfile" class="control-label">
    Attach Certificate
  </label>
<input type="file" name="file_attachment" id="file_attachment" class="form-control" placeholder="please attach file"></input>


</div>

</div>
<br>
</div>
</div>

<div class="panel panel-default">
<div class="panel-heading">
<b><i class="fa fa-apple"></i>Experience </b>

</div>




<div class="panel panel-body" style="padding-bottom: 10px; margin-top: 0;">

<div class="row">

<div class=" form-group required col-md-6">
<label for="nameoftheinstitution" class="control-label">
  Name Of the Institution
</label>
<input type="text" name="name_of_institution" id="name_of_institution" class="form-control" placeholder="Name of the Institution" required></input>
<span class="help-block with-errors"></span>

</div>
<div class=" form-group required col-md-6">
<label for="levelofeducation" class="control-label">
Worked As
</label>
    <input type="text" name="job_category" id="job_category" class="form-control"  required autofocus></input>
<span class="help-block with-errors"></span>


</div>

<br>
</div>

<div class="row">

<br>
<div class=" form-group required col-md-6">
<label for="yearofcompletion" class="control-label">
  From
</label>
<input class="form-control" name="start_date" id="start_date"  placeholder="dd/mm/yyyy" required autofocus>


</div>

<div class=" form-group required col-md-6">
<label for="attachfile" class="control-label">
To
</label>
<input class="form-control" name="end_date" id="end_date"  placeholder="dd/mm/yyyy" required autofocus>


</div>

</div>
<br>
</div>
</div>

<div class="modal-footer">


  <button type="submit"  class="btn btn-info btn-sm">Save</button>
<button data-dismiss="modal" class="btn btn-default" type="button">Close</button>

</div>
	</form>
</div>

</div>

</div>
</div>
</div>
</div>

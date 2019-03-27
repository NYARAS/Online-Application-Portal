<div class="modal fade" id="grade-show" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

<div class="modal-dialog">
<div class="modal-content">
  <form action="#" method="POST" enctype="multipart/form-data" id="register_form" data-toggle="validator">
        {!!csrf_field()!!} {{method_field('POST')}}
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
<div class="row">
<div class=" form-group required col-sm-12">
  <label for="nameoftheinstitution" class="control-label">
    Name Of the Institution
  </label>
<input type="text" name="institution_name" id="institution_name" class="form-control" placeholder="Name of the Institution" required></input>
<span class="help-block with-errors"></span>

</div>
<br>
<div class=" form-group required col-sm-12">
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
<div class=" form-group required col-sm-12">
  <label for="yearofcompletion" class="control-label">
    Year of Completion
  </label>
<input type="text" name="year_of_completion" id="year_of_completion" class="form-control" placeholder="dd/mm/yyyy"></input>


</div>
<br>
<div class=" form-group required col-sm-12">
  <label for="attachfile" class="control-label">
    Attach Certificate
  </label>
<input type="file" name="file_attachment" id="file_attachment" class="form-control" placeholder="please attach file"></input>


</div>

</div>
<br>

</div>
<div class="modal-footer">


  <button type="submit"  class="btn btn-info btn-sm">Save</button>
<button data-dismiss="modal" class="btn btn-default" type="button">Close</button>

</div>
	</form>
</div>

</div>


</div>

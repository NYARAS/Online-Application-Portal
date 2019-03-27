<div class="modal fade" id="manage-show" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

<div class="modal-dialog">
<div class="modal-content">
  <form action="#" method="POST" enctype="multipart/form-data" id="register_form" data-toggle="validator">
        {!!csrf_field()!!} {{method_field('POST')}}
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title"></h4>

</div>

<div class="modal-body">
  <span id="form-output"></span>
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
First Name
  </label>
  <input type="text" name="first_name" id="first_name" class="form-control" required autofocus></input>
<span class="help-block with-errors"></span>

</div>
<br>
<div class=" form-group required col-sm-12">
  <label for="levelofeducation" class="control-label">
    Second Name
  </label>
    <input type="text" name="second_name" id="second_name" class="form-control"  required autofocus></input>

<span class="help-block with-errors"></span>


</div>
<div class=" form-group required col-sm-12">
  <label for="levelofeducation" class="control-label">
    User Type
  </label>
    <input type="text" name="user_type" id="user_type" class="form-control"  required autofocus></input>

<span class="help-block with-errors"></span>


</div>
<div class=" form-group required col-sm-12">
  <label for="levelofeducation" class="control-label">
Role
  </label>
    <input type="text" name="category" id="category" class="form-control"  required autofocus></input>

<span class="help-block with-errors"></span>


</div>
<!-- <div class=" form-group required col-sm-12">
  <label for="levelofeducation" class="control-label">
Schools/Departments
  </label>

<select class="form-control" name="user_type" id="user_type">
    @foreach($schools as $key => $s)
  <option style="font-weight: bold;" value="{{$s->school_id}}">{{$s->school}}</option>

  @endforeach
  </select>

<span class="help-block with-errors"></span>


</div> -->


</div>
<br>

</div>
<div class="modal-footer">
<input type="hidden" id="applicant_id" name="applicant_id" value="">
  <input type="hidden" id="button_action" name="button_action" value="insert">
  <button type="submit"  class="btn btn-info btn-sm">Save</button>
<button data-dismiss="modal" class="btn btn-default" type="button">Close</button>

</div>
	</form>
</div>

</div>


</div>

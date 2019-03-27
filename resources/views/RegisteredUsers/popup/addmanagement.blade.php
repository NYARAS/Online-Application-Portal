<div class="modal fade" id="management-show" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title">Register Management</h4>

</div>
<form action="{{ route('register') }}" enctype="multipart/form-data" method="POST" id="frm-management-create">
<div class="modal-body">
<div class="row">
<div class="col-sm-8">
  <label for="user_type">
Management Type
  </label>
  <select style="font-weight: bold;" id="user_type" type="text" class="form-control" name="user_type" value="{{ old('user_type') }}"required>
    <option  value="">Select......</option>

  <option value="Dean School of Science">Dean School of Science</option>
    <option value="Dean School of Education">Dean School of Education</option>
      <option value="Dean School of Tourism">Dean School of Tourism</option>
        <option value="Dean School of Business">Dean School of Business</option>




  </select>

</div>

</div>
<br>

<div class="row">
<div class="col-sm-8">
  <label for="first_name">
First Name
  </label>
<input type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name"></input>

</div>

</div>
<br>
<div class="row">

<div class="col-sm-8">
  <label for="first_name">
Second Name
  </label>
<input type="text" name="second_name" id="second_name" class="form-control" placeholder="Second Name "></input>

</div>

</div>
<br>
<div class="row">

<div class="col-sm-8">
  <label for="last_name">
Last Name
  </label>
<input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last Name "></input>

</div>

</div>
<div class="row">

<div class="col-sm-8">
  <label for="last_name">
Email
  </label>
<input type="email" name="email" id="email" class="form-control" placeholder="email address"></input>

</div>

</div>

<div class="row">
<div class="col-sm-8">
  <label for="gender">
Gender
  </label>
  <select style="font-weight: bold;" id="gender" type="text" class="form-control" name="gender" value="{{ old('gender') }}"required>
    <option  value="">Select......</option>

  <option value="male">Male</option>
  <option value="female">Female</option>



  </select>

</div>

</div>
<div class="row">

<div class="col-sm-8">
  <label for="last_name">
Password
  </label>
  <input id="password" type="password" class="form-control" name="password" required>

</div>

</div>
<div class="row">

<div class="col-sm-8">
  <label for="last_name">
Confirm Password
  </label>
<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

</div>

</div>


</div>
<div class="modal-footer">
<button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
	<button class="btn btn-success btn-save-jobcode" type="submit">Register</button>
</div>
	</form>
</div>

</div>

</div>

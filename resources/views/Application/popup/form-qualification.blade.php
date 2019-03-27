<div class="modal modal-fixed-footer" id="qualification-show"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">



  <div class="modal-content">

    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title"></h4>

    </div>
    <br>
    <br>
    <br>
    <p>Qualification</p>
    <form action="#" method="POST" enctype="multipart/form-data" id="register_form" data-toggle="validator">
          {!!csrf_field()!!} {{method_field('POST')}}
    <div class="row">

    <br>


    <div class="input-field col s6 required ">
          <i class="material-icons prefix"></i>
      <input type="text" name="year_of_completion"  id="dob"  class="datepicker" required autofocus>
      <label for="year_of_completion" class="active control-label ">Year of Completion</label>

    </div>
    </div>
    <div class="row">

    <br>


    <div class="input-field col s6 required ">
          <i class="material-icons prefix"></i>
      <input type="text" name="year_of_completion"  id="dob"  class="datepicker1" required autofocus>
      <label for="year_of_completion" class="active control-label ">Year of Completion</label>

    </div>
    </div>
    <div class="row">

    <br>


    <div class="input-field col s6 required ">
          <i class="material-icons prefix"></i>
      <input type="text" name="year_of_completion"  id="dob"  class="datepicker" required autofocus>
      <label for="year_of_completion" class="active control-label ">Year of Completion</label>

    </div>
    </div>

    <div class="row">
    <div class="input-field col s12">
        <i class="material-icons prefix">mode_edit</i>
       <select  type="text" name="academic_level" id="academic_level" class="select">
         <option value="" disabled selected>Choose your option</option>
         <option value="Secondary">Secondary</option>
         <option value="Certificate">Certificate</option>
         <option value="Diploma">Diploma</option>
         <option value="Undergraduate">Undergraduate</option>
         <option value="Master Degree">Master Degree</option>
         <option value="PHD">Phd Degree</option>
       </select>
       <label style="font-family: 'Poppins', sans-serif;font-weight:bold;color:black">Level Of Education</label>
     </div>
    <span class="help-block with-errors"></span>


    </div>
  </div>

<div class="modal-footer">


  <button type="submit"  class="btn btn-info btn-sm">Save</button>
<button data-dismiss="modal" class="btn btn-default" type="button">Close</button>

</div>

</form>



</div>

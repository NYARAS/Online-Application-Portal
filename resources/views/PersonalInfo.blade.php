@extends('layouts.app')

@section('content')
<style type="text/css">
    .form-group.required .control-label:after {
    color: #ff0000;
    content: "*";
   
}
</style>

<div class="container">
<div>
    <p style="text-align: center;text-decoration: bold; color: green;font-family: Poppins;font-weight: 900;font-size: 30px">Maasai Mara University</p>
     <h5 style="text-align: center;"><em><strong>Office of Deputy Vice Chancellor (Administration, Finance and Planning)</strong></em></h5>
          <h5 style="text-align: center;"><strong><em>Tel: +254 020 5131400, P. O. Box 861 - 20500, Narok, Kenya </em></strong>        </h5>
        <p style="text-align: center;"><strong>JOB APPLICATION FROM</strong></p>
        <p style="text-align: center; color: green"><em><strong>Instuctions:</strong> The form has Six Parts, you have to fill all necessary fields in each part and attached the required documents in .doc, .pdf or .png format. After filling all, you will able to see the application view of your form. If you satisfied then click on the submit button. Once you submitted your form, you are not suppose to submit another form for same candidate otherwise both will cancel automatically</em>.</p>
        <p>&nbsp;</p>
</div>
<div class="container">
<form class="form-horizontal" role="form">
    <div class="form-group required row">
                <label for="inputKey" class="col-md-2 control-label" style="color: green">Job Applied for</label>
                <div class="col-md-2">
                  <select name="jobapplied" class="col-md-4 form-control">
                  <option>Choose from list</option>
                <option>Professor</option>
                <option>Senior Lecturer</option>
                <option>Lecturer</option>
                <option>Tutorial fellow</option>
                <option>Registrar</option>
                <option>Technician</option>
              </select>
                </div>
                <label for="inputKey" class="col-md-2 control-label" style="color: green">Job Code</label>
               <div class="col-md-2">
                  <select name="jobcode" class="col-md-4 form-control">
                <option selected="selected">Choose from List</option>
                <option>COM 23234V</option>
                <option>REF 234123G</option>
                <option>REF 234527T</option>
                <option>TED 23546Y</option>
              </select>
                </div>
                 <label for="inputKey" class="col-md-2 control-label" style="color: green">School/Department/Section</label>
               <div class="col-md-2">
                  <select name="jobcode" class="col-md-4 form-control">
               <option>Choose from List</option>
                <option>School of Science</option>
                <option>School of Education</option>
                <option>School of Tourism and Nat. Resources</option>
                <option>School of Business</option>
                <option>School of Arts</option>
                <option>Management</option>
                <option>Security</option>
              </select>
                </div>
                </div>

                </form>
                </div>


   <form class="form-horizontal" role="form">
   <p style="text-align: center;font-weight: bold;font-family: Poppins;font-size: 20px">PART 1</p>
   <h3 style="font-weight: bold;text-align: center;font-family: Poppins">PERSONAL INFORMATION</h3>
    <div class="form-group required row">
      <label for="inputType" class="col-md-2 control-label" style="color: green">First Name</label>
      <div class="col-md-2">
          <input type="text" class="form-control" id="inputType" placeholder="First Name">
      </div>
       <label for="inputType" class="col-md-2 control-label" style="color: green">Second Name</label>
      <div class="col-md-2">
          <input type="text" class="form-control" id="inputType" placeholder="Second Name">
      </div>
       <label for="inputType" class="col-md-2 control-label" style="color: green">Last Name</label>
      <div class="col-md-2">
          <input type="text" class="form-control" id="inputType" placeholder="Last Name">
      </div>
    </div>
    
            <div class="form-group required row">
                <label for="inputKey" class="col-md-2 control-label" style="color: green">Physical Address</label>
                <div class="col-md-2">
                    <input type="text" class="form-control" id="inputKey" placeholder="Home Address">
                </div>
                <label for="inputValue" class="col-md-2 control-label" style="color: green">P.O BOX</label>
                <div class="col-md-2">
                    <input type="text" class="form-control" id="inputValue" placeholder="Postal Address">
                </div>
                <label for="inputValue" class="col-md-2 control-label" style="color: green">City</label>
                <div class="col-md-2">
                    <input type="text" class="form-control" id="inputValue" placeholder="City">
                </div>
            </div>
            <div class="form-group required row">
                <label for="inputKey" class="col-md-2 control-label" style="color: green">Country</label>
                <div class="col-md-2">
                    <input type="text" class="form-control" id="inputKey" placeholder="Country">
                </div>
                <label for="email"  class="col-md-2 control-label" style="color: green">Email</label>
                <div class="col-lg-2">
                    <input type="text" class="form-control" id="inputValue" placeholder="Email Address">
                </div>
                <label for="inputValue" class="col-md-2 control-label" style="color: green">Phone Number</label>
                <div class="col-md-2">
                    <input type="text" class="form-control" id="inputValue" placeholder="Your phone number">
                </div>
            </div>
            <div class="form-group required row">
                <label for="inputKey" class="col-md-2 control-label" style="color: green">Attach Cover Letter</label>
                <div class="col-md-2">
                    <input type="file" class="form-control" id="inputKey" placeholder="Home Address">
                </div>
                <label for="inputValue" class="col-md-2 control-label" style="color: green">Attach Photo</label>
                <div class="col-md-2">
                    <input type="file" class="form-control" id="inputValue" placeholder="Postal Address">
                </div>
                <label for="inputValue" class="col-md-2 control-label" style="color: green">Attach CV</label>
                <div class="col-md-2">
                    <input type="file" class="form-control" id="inputValue" placeholder="City">
                </div>
            </div>
             <div class="form-group required row">
                <label for="inputKey" class="col-md-2 control-label" style="color: green">Gender</label>
                <div class="col-md-2">
                  <select name="gender" class="col-md-2 form-control">
                     <option>Select gender......</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                </select>
                </div>
               
                </div>
            </div>
        </div>
    </div>
</form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
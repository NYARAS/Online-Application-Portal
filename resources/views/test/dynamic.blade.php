@extends('layouts.header')
@section('content')

<style type="text/css">
    .student-photo{
        height:160px;
        padding-left: 1px;
        padding-right: 1px;
        border:1px solid #ccc;
        background: #eee;
        width: 140px;
        margin: 0 auto;
    }

    .photo> input[type='file']{
        display: none;
    }
    .photo{
        width: 30px;
        height: 30px;
        border-radius: 100px;
    }
    .student-id{
        background-repeat: repeat-x;
        border-color: #ccc;
        padding:5px;
        text-align: center;
        background: #eee;
        border-bottom: 1px solid #ccc;
    }
    .btn-browse{
        border-color: #ccc;
        padding:5px;
        text-align: center;
        background: #eee;
        border-bottom: 1px solid #ccc;

    }
    fieldset{
        margin-top: 5px;

    }
     fieldset legend{
        display: block;
        width: 100px;
        padding: 0;
        font-size: 15px;
        line-height: inherit;;
        color: #797979;
        border:0;
        border-bottom: 1px solid #e5e5e5;
     }
       .form-group.required .control-label:after {
    color: #ff0000;
    content: "*";

}
.form-group .control-label{
    color: green;
    font-weight: bold;
}
p{
    font-weight: bold;
}

</style>
<div class="container">
  <div class="table-responsive">
  <table class="table table-bordered table-condensed table-striped" id="crud-table">
      <tr>
        <th width="30%">Institution Name</th>
        <th width="10%">Education Type</th>
        <th width="45%">Year</th>
        <th width="45%">File</th>
      </tr>
      <tr>
        <td contenteditable="true" class="Institution_name"></td>
          <td contenteditable="true" class="Institution_type"></td>
            <td contenteditable="true"  class="Institution_year"></td>
                <td >
                  <input type="text" name="grade" id="grade" class="form-control" placeholder="new grade"></input>
                </td>

      </tr>

    </table>
    <div class="" align="right">
      <button type="button" name="add" id="add" class="btn btn-success btn-xs">+</button>

    </div>

    <div class="" align="center">
      <button type="button" name="submit" id="submit" class="btn btn-success btn-info">Save</button>

    </div>
    <br>

    <div class="" id="inserted_data">


    </div>

  </div>

</div>

<div class="container">
  <div class="form-group">
    <form class="" name="add-name" id="add-name" action="#" method="#">
      <table class="table table-bordered" id="dynamic-table">
        <tr>
          <th>School/College/University</th>
          <th>Academic Level</th>
          <th>Year Of Completion</th>
          <th>Attach File</th>
        </tr>
        <tr>
          <td><input type="text" name="grade[]" id="grade" class="form-control"  placeholder="Secondary Education"></input></td>
          <td><input type="text" name="grade[]" id="grade" class="form-control"  placeholder="Secondary"></input></td>
          <td><input type="text" name="year[]" id="year" class="form-control"  placeholder="Year"></input></td>
          <td><input type="file" name="grade[]" id="grade" class="form-control"  placeholder="Attach file"></input></td>
          <td>
            <button type="button" name="save" id="save" class="btn btn-primary">Add More</button>
          </td>
        </tr>

      </table>
      <input type="button" name="submit" value="submit" class="btn btn-success" id="submit">

    </form>

  </div>

</div>
<div class="container">
  <div class="panel panel-default">
  <div class="panel-heading">
  <b><i class="fa fa-apple"></i>Qualifications </b> (Give your qualifications starting with Secondary school)

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
  <form class="" action="{{route('storeDynamic')}}" method="POST" enctype="multipart/form-data">
      {!!csrf_field()!!}
      <input type="hidden" name="academic_level" id="academic_level" value="secondary"></input>
    <div class="row">
    <div class="col-lg-12">

    {{--------Secondary Education------------}}


    	<div class="col-md-4">
    	<div class="form-group required">
    	<label for="secondary" class="control-label">
    		Secondary School
    	</label>
    	<input type="text" name="institution_name" id="institution_name" class="form-control"   required autofocus></input>

    	</div>
    		</div>
        {{--------------------------------}}


        {{----------------------------------}}

    	{{--------Secondary Year------------}}


    	<div class="col-md-4">
    	<label for="secondary_year" style="color:green;font-weight:bold" class="control-label">
    	Year
    	</label>
    	<div class="input-group required">
    	<input class="form-control" name="year_of_completion" id="secondary_year" required autofocus>

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
    	<input type="file" name="file_attachment" id="copy_of_secondary" class="form-control"  ></input>
    		</div>
    		</div>

      <div class="col-md-6">
    <button class="btn btn-success btn-save-program" type="submit">Save</button>
    </div>


  </form>

  <div class="" align="right">
    <button type="button" name="add-more" id="add-data" class="btn btn-success btn-sm">Add More</button>

  </div>
  <br>
  <br>

  <table class="table table-bordered table-striped" id="applicant-table" style="width:100%">
    <thead>
      <tr>
        <th style="font-family:Poppins">Institution Name</th>
        <th style="font-family:Poppins">Academic Level</th>
        <th style="font-family:Poppins">Year of Completion</th>
        <th style="font-family:Poppins">Action</th>
      </tr>
    </thead>


  </table>

</div>
</div>
</div>
<div class="modal fade" id="grade-show" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title">Add more Qualification</h4>

</div>
<form action="{{route('storeDynamic')}}" method="POST" enctype="multipart/form-data" id="frm-grade-create">
  {!!csrf_field()!!}
<div class="modal-body">
<span id="form-output"></span>
<br>
<div class="row">
<div class=" form-group required col-sm-12">
  <label for="nameoftheinstitution" class="control-label">
    Name Of the Institution
  </label>
<input type="text" name="institution_name" id="institution_name" class="form-control" placeholder="Name of the Institution"></input>


</div>
<br>
<div class=" form-group required col-sm-12">
  <label for="levelofeducation" class="control-label">
    Level Of Education
  </label>
<input type="text" name="academic_level" id="academic_level" class="form-control" placeholder="Level of education e.g Certificate" required></input>


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
  <input type="hidden" id="dynamics_id" name="dynamics_id" value="">
  <input type="hidden" id="button_action" name="button_action" value="insert">
<button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
	<button class="btn btn-success btn-save-program" type="submit">Save</button>
</div>
	</form>
</div>

</div>



</div>





@endsection

@section('script')
<script type="text/javascript">
$(document).ready(function() {
	$('#applicant-table').DataTable({

		  "processing": true,
      "serverSide": true,
      "ajax":"{{route('getDynamic.getData')}}",
      "columns":[

        {"data": "institution_name"},
        {"data": "academic_level"},
        {"data": "year_of_completion"},
        {"data": "action", orderable:false, searchable:false}
      ]



	});
  $(document).on('click' ,'.edit', function(){
    var id = $(this).attr("id");
    $('#form-output').html('');
    $.ajax({
      url: "{{route('getDynamic.fetchdata')}}",
      method: 'GET',
      data: {id:id},
      dataType: 'json',
      success: function(data)
      {
        $('#institution_name').val(data.institution_name);
          $('#academic_level').val(data.academic_level);
            $('#year_of_completion').val(data.year_of_completion);
              $('#dynamics_id').val(data.id);
                $('#grade-show').modal('show');
                  $('#action').val('Edit');
                  $('.modal-title').text('Edit Data');
                  $('#button_action').val('Update')


      }


    });

  });
});

$('#secondary_year').datepicker({
  changeMonth:true,
  changeYear:true,
  dateFormat:'yy-mm-dd',
  minDate: new Date(1980,4,9),
  maxDate: new Date(1980,4,9)
})

$('#year_of_completion').datepicker({
  changeMonth:true,
  changeYear:true,
  dateFormat:'yy-mm-dd',

})

$(document).ready(function(){
  var i = 1;
  $('#save').click(function(){
    i++;
    $('#dynamic-table').append('<tr id="row'+i+'"><td><input type="text" name="grade[]" id="grade" class="form-control"  placeholder="Institution Name"></input></td><td><input type="text" name="grade[]" id="grade" class="form-control"  placeholder="Level"></input></td><td><input type="text" name="year[]" id="year1" id="'+i+'" class="form-control"  placeholder="Year"></input></td><td><input type="file" name="grade[]" id="grade" class="form-control"  placeholder="new grade"></input></td><td><button type="button" name="remove" class="btn btn-danger btn-remove" id="'+i+'">X</button></td></tr>');
    $('#year1').datepicker({
      changeMonth:true,
      changeYear:true,
      dateFormat:'yy-mm-dd',
      minDate: new Date(1980,4,9),
      maxDate: new Date(1980,4,9)
    })

  });

  $(document).on('click', '.btn-remove', function(){
    var button_id = $(this).attr("id");
    $("#row"+button_id+'').remove();

  });

});


$(document).ready(function(){
  var count = 1;
  $('#add').click(function(){
    count = count +1;
    var html_code = "<tr id='row"+count+"'>";
    html_code += "<td contenteditable='true' class='Institution_name'></td>";
    html_code += "<td contenteditable='true' class='Institution_type'></td>";
    html_code += "<td contenteditable='true' class='Institution_year'></td>";
    html_code += "<td contenteditable='true' class='Institution_file'></td>";
    html_code += "<td><button type='button' name='remove' data-row='row"+count+"' class='btn btn-danger btn-xs remove'>-</button></td>"
    html_code += "<tr>";
    $('#crud-table').append(html_code);

  });
  $(document).on('click', '.remove', function(){
    var delete_row = $(this).data("row");
    $('#' + delete_row).remove();
  });
});

$('#add-data').click(function(){
  $('#grade-show').modal('show');
});



</script>

@endsection

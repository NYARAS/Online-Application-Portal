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
  <form class="" action="#" method="POST" enctype="multipart/form-data">
      {!!csrf_field()!!} {{method_field('POST')}}
      <input type="hidden" name="academic_level" id="#" value="secondary"></input>
    <div class="row">
    <div class="col-lg-12">

    {{--------Secondary Education------------}}


    	<div class="col-md-4">
    	<div class="form-group required">
    	<label for="secondary" class="control-label">
    		Secondary School
    	</label>
    	<input type="text" name="institution_name" id="#" class="form-control"   required autofocus></input>

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
    	<input type="text" name="file_attachment" id="copy_of_secondary" class="form-control"  ></input>
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
  <form action="#" method="POST" enctype="multipart/form-data" id="ajax-form">
        {!!csrf_field()!!} {{method_field('POST')}}
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title">Add more Qualification</h4>

</div>

<div class="modal-body">


<span id="form-output"></span>
<input type="hidden" name="dynamics_id" value="dynamics_id">
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
<input type="text" name="academic_level" id="academic_level" class="form-control" placeholder="Level of education e.g Certificate" ></input>


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
<input type="text" name="file_attachment" id="file_attachment" class="form-control" placeholder="please attach file"></input>


</div>

</div>
<br>

</div>
<div class="modal-footer">
<input type="hidden" id="dynamics_id" name="dynamics_id" value="">
  <input type="hidden" id="button_action" name="button_action" value="insert">
  <input type="submit" name="submit" value="Add" id="action" class="btn btn-info">
<button data-dismiss="modal" class="btn btn-default" type="button">Close</button>

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
  $('#add-data').click(function(){
    $('#grade-show').modal('show');
    $('#ajax-form')[0].reset();
    $('#form-output').html('');
    $('#button_action').val('insert');
    $('#action').val('Add');

  });
  $('#ajax-form').on('submit', function(event){
    event.preventDefault();
    var form_data = $(this).serialize();
    $.ajax({
      url:"{{route('ajaxdata.postdata')}}",
      type: "POST",
      data: form_data,
      dataType: "JSON",



    success:function(data)
    {

      if (data.error.length > 0)
       {
         var error_html = '';
         for (var count = 0; count < data.error.length; count++)
          {
           error_html += '<div class="alert alert-danger">'+data.error[count]+'</div>'
         }
         $('#form-output').html(error_html);

      }

      else
      {
        $('#form-output').html(data).success;
        $('#ajax-form')[0].reset();
        $('#form-output').html('');
        $('#action').val('Add');
        $('.modal-title').text('Add Data');
        $('#button_action').val('insert');

      }

    }



  });


});
$(document).on('click' ,'.edit', function(){
  var id = $(this).attr("id");
  $('#form-output').html('');
  $.ajax({
    url: "{{route('getDynamic.fetchdata')}}",
    type: 'GET',
    data: {id:id},
    dataType: 'json',
    success: function(data)
    {
      $('#institution_name').val(data.institution_name);
        $('#academic_level').val(data.academic_level);
          $('#year_of_completion').val(data.year_of_completion);
          $('#file_attachment').val(data.file_attachment);
            $('#dynamics_id').val(data.id);
              $('#grade-show').modal('show');
                $('#action').val('Edit');
                $('.modal-title').text('Edit Data');
                $('#button_action').val('Update')


    }


  });

});



});

function deleteData(id){

  var csrf_token = $('meta[name="csrf_token"]').attr('content');
  swal({
    title: 'Are you sure?',
    text: "You wont't be able to reverse this",
    type: 'warning',
    showCancelButton: true,
    cancelButtonColor: '#d33',
    confirmButtonColor: '#3085d6',
    confirmButtonText: 'Yes, delete it!'
  }).then(function() {
    $.ajax({
      url:"{{url('getDynamic')}}" + '/' + id,
      type: "POST",
      data:{'_method':'DELETE', '_token' : csrf_token},
      success:function(data)
      {
      swal({
        title: 'Success',
        text: 'Data has been deleted',
        type: 'success',
        timer: '1500'
      })
      },
      error : function(){
        swal({
          title: 'Oops.....',
          text: 'Something went wrong!',
          type:'error',
          timer: '1500'
        })
      }


    });


  });
}

function editForm(id)
{
  save_method = 'edit';
  $('input[name=_method]').val('PATCH');
  $('#ajax-form ')[0].reset();
  $.ajax({
    url:"{{url('getDynamic')}}" + '/'+ id + "/edit",
    type: 'GET',
    dataType: 'JSON',
    success: function(data)
    {

      $('#institution_name').val(data.institution_name);
        $('#academic_level').val(data.academic_level);
          $('#year_of_completion').val(data.year_of_completion);
          $('#file_attachment').val(data.file_attachment);
            $('#dynamics_id').val(data.id);
              $('#grade-show').modal('show');
                $('.modal-title').text('Edit Data');


    },
    error: function()
    {
      alert("Nothing Data");
    }



  });
}

</script>

@endsection

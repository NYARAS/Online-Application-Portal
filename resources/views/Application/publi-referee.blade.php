@extends('layouts.header')
@section('content')
@include('Application.popup.form-qualification')
@include('Application.popup.form-publication')

<style type="text/css">
@import url('https://fonts.googleapis.com/css?family=Spicy+Rice');
@import url('https://fonts.googleapis.com/css?family=Roboto');
@import url('https://fonts.googleapis.com/css?family=Lato:700');
@import url('https://fonts.googleapis.com/css?family=Poppins');
@import url('https://fonts.googleapis.com/css?family=Anton');
       .form-group.required .control-label:after {
    color: #ff0000;
    content: "*";

}
.input-field .control-label{
     color: black;
     font-family: 'Poppins', sans-serif;
       font-size: 18px;
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
.crr{
  color: green;
}
.er{
  color: red;
}

</style>





{{---------------------------}}
<div class="container">
    <div class="row">

<div class="panel panel-default">
<div class="panel-heading">
<b><i class="fa fa-apple"></i>Publications and Conference </b>



</div>

<div class="panel panel-body" style="padding-bottom: 10px; margin-top: 0;">
  <form action="#" enctype="multipart/form-data" method="POST" id="frm-create-student">
    {!!csrf_field()!!}
    <div class="row">
      <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">


    {{--------Number of Journals------------}}


    <div class="col s4 input-field">
      <i class="material-icons prefix"></i>
      <input  value="" name="number_of_journals" id="number_of_journals" type="number" min="1" class="validate">
      <label for="number_of_journals" class="active  control-label " >Number of Journals Published</label>

    </div>

    	{{--------List Of Journals------------}}


      <div class="col s6 file-field input-field">

      <div class="btn">
        <span>Attach List</span>
        <input type="file" name="list_of_journals"  value="" required autofocus multiple>

      </div>
      <div class="file-path-wrapper">
        <input type="text" class="file-path validate" name="curriculum_vitae" placeholder="upload one or more files">

      </div>

      </div>

</div>
      {{--------Number of Books ------------}}

    <div class="col s4 input-field">
      <i class="material-icons prefix"></i>
      <input  value="" name="number_of_books" id="number_of_books" type="number" min="1" class="validate">
      <label for="number_of_books" class="active  control-label " >Number of Books Published</label>

    </div>


    			{{--------List of Books ------------}}

        <div class="col s6 file-field input-field">

        <div class="btn">
          <span>Attach List</span>
          <input type="file" name="list_of_books"  value="" required autofocus>

        </div>
        <div class="file-path-wrapper">
          <input type="text" class="file-path validate" name="list_of_books" placeholder="upload one or more files">

        </div>
     <p class="err">--</p>
        </div>

</div>
</div>


<div class="panel panel-default">
<div class="panel-heading">
<b><i class="fa fa-apple"></i>Referees </b>




</div>
<div class="panel panel-body" style="padding-bottom: 10px; margin-top: 0;">

    <a href="#" onclick="addForm()" class="btn btn-primary pull-right btn-sm" style="margin-top: -8px">Add More</a>

    <div class="row">

    <div class="col-lg-12">

      {{----------Referee Name------------}}
      <div class="col s4 input-field">
        <i class="material-icons prefix">account_circle</i>
        <input  value="" name="name_of_referee" id="name_of_referee" type="text"  class="validate">
        <label for="name_of_referee" class="active  control-label " >Name of Referee</label>

      </div>

      <div class="col s6 file-field input-field">

      <div class="btn">
        <span>Attach Recommendation Letter</span>
        <input type="file" name="recommendation_letter" id="recommendation_letter" class="form-control"  required autofocus>

      </div>
      <div class="file-path-wrapper">
        <input type="text" name="recommendation_letter" id="recommendation_letter" class="file-path validate" onChange="validate(this.value)" placeholder="upload one or more files">

      </div>
   <p class="err">--</p>
      </div>


      {{----------Attach Recommendation Letter------------}}





</div>
</div>

</div>

<div class="panel-footer">
  |<button type="submit" class="btn btn-success btn-save">Save<i class="fa fa-save"></i></button>
  |

  </button>
</form>
</div>
</div>
<div class="container">


<div class="panel panel-default">
<div class="panel-heading">
<b><i class="fa fa-apple"></i>Your Publications and Referees Information </b>




</div>
<br>
<br>
<div class="panel panel-body" style="padding-bottom: 10px; margin-top: 0;">

  <table class="table table-bordered table-striped" id="applicant-table" style="width:100%">
    <thead>
      <tr>
        <th style="font-family:Poppins">Number of Journals</th>
        <th style="font-family:Poppins">Number of Books</th>


        <th style="font-family:Poppins">Action</th>
      </tr>
    </thead>


  </table>

  <table class="table table-bordered table-striped" id="referees-table" style="width:100%">
    <thead>
      <tr>

        <th style="font-family:Poppins">Name of Referee</th>

        <th style="font-family:Poppins">Action</th>
      </tr>
    </thead>


  </table>


<a href="{{route('getTerms')}}" class="btn btn-success">Next</a>
  |

    <a href="{{url('/qualification')}}" class="btn btn-primary">Back</a>  |






</div>
</div>






@endsection

@section('script')
@include('script.form-publication')

<script type="text/javascript">

var table = $('#applicant-table').DataTable({

    processing: true,
    serverSide: true,
    ajax:"{{route('api.publication')}}",
    columns:[

      {data: 'number_of_journals', name:'number_of_journals'},
      {data: 'number_of_books', name:'number_of_books'},



      {data: 'action', name: 'action', orderable:false, searchable:false}
    ]



});

var table = $('#referees-table').DataTable({

    processing: true,
    serverSide: true,
    ajax:"{{route('api.publication')}}",
    columns:[


      {data: 'name_of_referee', name:'name_of_referee'},


      {data: 'action', name: 'action', orderable:false, searchable:false}
    ]



});
// function fileValidation(){
//   var fileInput = document.getElementById("recommendation_letter");
//   var filePath = fileInput.value;
//   var allowedExtensions = /(\.jpg)$/i;
//     if(!allowedExtensions.exec(filePath))
//     {
//     alert('only png files allowed');
//
//       fileInput.value = '';
//       return false;
//
//     }
//     else {
//       if(fileInput.files && fileInput.files[0])
//       {
//         var reader = new FIleReader();
//         reader.onload = function(e){
//           document.getElementById("imagePreview").innerHTML = '<img src ="'+e.target.result+'"/>';
//         };
//         reader.readAsDataURL(fileInput.files[0]);
//       }
//     }
//
// }

function validate(file)
{
  var ext = file.substr(file.lastIndexOf('.') + 1);
  var allow = ["pdf","docx","doc"];
  if(allow.lastIndexOf(ext)==-1)
  {
$(".err").html("Please upload only pdf or docx or doc").addClass("er").removeClass("crr");
$("#recommendation_letter").val("");
  }
  else {
    $(".err").html("").addClass("crr").removeClass("er");

  }
}


function addForm()
{
  save_method = "add";
  $('input[name=_method]').val('POST');
  $('#frm-create-student ')[0].reset();


}
$(function()
{
  $('#frm-create-student').on('submit', function(e){


    if (!e.isDefaultPrevented())
    {
      var id = $('#id').val();
      if (save_method == 'add') url="{{url('publication')}}";
      else url ="{{url('publication'). '/'}}" + id;

      $.ajax({

        url: url,
        type: "POST",
        // data: $('#grade-show form').serialize(),
        data: new FormData($('#frm-create-student')[0]),
        contentType: false,
        processData: false,
        success:function(data){


           swal({
             title: 'Success',
             text: 'Information saved successfully...!!!',
             type: 'success',
             timer: '1500'
           })
        },
        error:function(){
          swal({
            title: 'Oops.....',
            text: 'The was an error inserting the data!',
            type:'error',
            timer: '1500'
          })
        }

      });
      return false;


    }
  });



});

//======================================================================
function addForm()
{
  save_method = "add";
  $('input[name=_method]').val('POST');
  $('#publication-show form ')[0].reset();
  $('#publication-show').modal('show');
  $('.modal-title').text('Add More Referees');

}
$(function()
{
  $('#publication-show form').on('submit', function(e){


    if (!e.isDefaultPrevented())
    {
      var id = $('#id').val();
      if (save_method == 'add') url="{{url('publication')}}";
      else url ="{{url('publication'). '/'}}" + id;

      $.ajax({

        url: url,
        type: "POST",
        // data: $('#grade-show form').serialize(),
        data: new FormData($('#publication-show form')[0]),
        contentType: false,
        processData: false,
        success:function(data){
          $('#publication-show').modal('hide');
           table.ajax.reload();
           swal({
             title: 'Success',
             text: 'Information saved successfully...!!!',
             type: 'success',
             timer: '1500'
           })
        },
        error:function(){
          swal({
            title: 'Oops.....',
            text: 'The was an error inserting the data!',
            type:'error',
            timer: '1500'
          })
        }

      });
      return false;


    }
  });



});

function editForm(id)
{
  save_method = 'edit';
  $('input[name=_method]').val('PATCH');
  $('#publication-show form ')[0].reset();
  $.ajax({
    url:"{{url('publication')}}" + '/'+ id + "/edit",
    type: 'GET',
    dataType: 'JSON',
    success: function(data)
    {

      $('#number_of_journals').val(data.number_of_journals);
        $('#number_of_books').val(data.number_of_books);
          $('#name_of_referee').val(data.name_of_referee);


            $('#id').val(data.id);
              $('#publication-show').modal('show');
                $('.modal-title').text(' Edit Publications');


    },
    error: function()
    {
      alert("Nothing Data");
    }



  });
}
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
      url:"{{url('publication')}}" + '/' + id,
      type: "POST",
      data:{'_method':'DELETE', '_token' : csrf_token},
      success:function(data)

      {
      table.ajax.reload();
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

$('#year_of_completion').datepicker({
  changeMonth:true,
  changeYear:true,
  dateFormat:'yy-mm-dd',

})
$('#secondary_year').datepicker({
  changeMonth:true,
  changeYear:true,
  dateFormat:'yy-mm-dd',

})
$('#start_date').datepicker({
  changeMonth:true,
  changeYear:true,
  dateFormat:'yy-mm-dd',

})
$('#end_date').datepicker({
  changeMonth:true,
  changeYear:true,
  dateFormat:'yy-mm-dd',

})
$('#start_of_date').datepicker({
  changeMonth:true,
  changeYear:true,
  dateFormat:'yy-mm-dd',

})
$('#end_of_date').datepicker({
  changeMonth:true,
  changeYear:true,
  dateFormat:'yy-mm-dd',

})









</script>

@endsection

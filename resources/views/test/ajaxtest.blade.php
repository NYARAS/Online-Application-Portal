@extends('layouts.header')
@section('content')
@include('test.form')

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
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
        <h4>
          <a href="#" onclick="addForm()" class="btn btn-primary pull-right" style="margin-top: -8px">Add More</a>
        </h4>

        </div>
        <div class="panel-body">
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
          <table class="table table-bordered table-striped" id="applicant-table" style="width:100%">
            <thead>
              <tr>
                <th style="font-family:Poppins">Institution Name</th>
                <th style="font-family:Poppins">Academic Level</th>
                <th style="font-family:Poppins">Year of Completion</th>
                <th style="font-family:Poppins">Action</th>
              </tr>
            </thead>
            <tbody>

            </tbody>


          </table>

        </div>

      </div>

    </div>

  </div>

</div>


@endsection

@section('script')
@include('script.form-validation')
<script type="text/javascript">

	var table = $('#applicant-table').DataTable({

		  processing: true,
      serverSide: true,
      ajax:"{{route('api.test')}}",
      columns:[

        {data: 'institution_name', name:'institution_name'},
        {data: 'academic_level', name:'academic_level'},
        {data: 'year_of_completion', name:'year_of_completion'},

        {data: 'action', name: 'action', orderable:false, searchable:false}
      ]



	});

function addForm()
{
  save_method = "add";
  $('input[name=_method]').val('POST');
  $('#grade-show form ')[0].reset();
  $('#grade-show').modal('show');
  $('.modal-title').text('Add Data');

}
$(function()
{
  $('#grade-show form').on('submit', function(e){


    if (!e.isDefaultPrevented())
    {
      var id = $('#id').val();
      if (save_method == 'add') url="{{url('test')}}";
      else url ="{{url('test'). '/'}}" + id;

      $.ajax({

        url: url,
        type: "POST",
        // data: $('#grade-show form').serialize(),
        data: new FormData($('#grade-show form')[0]),
        contentType: false,
        processData: false,
        success:function(data){
          $('#grade-show').modal('hide');
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
  $('#grade-show form ')[0].reset();
  $.ajax({
    url:"{{url('test')}}" + '/'+ id + "/edit",
    type: 'GET',
    dataType: 'JSON',
    success: function(data)
    {

      $('#institution_name').val(data.institution_name);
        $('#academic_level').val(data.academic_level);
          $('#year_of_completion').val(data.year_of_completion);

            $('#id').val(data.id);
              $('#grade-show').modal('show');
                $('.modal-title').text('Edit Data');


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
      url:"{{url('test')}}" + '/' + id,
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



</script>

@endsection

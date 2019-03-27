@extends('layouts.app')
@section('content')
@include('Admin.popup.manage')
@include('Admin.popup.user')
<style type="text/css">
    .avatar{
        border-radius: 100px;
        max-width: 100px;
    }
      .panel-green > .panel-heading {
        border-color: #5cb85c;
        color: green;
    }

.panel-green {
    border-color: red;
}
            }
.form-group.required .control-label:after {
    color: #ff0000;
    content: "*";

}
.control-label{
    color: green;
}
.lead{
    font-weight: bold;
}

</style>


{{----------------------}}

<div class="row">
<div class="col-lg-12">

<h3 class="page-header"><i class="fa fa-file-text-o"></i>Management</h3>

<ol class="breadcrumb">
<li><i class="fa fa-home" ></i><a href="#"></a>Home</li>
<li><i class="icon_document"></i>Management</li>
<li><i class="fa fa-file-text-o"></i>Body</li>
  </ol>
</div>

</div>


{{---------------------}}


<div class="panel panel-body" style="padding-bottom: 10px; margin-top: 0;">
    <a href="#" onclick="addForm()"  style="margin-top: -8px"></a>

  <table class="table table-bordered table-striped" id="candidate-info" style="width:100%">
    <thead>
      <tr>


        <th style="font-family:Poppins">First Name</th>
        <th style="font-family:Poppins">Second Name</th>
        <th style="font-family:Poppins">Email</th>
          <th style="font-family:Poppins">Management/Dean</th>

        <th style="font-family:Poppins">Action</th>
      </tr>
    </thead>
    <tbody>
      <tr>

    </tbody>


  </table>


<br>
<h3>

  ADMIN PANEL
 </h3>





</div>
                        </div>


                        <div class="row">
                        <div class="col-lg-12">

                        <h3 class="page-header"><i class="fa fa-file-text-o"></i>User Information</h3>

                        <ol class="breadcrumb">
                        <li><i class="fa fa-home" ></i><a href="#"></a>Home</li>
                        <li><i class="icon_document"></i>Management</li>
                        <li><i class="fa fa-file-text-o"></i>Body</li>
                          </ol>
                        </div>

                        </div>


                        {{---------------------}}


                        <div class="panel panel-body" style="padding-bottom: 10px; margin-top: 0;">
                            <a href="#" onclick="addForm()"  style="margin-top: -8px"></a>

                          <table class="table table-bordered table-striped" id="user-info" style="width:100%">
                            <thead>
                              <tr>


                                <th style="font-family:Poppins">First Name</th>
                                <th style="font-family:Poppins">Second Name</th>
                                <th style="font-family:Poppins">Email</th>
                                  <th style="font-family:Poppins">Management/Dean</th>

                                <th style="font-family:Poppins">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>

                            </tbody>


                          </table>


                        <br>
                        <h3>

                          ADMIN PANEL
                         </h3>





                        </div>
                                                </div>




                                @endsection

@section('script')
<script type="text/javascript">
var table = $('#candidate-info').DataTable({

    processing: true,
    serverSide: true,
    ajax:"{{route('api.adminhome')}}",
    columns:[









      {data: 'first_name', name:'first_name'},
      {data: 'second_name', name:'second_name'},
      {data: 'email', name:'email'},
      {data: 'user_type', name:'user_type'},











      {data: 'action', name: 'action', orderable:false, searchable:false}
    ]



});

var table = $('#user-info').DataTable({

    processing: true,
    serverSide: true,
    ajax:"{{route('user.adminhome')}}",
    columns:[









      {data: 'first_name', name:'first_name'},
      {data: 'second_name', name:'second_name'},
      {data: 'email', name:'email'},
      {data: 'user_type', name:'user_type'},











      {data: 'action', name: 'action', orderable:false, searchable:false}
    ]



});

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
      if (save_method == 'add') url="{{url('science')}}";
      else url ="{{url('science'). '/'}}" + id;

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
  $('#manage-show form ')[0].reset();
  $('#experience-show').modal('show');
  $('.modal-title').text('Add More Qualification');

}
$(function()
{
  $('#manage-show form').on('submit', function(e){


    if (!e.isDefaultPrevented())
    {
      var id = $('#id').val();
      if (save_method == 'add') url="{{url('adminhome')}}";
      else url ="{{url('adminhome'). '/'}}" + id;

      $.ajax({

        url: url,
        type: "POST",
        // data: $('#experience-show form').serialize(),
        data: new FormData($('#manage-show form')[0]),
        contentType: false,
        processData: false,
        success:function(data){
          $('#manage-show').modal('hide');
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
  $('#manage-show form ')[0].reset();
  $.ajax({
    url:"{{url('adminhome')}}" + '/'+ id + "/edit",
    type: 'GET',
    dataType: 'JSON',
    success: function(data)
    {

      $('#first_name').val(data.first_name);

      $('#second_name').val(data.second_name);
      $('#user_type').val(data.user_type);
      $('#category').val(data.category);


            $('#id').val(data.id);
              $('#manage-show').modal('show');
                $('.modal-title').text('Update User/Management Information');


    },
    error: function()
    {
      alert("Nothing Data");
    }



  });
}
// function deleteData(id){
//
//   var csrf_token = $('meta[name="csrf_token"]').attr('content');
//   swal({
//     title: 'Are you sure?',
//     text: "You wont't be able to reverse this",
//     type: 'warning',
//     showCancelButton: true,
//     cancelButtonColor: '#d33',
//     confirmButtonColor: '#3085d6',
//     confirmButtonText: 'Yes, delete it!'
//
//   }).then(function() {
//     $.ajax({
//       url:"{{url('qualification')}}" + '/' + id,
//       type: "POST",
//       data:{'_method':'DELETE', '_token' : csrf_token},
//       success:function(data)
//
//       {
//       table.ajax.reload();
//       swal({
//         title: 'Success',
//         text: 'Data has been deleted',
//         type: 'success',
//         timer: '1500'
//       })
//       },
//       error : function(){
//         swal({
//           title: 'Oops.....',
//           text: 'Something went wrong!',
//           type:'error',
//           timer: '1500'
//         })
//       }
//
//
//     });
//
//
//   });
// }

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

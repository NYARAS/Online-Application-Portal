<script type="text/javascript">
var table = $('#applicant-table').DataTable({

    processing: true,
    serverSide: true,
    ajax:"{{route('api.qualification')}}",
    columns:[

      {data: 'institution_name', name:'institution_name'},
      {data: 'academic_level', name:'academic_level'},
      {data: 'year_of_completion', name:'year_of_completion'},


      {data: 'action', name: 'action', orderable:false, searchable:false}
    ]



});

var table = $('#Experience-table').DataTable({

    processing: true,
    serverSide: true,
    ajax:"{{route('api.qualification')}}",
    columns:[


      {data: 'name_of_institution', name:'name_of_institution'},
      {data: 'job_category', name:'job_category'},
      {data: 'start_date', name:'end_date'},
      {data: 'end_date', name:'end_date'},

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
      if (save_method == 'add') url="{{url('qualification')}}";
      else url ="{{url('qualification'). '/'}}" + id;

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
  $('#qualification-show form ')[0].reset();
  $('#qualification-show').modal('show');
  $('.modal-title').text('Add More Qualification');

}
$(function()
{
  $('#qualification-show form').on('submit', function(e){


    if (!e.isDefaultPrevented())
    {
      var id = $('#id').val();
      if (save_method == 'add') url="{{url('qualification')}}";
      else url ="{{url('qualification'). '/'}}" + id;

      $.ajax({

        url: url,
        type: "POST",
        // data: $('#grade-show form').serialize(),
        data: new FormData($('#qualification-show form')[0]),
        contentType: false,
        processData: false,
        success:function(data){
          $('#qualification-show').modal('hide');
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
//==============================================================================================



function editForm(id)
{
  save_method = 'edit';
  $('input[name=_method]').val('PATCH');
  $('#qualification-show form ')[0].reset();
  $.ajax({
    url:"{{url('qualification')}}" + '/'+ id + "/edit",
    type: 'GET',
    dataType: 'JSON',
    success: function(data)
    {

      $('#institution_name').val(data.institution_name);
        $('#academic_level').val(data.academic_level);
          $('#year_of_completion').val(data.year_of_completion);
          $('#name_of_institution').val(data.name_of_institution);
            $('#job_category').val(data.job_category);
              $('#start_date').val(data.start_date);
              $('#end_date').val(data.end_date);

            $('#id').val(data.id);
              $('#qualification-show').modal('show');
                $('.modal-title').text('Edit Qualification');


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
      url:"{{url('qualification')}}" + '/' + id,
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

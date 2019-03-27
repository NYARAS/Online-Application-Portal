@extends('layouts.master')
@section('content')

<style media="screen">
@import url('https://fonts.googleapis.com/css?family=Spicy+Rice');
@import url('https://fonts.googleapis.com/css?family=Roboto');
@import url('https://fonts.googleapis.com/css?family=Lato:700');
@import url('https://fonts.googleapis.com/css?family=Poppins');
@import url('https://fonts.googleapis.com/css?family=Anton');
body{
  background: white;
  font-family: 'Roboto', sans-serif;
}
.prettyprint {
          background: white;
          font-family: Menlo, 'Bitstream Vera Sans Mono', 'DejaVu Sans Mono', Monaco, Consolas, monospace;
          font-size: 12px;
          line-height: 1.5;
          border: 1px solid #ccc;
          padding: 10px;
      }

      .pln {
          color: #4d4d4c;
      }

      @media screen {
          .str {
              color: #718c00;
          }

          .kwd {
              color: #8959a8;
          }

          .com {
              color: #8e908c;
          }

          .typ {
              color: #4271ae;
          }

          .lit {
              color: #f5871f;
          }

          .pun {
              color: #4d4d4c;
          }

          .opn {
              color: #4d4d4c;
          }

          .clo {
              color: #4d4d4c;
          }

          .tag {
              color: #c82829;
          }

          .atn {
              color: #f5871f;
          }

          .atv {
              color: #3e999f;
          }

          .dec {
              color: #f5871f;
          }

          .var {
              color: #c82829;
          }

          .fun {
              color: #4271ae;
          }
      }
      @media print, projection {
          .str {
              color: #006600;
          }

          .kwd {
              color: #006;
              font-weight: bold;
          }

          .com {
              color: #600;
              font-style: italic;
          }

          .typ {
              color: #404;
              font-weight: bold;
          }

          .lit {
              color: #004444;
          }

          .pun, .opn, .clo {
              color: #444400;
          }

          .tag {
              color: #006;
              font-weight: bold;
          }

          .atn {
              color: #440044;
          }

          .atv {
              color: #006600;
          }
      }
      /* Specify class=linenums on a pre to get line numbering */
      ol.linenums {
          margin-top: 0;
          margin-bottom: 0;
      }

      /* IE indents via margin-left */
      li.L0,
      li.L1,
      li.L2,
      li.L3,
      li.L4,
      li.L5,
      li.L6,
      li.L7,
      li.L8,
      li.L9 {
          /* */
      }

      /* Alternate shading for lines */
      li.L1,
      li.L3,
      li.L5,
      li.L7,
      li.L9 {
          /* */
      }
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
  .input-field.required .control-label:after {
color: #ff0000;
content: "*";

}
  .form-group .control-label{
      color: green;
      font-weight: bold;
  }
  .input-field .control-label{
       color: black;
      font-weight: bold;
        font-family: 'Poppins', sans-serif;
  }
  p{

  font-family: 'Roboto', sans-serif;
    font-size: 18px;
    font-weight: bold;

  }
  body {
  display: flex;
  min-height: 100vh;
  flex-direction: column;
}

main {
  flex: 1 0 auto;
}

	hr{
		width: 100%;
		margin-right: 0;
		margin-left: 0;
		padding: 0;
		margin-top: 5px;
		margin-bottom: 50px;
		border:0 none;
		border-top: 1px solid #322f32;
		background: none;
		height: 0;

	}
  h4{
    color: red;
font-family: 'Poppins', sans-serif;
  }


</style>
<div class="container" style="margin-top:50px;">



<p style="font-size:30px; color:Blue;font-family: 'Spicy Rice', cursive;">Add New Campus</p>

<hr>

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
    <div class="row">
      <form method="POST" action="{{url('/campus') }}" enctype="multipart/form-data"  id="frm-create-student" class="col s12">
      {!!csrf_field()!!}

      <div class="row">


      {{--------Course Name------------}}

      <div class="input-field col-md-4 ">
        <label for="icon_prefix" class="active control-label " >Campus Name</label>
        <i class="material-icons prefix"></i>
        <input   id="icon_prefix"  name="name" type="text" class="validate form-control" required autofocus >


      </div>

          </div>
<div class="row">


      <div class="input-field col-md-12">
          <label for="icon_prefix" class="active  control-label " >Description</label>
        <i class="material-icons prefix"></i>
        <textarea class="form-control" id="article-ckeditor" class="form-control"  rows="10" name="description" id="description" required autofocus>

        </textarea>


      </div>
</div>









<button type=""  class="btn waves-effect waves-light pull-left blue">
Submit
<i class="material-icons left">send</i>
</button>
    </div>






</div>
</div>










@endsection
@section('script')
<script type="text/javascript">

$(function()
{
  $('#frm-create-student').on('submit', function(e){


    if (!e.isDefaultPrevented())
    {
      var id = $('#id').val();
      if (save_method == 'add') url="{{url('addreferees')}}";
      else url ="{{url('addreferees'). '/'}}" + id;

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




$(document).ready(function(){
  $('.tabs').tabs();
});

var elems = document.querySelectorAll('.modal');
   var instances = M.Modal.init(elems, {



   });


const ac = document.querySelector('.autocomplete');
M.Autocomplete.init(ac,{

  data: {
    "Senior Lecturer":null,
      "Assistant Lecturer":null,
        "Graduate Lecturer":null,
          "Tutorial Fellow":null,
  },


});



var elems = document.querySelector('select');
  M.FormSelect.init(elems, {});

  var elems = document.querySelector('.select');
    M.FormSelect.init(elems, {});

    var elems = document.querySelector('.datepicker');
  M.Datepicker.init(elems, {

    showClearBtn:true,
    format:'dd/mm/yyyy',
    i18n:{
      clear:'remove',
      done:'Yes'
    }
  });

  var elems = document.querySelector('.datepicker1');
M.Datepicker.init(elems, {

  showClearBtn:true,
  format:'dd/mm/yyyy',
  i18n:{
    clear:'remove',
    done:'Yes'
  }
});

$('#basic').flagStrap();
$('#basic1').flagStrap();

   $('#origin').flagStrap({
       placeholder: {
           value: "",
           text: "Country of origin"
       }
   });

   $('#options').flagStrap({
       countries: {
           "AU": "Australia",
           "GB": "United Kingdom",
           "US": "United States"
       },
       buttonSize: "btn-sm",
       buttonType: "btn-info",
       labelMargin: "10px",
       scrollable: false,
       scrollableHeight: "350px"
   });

   $('#advanced').flagStrap({
       buttonSize: "btn-lg",
       buttonType: "btn-primary",
       labelMargin: "20px",
       scrollable: false,
       scrollableHeight: "350px",
       onSelect: function (value, element) {
           alert(value);
           console.log(element);
       }
   });
   //=============================================
$('#frm-multi-class #btn-go').addClass('hidden');
   $(document).on('click','#post-edit',function(e){
      e.preventDefault();

      $('#post_id').val($(this).data('id'));
      $('.academic-detail p').text($(this).text());
      $('#choose-academic').modal('hide');

   })


  //--------------------browse photo----------
  $('#browse_file').on('click',function(){
      $('#applicant_photo').click();
  })
  $('#applicant_photo').on('change',function(e){
      showFile(this,'#showPhoto');

  })

  //=========================================
  // $('#dob').datepicker({
  //     changeMonth:true,
  //     changeYear:true,
  //     dateFormat:'yy-mm-dd'
  // })

  //-=========================================
  function showFile(fileInput,img,showName){
      if(fileInput.files[0]){
          var reader = new FileReader();
          reader.onload =function(e){
              $(img).attr('src', e.target.result);
          }
          reader.readAsDataURL(fileInput.files[0]);
      }
      $(showName).text(fileInput.files[0].name)

  };
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



                                </script>

                  @endsection

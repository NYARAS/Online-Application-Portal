@extends('layouts.header')
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

 @foreach($schools->all() as $school)
   <p style="color:green">Maasa Mara University | {{$school->school}} </p>

<hr>
<h4>{{$school ->job_title}}</h4>

@endforeach
  @if(count($posts)>0)
@foreach($posts ->all() as $post)


<p style="font-family: 'Poppins', sans-serif;" >{!!$post ->post_body!!}</p>



@endforeach
@else
<p>No vacancy available</p>
 @endif

<p style="font-size:30px; color:Blue;font-family: 'Spicy Rice', cursive;">Apply for this Job</p>

<hr>
    <div class="row">
      <form method="POST" action='{{url("/comment/{$post->post_id}")}}' enctype="multipart/form-data"  id="frm-create-student" class="col s12">
      {!!csrf_field()!!}

      <input type="hidden" name="post_id" id="post_id"  required autofocus></input>
      <input type="hidden" name="applicant_id" id="applicant_id" value="1"></input>
      <input type="hidden" name="user_id" id="user_id" value="{{Auth::id()}}"></input>
      <input type="hidden" name="date_applied" id="date_applied" value="{{date('Y-m-d')}}"></input>
      <div class="row">
      <div class="col-lg-9 col-md-9 col-sm-9">

      {{--------First Name------------}}

      <div class="input-field col s6 ">
        <i class="material-icons prefix">account_circle</i>
        <input   id="icon_prefix" value="{{ Auth::user()->first_name }}" type="text" class="validate" disabled>
        <label for="icon_prefix" class="active control-label " >First Name</label>

      </div>

      <div class="input-field col s6">
        <i class="material-icons prefix">account_circle</i>
        <input   id="icon_prefix" value="{{ Auth::user()->second_name }}" type="text" class="validate" disabled>
        <label for="icon_prefix" class="active  control-label " >Second Name</label>

      </div>
          {{--------Second Name------------}}






                  {{--------Gender ------------}}




                  <div class="col s4 input-field">
                    <i class="material-icons prefix">account_circle</i>
                    <input   id="gender"value="{{ Auth::user()->gender }}" type="text" class="validate" disabled>
                    <label for="gender" class="active  control-label " >Gender</label>

                  </div>


          {{--------Date Of Birth------------}}


          <div class="input-field col s4 required ">
                <i class="material-icons prefix">account_circle</i>
            <input type="text" name="dob"  id="dob"  class="datepicker" required autofocus>
            <label for="dob" class="active control-label ">Birth Date</label>

          </div>



      {{-----------National Card--------------}}





      <div class="col s4 input-field">
        <i class="material-icons prefix">mode_edit</i>
        <input   id="national_id_card" name="national_id_card" type="text" class="validate">
        <label for="national_id_card" class="active control-label " >National Card No./ID No.</label>

      </div>
              {{--------Status ------------}}





          {{-----------Passport--------------}}


                <div class="col s4 input-field">
                  <i class="material-icons prefix">mode_edit</i>
                  <input   id="your_passport" name="passport" type="text" class="validate">
                  <label for="your_passport" class="active control-label " >Passport Number</label>

                </div>

          {{-----------Nationality--------------}}

      <div class="input-field col s4">
        <label for="nationality" class="active control-label ">Nationality</label>
   <select  name="nationality" id="nationality" data-role="country-selector">



   </select>

 </div>
          {{-----------Primary Phone--------------}}


      <div class="col s4 input-field">
        <i class="material-icons prefix">phone</i>
        <input  value="" name="primary_phone_number"  id="icon_telephone" type="tel" class="validate" required autofocus>
        <label for="icon_telephone" class="active  control-label " >Primary Phone Number</label>

      </div>
          {{-----------Secondary Phone--------------}}



      <div class="col s4 input-field">
        <i class="material-icons prefix">phone</i>
        <input  value="" name="secondary_phone_number" id="icon_telephone" type="tel" class="validate">
        <label for="icon_telephone" class="active  control-label " >Secondary Phone Number</label>

      </div>


          {{-----------Email--------------}}
          <div class="col s6 input-field">
            <i class="material-icons prefix">phone</i>
            <input   name="email" id="email" type="tel" value="{{ Auth::user()->email }}" class="validate" disabled required autofocus>
            <label for="email" class="active  control-label " >Email</label>

          </div>



      {{------------------------------------}}
      <div class="col s6 file-field input-field">

      <div class="btn">
        <span>Curriculum Vitae</span>
        <input type="file" name="curriculum_vitae"  value="" required autofocus>

      </div>
      <div class="file-path-wrapper">
        <input type="text" class="file-path validate" name="curriculum_vitae" placeholder="upload one or more files">

      </div>

      </div>
      {{------------------------------------}}

      <div class="col s6 file-field input-field">

      <div class="btn">
        <span>Cover Letter</span>
        <input type="file" name="cover_letter"  value="" required autofocus>

      </div>
      <div class="file-path-wrapper">
        <input type="text" name="cover_letter" value="" class="file-path validate" placeholder="upload one or more files">

      </div>

      </div>


      {{----------------------------------------------}}

      </div>

      {{--------------Photo--------------}}
      <div class="col s12 m4 l2 input-field" >
      <div class="form-group form-group-login">
      <table style="margin: 0 auto">
      <thead>

          <tr class="info">
              <th class="student-id">Passport Photo(Required)</th>
          </tr>
      </thead>
      <tbody>
      <tr>
          <td class="photo">
              {!!Html::image('photo/example.png',null,['class'=>'student-photo','id'=>'showPhoto'])!!}
              <input type="file" name="applicant_photo" id="applicant_photo" accept="image/x-png,image/png,image/jpg,image/jpeg" required autofocus ></input>

          </td>
      </tr>
      <tr>
          <td style="text-align: center;background: #ddd">
          <input type="button" name="browse_file" id="browse_file" class="form-control btn-browse" value="Browse" required autofocus ></input>

          </td>
      </tr>
          </tbody>
      </table>

      </div>

      </div>
      {{---------------------------}}









      </div>



      <button type=""  class="btn waves-effect waves-light pull-left blue">
    Submit
    <i class="material-icons left">send</i>
      </button>


      <!-- Modal Trigger -->
     <a class="waves-effect waves-light btn modal-trigger" href="#modal1">Modal</a>

     <!-- Modal Structure -->
<br>
<br>
<p style="font-size:20px; color:Black;font-family: 'Poppins', cursive;">Part 2 (Upload all your files here)</p>
     <hr>
     <div id="modal1" class="modal modal-fixed-footer">
       <div class="modal-content">
         <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
         <h4 class="modal-title"></h4>

         </div>
         <p>Qualification</p>
         <div class="row">

         <br>


         <div class="input-field col s6 required ">
               <i class="material-icons prefix"></i>
           <input type="text" name="year_of_completion"  id="dob"  class="datepicker2" required autofocus>
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
           <input type="text" name="year_of_completion"  id="dob"  class="datepicker2" required autofocus>
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
         <a href="#!" class="modal-close waves-effect waves-green btn-flat">Save</a>
       </div>
     </div>

     <!-- Default with no input (automatically generated)  -->






<!-- Customizable input  -->

</form>

<div class="row">

  <div class="col s12">
    <ul class="tabs">
      <li class="tab col s3"><a href="#test1">Qualification Files</a></li>
      <li class="tab col s3"><a class="active" href="#test2">Publication Files</a></li>
      <li class="tab col s3 "><a href="#test3">Referees Recommendation files</a></li>
      <li class="tab col s3"><a href="#test4">Payment</a></li>
    </ul>
  </div>
  <div id="test1" class="col s12">
    <form class=""  method="post">


    <div class="row">





      <div class="col s12 file-field input-field">

      <div class="btn">
        <span>Qualification Files</span>
        <input type="file" name="curriculum_vitae"  value="" required autofocus multiple>

      </div>
      <div class="file-path-wrapper">
        <input type="text" class="file-path validate" name="curriculum_vitae" placeholder="upload all the files">

      </div>

      </div>
      <button type=""  class="btn waves-effect waves-light pull-left blue">
    Submit
    <i class="material-icons left">send</i>
      </button>
    </div>

    </form>

  </div>
  <div id="test2" class="col s12">
    <form action="#" enctype="multipart/form-data" method="POST" id="frm-create-student">
      {!!csrf_field()!!}


    <div class="row">

    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">


    <div class="col s4 input-field">
      <i class="material-icons prefix"></i>
      <input  value="" name="number_of_journals" id="number_of_journals" type="number" min="1" class="validate">
      <label for="number_of_journals" class="active  control-label " >Number of Journals Published</label>

    </div>

      {{--------List Of Journals------------}}


      <div class="col s6 file-field input-field">

      <div class="btn">
        <span>Attach List</span>
        <input type="file" name="list_of_journals"  value="" required autofocus>

      </div>
      <div class="file-path-wrapper">
        <input type="text" class="file-path validate" name="list_of_journals" placeholder="upload one or more files">

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
      <button type=""  class="btn waves-effect waves-light pull-left blue">
    Submit
    <i class="material-icons left">send</i>
      </button>
    </div>

  </form>
  </div>


  <div id="test3" class="col s12">
    <form class="" method="post">


    <div class="row">




      <div class="col s12 file-field input-field">

      <div class="btn">
        <span>Recommendation Letters</span>
        <input type="file" name="curriculum_vitae"  value="" required autofocus multiple>

      </div>
      <div class="file-path-wrapper">
        <input type="text" class="file-path validate" name="curriculum_vitae" placeholder="upload all the files">

      </div>

      </div>
      <button type=""  class="btn waves-effect waves-light pull-left blue">
    Submit
    <i class="material-icons left">send</i>
      </button>
    </div>

    </form>

  </div>
  <div id="test4" class="col s12">
    <form class=""  method="post">


    <div class="row">




      <div class="col s12 file-field input-field">

      <div class="btn">
        <span>Payment</span>
        <input type="file" name="curriculum_vitae"  value="" required autofocus multiple>

      </div>
      <div class="file-path-wrapper">
        <input type="text" class="file-path validate" name="curriculum_vitae" placeholder="upload all the files" required autofocus>

      </div>

      </div>
      <button type="submit"  class="btn waves-effect waves-light pull-left blue">
    Submit
    <i class="material-icons left">send</i>
      </button>
    </div>


    </form>
  </div>
</div>



</div>

</div>

 <footer class="page-footer">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">

              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text"></h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="#!"></a></li>

                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            © 2018 Otieno Calvine
            <a class="grey-text text-lighten-4 right" href="#!"></a>
            </div>
          </div>
        </footer>











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

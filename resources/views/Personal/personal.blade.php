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





{{---------------------------}}

<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-1">
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
{{-----------------------------}}
@if(count($personals)>0)


               @foreach($personals as $personal)
<div class="panel-group" id="accordion">
<div class="panel panel-default">
<div class="panel-heading">
<a data-toggle="collapse" data-parent="#accordion" href="#collapse1" style="text-decoration: none;">Choose the post your applying for</a>
<a href="#" class="pull-right" id="show-course-info"><i class="fa fa-plus" ></i></a>

</div>

<div id="collapse1" class="panel-collapse collapse in">
<div class="panel-body academic-detail"  ><p></p></div>

</div>

</div>

</div>

{{------------------------------}}

<div class="panel panel-default">
<div class="panel-heading">
<b><i class="fa fa-apple"></i>Personal Information</b>

</div>
<div class="panel panel-body" style="padding-bottom: 10px; margin-top: 0;">
<form action="#" method="POST" enctype="multipart/form-data"  id="frm-create-student">
{!!csrf_field()!!}


<input type="hidden" name="post_id" id="post_id"  required autofocus></input>
<input type="hidden" name="applicant_id" id="applicant_id" value="1"></input>
<input type="hidden" name="user_id" id="user_id" value="{{Auth::id()}}"></input>
<input type="hidden" name="date_applied" id="date_applied" value="{{date('Y-m-d')}}"></input>
<div class="row">
<div class="col-lg-9 col-md-9 col-sm-9">

{{--------First Name------------}}

<div>
    <div class="col-md-4">
    <div class="form-group">
    <label for="firstname" class="control-label">
        First Name
    </label>
    <input type="text" name="first_name" id="first_name" class="form-control"  value="{{ Auth::user()->first_name }}" disabled="true" required autofocus></input>

    </div>
        </div>
    </div>
    {{--------Second Name------------}}


    <div class="col-md-4">
    <div class="form-group">
    <label for="firstname" class="control-label">
        Second Name
    </label>
    <input type="text" name="second_name" id="second_name" class="form-control" value="{{ Auth::user()->second_name }}" disabled="true" required autofocus></input>
        </div>
        </div>




            {{--------Gender ------------}}


    <div class="col-md-4">
    <div class="form-group">
    <label for="firstname" class="control-label">
        Gender
    </label>
    <input type="text" name="second_name" id="second_name" class="form-control" value="{{ Auth::user()->gender }}" disabled="true" required autofocus></input>
        </div>
        </div>




    {{--------Date Of Birth------------}}


    <div class="col-md-4">
    <div class="form-group required">
    <label for="dob" class="control-label">
        Birth Date
    </label>
    <div class="input-group">
        <div class="input-group-addon">
        <i class="fa fa-calendar studentdob"></i>
    </div>
    <input type="text" name="dob" id="dob" class="form-control" value="{{ ($personal->dob) }}" placeholder="dd/mm/yyyy"  required autofocus></input>

    </div>
        </div>
    </div>

{{-----------National Card--------------}}

<div class="col-md-4">
<div class="form-group required">
<label for="national_card" class="control-label">National Card Number</label>
<input type="text" name="national_id_card" id="national_id_card" value="{{ ($personal->national_id_card) }}"  class="form-control" ></input>

</div>

</div>
        {{--------Status ------------}}


    <div class="col-md-4">
    <div class="form-group">
<fieldset>
    <legend class="control-label">Marital Status</legend>
    <table style="width: 100%; margin-top: -14px">
        <tr style="border-bottom: 1px solid #ccc">
        <td>
            <label>
            <input type="radio" name="status" id="status" value="0" >Single</input>
        </label>

        </td>
        <td>
        <label>
            <input type="radio" name="status" id="status" value="1" >Married</input>
        </label>

        </td>

        </tr>
    </table>
</fieldset>
    </div>

    </div>
    {{-----------Passport--------------}}

<div class="col-md-4">
<div class="form-group">
<label for="passport" class="control-label">Passport</label>
<input type="text" name="passport" id="passport" class="form-control"></input>

</div>

</div>

    {{-----------Nationality--------------}}

<div class="col-md-4">
<div class="form-group required">
<label for="nationality" class="control-label">Nationality</label>
<input type="text" name="nationality" id="nationality"  class="form-control"></input>

</div>

</div>
    {{-----------Primary Phone--------------}}

<div class="col-md-4">
<div class="form-group required">
<label for="phone" class="control-label">Primary Phone</label>
<input type="text" name="primary_phone_number" id="primary_phone_number" value="{{ ($personal->primary_phone_number) }}" class="form-control" ></input>

</div>

</div>
    {{-----------Secondary Phone--------------}}

<div class="col-md-4">
<div class="form-group">
<label for="phone" class="control-label">Secondary Phone</label>
<input type="text" name="secondary_phone_number" id="secondary_phone_number" value="{{ ($personal->secondary_phone_number) }}" class="form-control"></input>

</div>

</div>
    {{-----------Email--------------}}

<div class="col-md-4">
<div class="form-group">
<label for="email" class="control-label">Email</label>
<input type="email" name="email" id="email" class="form-control" value="{{ Auth::user()->email }}" disabled="true" required autofocus></input>

</div>

</div>

{{------------------------------------}}
<div class="col-md-4">
<div class="form-group required">
<label for="passport" class="control-label">Cover Letter</label>
<input type="file" name="cover_letter" id="cover_letter" class="form-control"  ></input>

</div>

</div>
{{------------------------------------}}

<div class="col-md-4">
<div class="form-group required">
<label for="curriculum_vitae" class="control-label">Curriculum Vitae</label>
<input type="file" name="curriculum_vitae" id="curriculum_vitae" class="form-control"  ></input>

</div>

</div>
{{----------------------------------------------}}

</div>

{{--------------Photo--------------}}
<div class="col-lg-3 col-md-3 col-sm-3">
<div class="form-group form-group-login">
<table style="margin: 0 auto">
<thead>

    <tr class="info">
        <th class="student-id">Passport</th>
    </tr>
</thead>
<tbody>
<tr>
    <td class="photo">
        {!!Html::image('photo/example.png',null,['class'=>'student-photo','id'=>'showPhoto'])!!}
        <input type="file" name="applicant_photo" id="applicant_photo" accept="image/x-png,image/png,image/jpg,image/jpeg" ></input>

    </td>
</tr>
<tr>
    <td style="text-align: center;background: #ddd">
    <input type="button" name="browse_file" id="browse_file" class="form-control btn-browse" value="Browse" ></input>

    </td>
</tr>
    </tbody>
</table>

</div>

</div>
{{---------------------------}}






</div>

</div>

<br>

{{-----address----------------}}

<div class="panel-heading" style="margin-top: -20px">
<b><i class="fa fa-apple"></i>Address</b>

</div>
<div class="panel-body" style="padding-bottom: 10px; margin-top: 0;">
<div class="row">
<div class="col-md-3">
<div class="form-group required">
<label for="country" class="control-label">County</label>
<input type="text" name="country" id="country" value="{{ ($personal->country) }}" class="form-control"></input>

</div>

</div>
{{----------Province------------}}
<div class="col-md-3">
<div class="form-group required">
<label for="province" class="control-label">Province</label>
<input type="text" name="province" id="province" value="{{ ($personal->province) }}" class="form-control" ></input>

</div>

</div>
{{----------District------------}}
<div class="col-md-3">
<div class="form-group">
<label for="district" class="control-label">District</label>
<input type="text" name="district" id="district" value="{{ ($personal->district) }}"  class="form-control"></input>

</div>

</div>

{{----------Current Address------------}}
<div class="col-md-3">
<div class="form-group required">
<label for="current_address" class="control-label">Current Address</label>
<input type="text" name="current_address" id="current_address" value="{{ ($personal->current_address) }}" class="form-control" ></input>

</div>

</div>

    {{----------address-----------}}
</div>

</div>


<div class="panel-footer">
|<button value="submit" class="btn btn-success btn-save"> Next<i class="fa fa-save"></i></button>
|

  <a href="{{url('/dashboard')}}" class="btn btn-primary">Back</a>  |

</div>


</form>

</div>
</div>


</div>
</div>

@endforeach
{{--------------------------------------------End of Edit-----------------------------------------}}
@else



{{------------------------------}}
<div class="panel-group" id="accordion">
<div class="panel panel-default">
<div class="panel-heading">
<a data-toggle="collapse" data-parent="#accordion" href="#collapse1" style="text-decoration: none;">Choose the post your applying for</a>
<a href="#" class="pull-right" id="show-course-info"><i class="fa fa-plus" ></i></a>

</div>

<div id="collapse1" class="panel-collapse collapse in">
<div class="panel-body academic-detail"  ><p></p></div>

</div>

</div>

</div>


<div class="panel panel-default">

<div class="panel panel-body" style="padding-bottom: 10px; margin-top: 0;">
<form action="{{route('storePersonal')}}" method="POST" enctype="multipart/form-data"  id="frm-create-student">
{!!csrf_field()!!}

<input type="hidden" name="post_id" id="post_id"  required autofocus></input>
<input type="hidden" name="applicant_id" id="applicant_id" value="1"></input>
<input type="hidden" name="user_id" id="user_id" value="{{Auth::id()}}"></input>
<input type="hidden" name="date_applied" id="date_applied" value="{{date('Y-m-d')}}"></input>
<div class="row">
<div class="col-lg-9 col-md-9 col-sm-9">

{{--------First Name------------}}

<div>
    <div class="col-md-4">
    <div class="form-group">
    <label for="firstname" class="control-label">
        First Name
    </label>
    <input type="text" name="first_name" id="first_name" class="form-control"  value="{{ Auth::user()->first_name }}" disabled="true" required autofocus></input>

    </div>
        </div>
    </div>
    {{--------Second Name------------}}


    <div class="col-md-4">
    <div class="form-group">
    <label for="firstname" class="control-label">
        Second Name
    </label>
    <input type="text" name="second_name" id="second_name" class="form-control" value="{{ Auth::user()->second_name }}" disabled="true" required autofocus></input>
        </div>
        </div>




            {{--------Gender ------------}}


    <div class="col-md-4">
    <div class="form-group">
    <label for="firstname" class="control-label">
        Gender
    </label>
    <input type="text" name="second_name" id="second_name" class="form-control" value="{{ Auth::user()->gender }}" disabled="true" required autofocus></input>
        </div>
        </div>




    {{--------Date Of Birth------------}}


    <div class="col-md-4">
    <div class="form-group required">
    <label for="dob" class="control-label">
        Birth Date
    </label>
    <div class="input-group">
        <div class="input-group-addon">
        <i class="fa fa-calendar studentdob"></i>
    </div>
    <input type="text" name="dob" id="dob" class="form-control" placeholder="dd/mm/yyyy"  required autofocus></input>

    </div>
        </div>
    </div>

{{-----------National Card--------------}}

<div class="col-md-4">
<div class="form-group required">
<label for="national_id_card" class="control-label">National Card Number</label>
<input type="text" name="national_id_card" id="national_id_card"   class="form-control" readonly autofocus ></input>

</div>

</div>
        {{--------Status ------------}}


    <div class="col-md-4">
    <div class="form-group">
<fieldset>
    <legend class="control-label">Marital Status</legend>
    <table style="width: 100%; margin-top: -14px">
        <tr style="border-bottom: 1px solid #ccc">
        <td>
            <label>
            <input type="radio" name="status" id="status" value="0"  >Single</input>
        </label>

        </td>
        <td>
        <label>
            <input type="radio" name="status" id="status" value="1" >Married</input>
        </label>

        </td>

        </tr>
    </table>
</fieldset>
    </div>

    </div>
    {{-----------Passport--------------}}

<div class="col-md-4">
<div class="form-group">
<label for="passport" class="control-label">Passport</label>
<input type="text" name="passport" id="passport" class="form-control"></input>

</div>

</div>

    {{-----------Nationality--------------}}

<div class="col-md-4">
<div class="form-group required">
<label for="nationality" class="control-label">Nationality</label>
<input type="text" name="nationality" id="nationality" class="form-control" required autofocus></input>

</div>

</div>
    {{-----------Primary Phone--------------}}

<div class="col-md-4">
<div class="form-group required">
<label for="primary_phone_number" class="control-label">Primary Phone</label>
<input type="text" name="primary_phone_number" id="primary_phone_number"  class="form-control" required autofocus ></input>

</div>

</div>
    {{-----------Secondary Phone--------------}}

<div class="col-md-4">
<div class="form-group">
<label for="phone" class="control-label">Secondary Phone</label>
<input type="text" name="secondary_phone_number" id="secondary_phone_number"  class="form-control"></input>

</div>

</div>
    {{-----------Email--------------}}

<div class="col-md-4">
<div class="form-group">
<label for="email" class="control-label">Email</label>
<input type="email" name="email" id="email" class="form-control" value="{{ Auth::user()->email }}" disabled="true" required autofocus></input>

</div>

</div>

{{------------------------------------}}
<div class="col-md-4">
<div class="form-group required">
<label for="passport" class="control-label">Cover Letter</label>
<input type="file" name="cover_letter" id="cover_letter" class="form-control" required autofocus ></input>

</div>

</div>
{{------------------------------------}}

<div class="col-md-4">
<div class="form-group required">
<label for="curriculum_vitae" class="control-label">Curriculum Vitae</label>
<input type="file" name="curriculum_vitae" id="curriculum_vitae" class="form-control" required autofocus ></input>

</div>

</div>
{{----------------------------------------------}}

</div>

{{--------------Photo--------------}}
<div class="col-lg-3 col-md-3 col-sm-3">
<div class="form-group form-group-login">
<table style="margin: 0 auto">
<thead>

    <tr class="info">
        <th class="student-id">Passport</th>
    </tr>
</thead>
<tbody>
<tr>
    <td class="photo">
        {!!Html::image('photo/example.png',null,['class'=>'student-photo','id'=>'showPhoto'])!!}
        <input type="file" name="applicant_photo" id="applicant_photo" accept="image/x-png,image/png,image/jpg,image/jpeg" ></input>

    </td>
</tr>
<tr>
    <td style="text-align: center;background: #ddd">
    <input type="button" name="browse_file" id="browse_file" class="form-control btn-browse" value="Browse" ></input>

    </td>
</tr>
    </tbody>
</table>

</div>

</div>
{{---------------------------}}






</div>

</div>

<br>

{{-----address----------------}}


<div  class="panel-heading" style="margin-top: -20px">
<b><i class="fa fa-apple"></i>Address</b>

</div>
<div class="panel-body" style="padding-bottom: 10px; margin-top: 0;">
<div class="row">
<div class="col-md-3">
<div class="form-group required">
<label for="country" class="control-label">Country</label>
<input type="text" name="country" id="country" class="form-control" required autofocus></input>

</div>

</div>
{{----------Province------------}}
<div class="col-md-3">
<div class="form-group required">
<label for="province" class="control-label">Province/State/City</label>
<input type="text" name="province" id="province"  class="form-control" required autofocus ></input>

</div>

</div>
{{----------District------------}}
<div class="col-md-3">
<div class="form-group">
<label for="district" class="control-label">District</label>
<input type="text" name="district" id="district"  class="form-control"></input>

</div>

</div>

{{----------Current Address------------}}
<div class="col-md-3">
<div class="form-group required">
<label for="current_address" class="control-label">Current Address</label>
<input type="text" name="current_address" id="current_address"  class="form-control" required autofocus></input>

</div>

</div>



    {{----------address-----------}}
</div>

</div>


<div class="panel-footer">
  |<button value="button" class="btn btn-success btn-save"> Next<i class="fa fa-save"></i></button>
  |
    <a href="{{url('/dashboard')}}" class="btn btn-primary">Back</a>  |
  <button type="reset" class="btn btn-danger">
  Reset
  </button>
</div>


</form>

</div>
</div>


</div>
</div>


@endif
@include('postInfo.postPopup')
@endsection

@section('script')
@include('script.postPopup')


<script type="text/javascript">

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
    $('#dob').datepicker({
        changeMonth:true,
        changeYear:true,
        dateFormat:'yy-mm-dd'
    })

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
        function MergeCommonRows(table){
        var firstColumnBrakes = [];
        $.each(table.find('th'),function(i){
            var previous = null, cellToExtend = null, rowspan = 1;
            table.find("td:nth-child("+i+")").each(function(index,e){
                var jthis = $(this),content = jthis.text();
                if(previous == content && content !== "" && $.inArray(index, firstColumnBrakes)=== -1){
                    jthis.addClass('hidden');
                    cellToExtend.attr("rowspan", (rowspan=rowspan+1));

                }else{
                    if(i ===1)firstColumnBrakes.push(index);
                    rowspan =1;
                    previous = content;
                    cellToExtend = jthis;
                }
            });
        });
        $('td.hidden').remove();
    }
</script>
@endsection

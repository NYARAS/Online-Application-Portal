@extends('layouts.header')
@section('content')

<style type="text/css">
       .form-group.required .control-label:after {
    color: #ff0000;
    content: "*";

}
.form-group .control-label{
    color: green;
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

</style>





{{---------------------------}}

<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-offset-1">

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
<b><i class="fa fa-apple"></i>Publications, Conferences and Workshops </b>

</div>
<div class="panel panel-body" style="padding-bottom: 10px; margin-top: 0;">
<form  method="POST"  action="{{url('/addpublications') }}" enctype="multipart/form-data" id="frm-create-student">
{!!csrf_field()!!}
<div class="row">
<div class="col-lg-12">

{{--------Number of Journals Published------------}}

<div class="row">


	<div class="col-md-4">
	<div class="form-group required">
	<label for="secondary" class="control-label">
	Number of Journals Published
	</label>
	<input type="text" name="number_of_journals" id="number_of_journals" class="form-control"  required autofocus></input>

	</div>
		</div>

	{{--------Number of Journals Copy------------}}


  	<div class="col-md-4">
  	<div class="form-group required">
  	<label for="list_of_journals" class="control-label">
  		Attach a List
  	</label>
  	<input type="file" name="list_of_journals" id="list_of_journals" class="form-control" required autofocus></input>
  		</div>
  		</div>

  </div>



			{{--------Number Of Books Published ------------}}

<div class="row">


	<div class="col-md-4">
	<div class="form-group required">
	<label for="number_of_books" class="control-label">
		Number Of Books Published
	</label>
	<input type="text" name="number_of_books" id="number_of_books" class="form-control" required autofocus></input>
		</div>
		</div>

		{{--------Copy of Books------------}}


			<div class="col-md-4">
			<div class="form-group required" required>
			<label for="undergraduate" class="control-label">
			Attach a List
			</label>
			<input type="file" name="list_of_books" id="list_of_books" class="form-control"  required autofocus></input>

			</div>
				</div>
</div>


{{----------------------------------------------}}

</div>


{{---------------------------}}






</div>

</div>


<br>

{{-----address----------------}}

<div class="panel-heading" style="margin-top: -20px">
<b><i class="fa fa-apple"></i>Referees</b>

</div>
<div class="panel-body" style="padding-bottom: 10px; margin-top: 0;">
<div class="row">


<div class="col-md-6">
<div class="form-group required">
<label for="country" class="control-label">1. Full Name of First Referee</label>
<input type="text" name="referee_one" id="referee_one" class="form-control"></input>

</div>

</div>
{{----------Recommendation Letter------------}}
<div class="col-md-3">
<div class="form-group required">
<label for="province" class="control-label">Attach Recommendation Letter</label>
<input type="file" name="referee_one_recommendation" id="referee_one_recommendation" class="form-control" required autofocus></input>

</div>

</div>


{{----------Name of Referee Two------------}}
<div class="col-md-6">
<div class="form-group required" >
<label for="district" class="control-label">2:Full Name of Second Referee</label>
<input type="text" name="referee_two" id="referee_two" class="form-control"></input>

</div>

</div>

{{----------Recommendation Letter Two------------}}
<div class="col-md-3">
<div class="form-group required">
<label for="current_address" class="control-label">Attach Recommendation Letter</label>
<input type="file" name="referee_two_recommendation" id="referee_two_recommendation" class="form-control" required autofocus></input>

</div>

</div>



{{----------Name of Referee Three------------}}
<div class="col-md-6">
<div class="form-group required">
<label for="referee_three" class="control-label">2:Full Name of Third Referee</label>
<input type="text" name="referee_three" id="referee_three" class="form-control"></input>

</div>

</div>

{{----------Recommendation Letter Three-----------}}
<div class="col-md-3">
<div class="form-group required">
<label for="referee_three_recommendation" class="control-label">Attach Recommendation Letter</label>
<input type="file" name="referee_three_recommendation" id="referee_three_recommendation" class="form-control" required autofocus></input>

</div>

</div>

	{{----------address-----------}}
</div>

</div>


<div class="panel-footer">
<button value="submit" class="btn btn-success btn-save"> Save<i class="fa fa-save"></i></button>

</div>


</form>

</div>
</div>


</div>
</div>
@include('postInfo.postPopup')
@endsection

@section('script')
@include('script.postPopup')

<script type="text/javascript">

     //=============================================
 $('#frm-multi-class #btn-go').addClass('hidden');
     $(document).on('click','#post-edit',function(e){
     	e.preventDefault();

     	$('#class_id').val($(this).data('id'));
     	$('.academic-detail p').text($(this).text());
     	$('#choose-academic').modal('hide');

     })


	//--------------------browse photo----------
	$('#browse_file').on('click',function(){
		$('#photo').click();
	})
	$('#photo').on('change',function(e){
		showFile(this,'#showPhoto');

	})

	//=========================================
	$('#secondary_year').datepicker({
		changeMonth:true,
		changeYear:true,
		dateFormat:'yy-mm-dd'
	})
	//=========================================
	$('#undergraduate_year').datepicker({
		changeMonth:true,
		changeYear:true,
		dateFormat:'yy-mm-dd'
	})

	//=========================================
	$('#post_graduate_year').datepicker({
		changeMonth:true,
		changeYear:true,
		dateFormat:'yy-mm-dd'
	})
	//=========================================
	$('#phd_year').datepicker({
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

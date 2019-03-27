@extends('layouts.master')
@section('content')

@include('posts.popup.post')
@include('posts.popup.school')
@include('posts.popup.jobcode')
@include('posts.popup.grade')



<div class="row">

<div class="col-lg-12">
<h3 class="page-header"><i class="fa fa-file-text-o"></i>Vacancies</h3>
<ol class="breadcrumb">
	<li><i class="fa fa-home"></i><a href="#">Home</a></li>
	<li><i class="icon_document_alt"></i>Vacancies</li>
	<li><i class="fa fa-file-text-o"></i>Manage Vacancies</li>
</ol>

</div>

</div>
<div class="row">
<div class="col-lg-12">

<section class="panel panel-default">
<header class="panel-heading">
Manage Posts

</header>

<form  action="{{route('createPost')}}" class="form-horizontal" method="POST"  id="frm-post-create">
{!!csrf_field()!!}
<input type="hidden" name="active" id="active" value="1"></input>
<input type="text" name="class_id" id="class_id" ></input>
<div class="panel panel-body" style="border-bottom: 1px solid #ccc;">

   @if(session('info'))
 <div style="color: green" class="alert alert-success">


 {{session('info')}}
  </div>
 @endif
<div class="form-group">

{{---------------------}}
<div class="col-sm-3">
<label for="program">
Post Title
</label>
<div class="input-group">
<select class="form-control" name="jobtitle_id" id="jobtitle_id">

@foreach($Jobtitles as $key => $job)
<option style="font-weight: bold;" value="{{$job->jobtitle_id}}">{{$job->job_title}}</option>

@endforeach


</select>
	<div class="input-group-addon">
		<span class="fa fa-plus" id="add-more-jobtitle"></span>
	</div>
</div>

</div>

{{---------------------}}
<div class="col-sm-3">
<label for="level">
School/Department/Section
</label>
<div class="input-group">
<select class="form-control" name="school_id" id="school_id" required>
<option value="">------------------</option>

	@foreach($schools as $key => $s)
<option style="font-weight: bold;" value="{{$s->school_id}}">{{$s->school}}</option>

@endforeach
</select>
	<div class="input-group-addon">
		<span class="fa fa-plus" id="add-more-school"></span>
	</div>
</div>

</div>

{{---------------------}}
<div class="col-sm-3">
<label for="shift">
Job Code
</label>
<div class="input-group">
<select class="form-control" name="jobcode_id" id="jobcode_id">



</select>
	<div class="input-group-addon">
		<span class="fa fa-plus" id="add-more-jobcode"></span>
	</div>
</div>

</div>


{{---------------------}}
<div class="col-sm-3">
<label for="time">
Grade
</label>
<div class="input-group">
<select class="form-control" name="grade_id" id="grade_id" required>
<option value="">------------------</option>

	@foreach($grades as $key => $g)
<option style="font-weight: bold;" value="{{$g->grade_id}}">{{$g->grade}}</option>

@endforeach
</select>

</select>
	<div class="input-group-addon">
		<span class="fa fa-plus" id="add-more-grade"></span>
	</div>
</div>

</div>


{{---------------------}}
<div class="col-sm-3">
<label for="batch">
Requirements
</label>
<div class="input-group">
<textarea class="form-control" id="article-ckeditor"   rows="10" name="post_body" id="post_body">

</textarea>
  @if ($errors->has('post_body'))
                                    <span class="help-block">
                                        <strong style="color: red">{{ $errors->first('post_body') }}</strong>
                                    </span>
                                @endif

</div>

</div>

{{---------------------}}

</div>

</div>
<div class="panel-footer">
<button type="submit" class="btn btn-primary  btn-sm">Create Post</button>
<button type="submit" class="btn btn-success  btn-sm btn-update-post">Update Post</button>




</div>



</form>
	{{--------------------------------}}
	<div class="panel panel-primary">
	<div class="panel-heading">Post Information</div>
	<div class="panel-body" id="add-class-info">

	</div>

	</div>
	{{---------------------------------}}
</section>

</div>

</div>


@endsection

@section('script')
<script type="text/javascript" >

//============================================

      showPostInfo();
//===========================================
	$('#start_date').datepicker({
      changeMonth:true,
      changeYear:true,
      dateFormat: 'yy-mm-dd'

	});
		//===============================================
	$('#jobtitle_id').on('change',function(e){
		showPostInfo();
	})

	//===============================================
	$('#jobcode_id').on('change',function(e){
		showPostInfo();
	})
	//===============================================
	$('#school_id').on('change',function(e){
		showPostInfo();
	})
	//===============================================
	$('#grade_id').on('change',function(e){
		showPostInfo();
	})
	//===============================================



    showPostInfo($('#jobtitle_id').val());
    //=================================================
    $('.btn-update-post').on('click',function(e){
    	e.preventDefault();
    	var data = $('#frm-post-create').serialize();
    	$.post("{{route('updatePost')}}",data,function(data){
    		showPostInfo(data.jobtitle_id);
    	})
    })

    //==============================================
    $(document).on('click','#post-edit',function(data){
    	var post_id = $(this).data('id');
    	$.get("{{route('editPost')}}",{post_id:post_id},function(data){
        $('#jobtitle_id').val(data.jobtitle_id);
        $('#jobcode_id').val(data.jobcode_id);
        $('#grade_id').val(data.grade_id);
        $('#post_body').val(data.post_body);
        $('#post_id').val(data.post_id);



    	})
    })

	//=======================================================
	   $(document).on('click', '.del-post', function(e){
    	post_id = $(this).val();
    	$.post("{{route('deletePost')}}",{post_id:post_id},function(data){
    		  showPostInfo($('#jobtitle_id').val());

    	})
    })



	function showPostInfo()

	{
		var data = $('#frm-post-create').serialize();
		$.get("{{route('showPostInformation')}}", data,function(data){
				$('#add-class-info').empty().append(data);
				MergeCommonRows($('#table-class-info'));
		})

	}



	//===============================================
		$('#frm-grade-create').on('submit',function(e){
		e.preventDefault();
		var data = $(this).serialize();
		var grade = $('#grade_id');
		$.post("{{route('insertGrade')}}",data,function(data){
			$(grade).append($("<option/>",{
				value : data.grade_id,
				text : data.grade
			}))

		})
		$(this).trigger("reset");
	})
	//=====================================
	$('#add-more-grade').on('click',function(e){
		$('#grade-show').modal('show');
	})


		//====================================

	$("#frm-post-create #school_id").on('change',function(e){
		var school_id =$(this).val();
		var jobcode_name = $('#jobcode_id')
		$(jobcode_name).empty();
		$.get("{{route('showJobcode')}}",{school_id:school_id},function(data){
		$.each(data,function(i,l){
			$(jobcode_name).append($("<option/>",{
				value :l.jobcode_id,
				text : l.jobcode_name

			}))
		})
			showPostInfo();
		})
	})
	//====================================

		$('#add-more-jobcode').on('click',function () {
var schools =$('#school_id option');
		var school =$('#frm-jobcode-create').find('#school_id');
		$(school).empty();
		$.each(schools,function(i,pro){
			$(school).append($("<option/>",{
				value : $(pro).val(),
				text : $(pro).text(),

			}))
		})

		$('#jobcode-show').modal();

	});

	//=====================================
	$('#frm-jobcode-create').on('submit',function(e){
		e.preventDefault();
		var data = $(this).serialize();
		var url = $(this).attr('action');
		$.post(url,data,function(data){
		$('#jobcode_id').append($("<option/>",{
				value : data.jobcode_id,
				text : data.jobcode_name
			}))
		})
		$(this).trigger("reset");
	})
	//====================================

	//======================================
		$('#add-more-jobtitle').on('click',function () {
		$('#post-show').modal();

	})

	//=====================================
	$('.btn-save-post').on('click',function(){
		var job_title = $('#new_jobtitle').val();
		var description = $('#new_description').val();
	    $.post("{{route('postInsertJobTitle')}}",{job_title:job_title,description:description},function(data){
			$('#jobtitle_id').append($("<option/>",{
				value : data.jobtitle_id,
				text : data.job_title
			}))
			$('#new_jobtitle').val("");
			 $('#new_description').val("");

		})


	})
	//==============================================
	$('#add-more-school').on('click',function () {
		$('#school-show').modal();

	})

	$('.btn-save-academic').on('click',function(){
		var school = $('#new_school').val();
		$.post("{{route('postInsertSchool')}}",{school:school},function(data){
			$('#new_school').append($("<option/>",{
				value : data.school_id,
				text : data.school
			}))
			$('#new_school').val("");

		})
	})
	//==============================================
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

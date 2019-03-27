<div class="modal fade" id="choose-academic"  role="dialog">
<div class="modal-dialog modal-xs">
<section class="panel panel-default">
<header class="panel-heading">
Choose Post
	
</header>

<form  action="#" class="form-horizontal" method="POST" id="frm-view-course">
{!!csrf_field()!!}
<input type="hidden" name="active" id="active" value="1"></input>
<input type="hidden" name="class_id" id="class_id" ></input>
<div class="panel panel-body"  style="border-bottom: 1px solid #ccc;">

   @if(session('info'))
 <div style="color: green" class="alert alert-success">
    

 {{session('info')}}
  </div>
 @endif
<div class="form-group">

{{---------------------}}
<div class="col-sm-6">
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
<div class="col-sm-6">
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
<div class="col-sm-6">
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
<div class="col-sm-6">
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




</div>
	
</div>

	

	
</form>
	<form action="#" method="GET" id="frm-multi-class">
	<div class="panel panel-default">
	<div class="panel-heading">
	Vacancy Information

	<button type="button" id="btn-go" class="btn btn-info btn-xs pull-right" style="margin-top: 5px;">Go</button>
	</div>
	<div class="panel-body" id="add-class-info" style="overflow-y:auto;height: 250px">
		
	</div>
		
	</div>
	</form>
	{{---------------------------------}}
</section>
	
</div>
	
</div>
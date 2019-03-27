@extends('layouts.app')
@section('title','Student Report')

@section('content')

<style type="text/css">
	caption{
		height: 50px;
		font-size: 20px;
		font-weight: bold;
	}

</style>

{{----------------------}}
<div class="row">
<div class="col-lg-12">
<h3 class="page-header"><i class="fa fa-file-text-o"></i> Applicants List</h3>
<ol class="breadcrumb">
<li><i class="fa fa-home" ></i><a href="#"></a>Home</li>
<li><i class="icon_document"></i>Report</li>
<li><i class="fa fa-file-text-o"></i>Applicant List</li>
	</ol>
</div>

</div>

{{---------------------}}

<div class="panel panel-default">

<div class="panel-heading">
<b><i class="fa fa-windows"></i>Applicant  Information</b>
<a href="#" class="pull-right" id="show-course-info"><i class="fa fa-plus"></i></a>

</div>

<div class="panel-body" style="padding-bottom: 4px;">
<p style="text-align: center; font-size: 20px; font-weight: bold;">Applicant Report</p>
<div class="show-student-info">

</div>

</div>

</div>

@include('postInfo.postPopup')

@endsection

@section('script')
@include('script.postPopup')

<script type="text/javascript">
	     $(document).on('click','#post-edit',function(e){
     	e.preventDefault();

   post_id = $(this).data('id');



   $.get("{{route('showApplicantInfo')}}",{post_id:post_id},function(data){
   $('.show-student-info').empty().append(data);
   })

     })
</script>



@endsection

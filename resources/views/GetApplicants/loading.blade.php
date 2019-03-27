@extends('layouts.app')


	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" />

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<style type="text/css">
body{
	padding: 10px;
}
	.loading{
		position: absolute;
		top: 50%;
		left: 50%;
		display: none;
	}
	.loading-bar{
		display: inline-block;
		width: 4px;
		height: 18px;
		border-radius: 4px;
		animation: loading 1s ease-in-out infinite;
	}
	.loading-bar:nth-child(1){
		background-color: #3498bd;
		animation-delay: 0;
	}
	.loading-bar:nth-child(2){
		background-color: #c0392b;
		animation-delay: 0.09s;

	}
	.loading-bar:nth-child(3){
		background-color: #f1c40f;
		animation-delay: .18s;


	}
.loading-bar:nth-child(4){
	background-color: #27ac60;
		animation-delay: .27s;

}
@keyframes loading{
	0%{
		transform: scale(1);
	}
	20%{
		transform: scale(1,2.2);
	}
	40%{
		transform: scale(1);
	}
}
</style>



<script type="text/javascript">
	$(function () {
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
    });
});
</script>
@section('content')
<div class="container">
<div class="row">
<div class="panel panel-default">
<div class="panel-heading">
<b>Applicant</b>
	
</div>
	<div class="panel-body">
	<div class="form-group">
	<input class="form-control" name="search" id="search"></input>
		
	</div>
	<div class="table-responsive">
	<div class="loading">
	<div class="loading-bar"></div>
		<div class="loading-bar"></div>
			<div class="loading-bar"></div>
		
	</div>
		<table class="table table-hover table-bordered table-condensed">
			<thead>
				<tr>
					<th>ID</th>
					<th>First Name</th>
					<th>Second Name</th>
					<th>School</th>
				</tr>
			</thead>
			<tbody>
				
			</tbody>
		</table>
	</div>
		
	</div>
</div>
	
</div>

<script type="text/javascript">


$('#search').on('keyup',function(){
	var value = $(this).val();
	$('.loading').show();
	$.ajax({
	 	type : 'get',
		url : '{{URL::to('showdata')}}',
		data : {'search':value},
		success:function(data){
			$('tbody').html(data);
			$('.loading').hid();

		}

	});


})
	
</script>

@endsection

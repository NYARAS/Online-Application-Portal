@extends('layouts.app')
@section('content')
@include('RegisteredUsers.popup.addmanagement')

{{----------------------}}
<div class="row">
<div class="col-lg-12">
<h3 class="page-header"><i class="fa fa-file-text-o"></i> Users List</h3>
<ol class="breadcrumb">
<li><i class="fa fa-home" ></i><a href="#"></a>Home</li>
<li><i class="icon_document"></i>Report</li>
<li><i class="fa fa-file-text-o"></i>Users List</li>
	</ol>
</div>

</div>

{{---------------------}}

<div class="panel panel-default">
<div class="panel-body">
<form  method="GET" id="frm-search">
<table>
	<tr>
		<td>
			<input type="search" name="search" class="form-control" placeholder="search"></input>
		</td>
	</tr>
</table>


</form>

</div>

<div class="panel body">
<table class="table table-bordered table-condensed table-striped">

<thead>
	<th>N<sup>0</sup></th>
  <th>User Id</th>
	<th>First Name</th>
	<th>Second Name</th>
	<th>Full Name</th>
	<th>Email</th>
	<th>Gender</th>
	<th>Action </th>
  <th class="text-center" width="150px">
  <a href="#" class="create-modal btn btn-success btn-sm " id="create-management">
  <i class="glyphicon glyphicon-plus"></i>


  </a>
</th>
</thead>

<tbody>
	@foreach($personals as $key => $app)

	<tr>
		<td>{{++$key}}</td>
    <td>{{sprintf("%05d",$app->id)}}</td>
		<td>{{$app -> first_name}}</td>
		<td>{{$app -> second_name}}</td>
		<td>{{$app -> full_name}}</td>
		<td>{{$app -> email}}</td>
		<td>{{$app -> gender}}</td>

		<td>
			<a href="#">Edit</a>
			|
			<a href="#">Delete</a>
		</td>

	</tr>


	@endforeach
</tbody>

</table>

</div>
<div class="footer">

{{ $personals -> render()}}

</div>

</div>



@endsection

@section('script')
<script type="text/javascript" >

//===============================================
$('#frm-management-create').on('submit',function(e){
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
//=====================================
$('#create-management').on('click',function(e){
  $('#management-show').modal('show');
})


  //====================================



@endsection

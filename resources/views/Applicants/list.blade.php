@extends('layouts.app')

@section('content')
<div class="container">
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
<form action="{{url('/sendLetter')}}" method="POST">
 {{ csrf_field() }}
<div class="panel panel-defualt">
<div class="panel-heading">List of Applicants</div>
<div class="panel-body">
<table class="table table-bordered table-condensed table-hover">
	<thead>
		<tr>
			<th>#</th>
				<th>ID</th>
					<th>First Name</th>
						<th>Post Applied</th>
							<th>Email</th>
              <th>Status</th>
		</tr>
	</thead>
	<tbody>
		@foreach($users as $key => $user)
		<tr>
			<td>
				<input type="checkbox" name="id[]" value="{{$user->applicant_id}}" ></input>
			</td>
			<td>{{$user->applicant_id}}</td>
			<td>{{$user->name}}</td>
				<td>{{$user->vacancy}}</td>
					<td>{{$user->email}}</td>
          <td>{{$user->qualified_candidate}}</td>
		</tr>

		@endforeach
	</tbody>
</table>

</div>
	<div class="panel-footer">
		<input type="submit" class="btn btn-primary" value="Issue Interview Letter"></input>
	</div>
</div>
</form>

</div>





@endsection

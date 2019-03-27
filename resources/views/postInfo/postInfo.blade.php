<style type="text/css">
	.academic-detail{
		white-space: normal;
		width: 400px;
	}
	td.del{
		text-align: center;
		width: 50px;
		vertical-align: middle;
	}
	#table-class-info{
		width: 100%;
	}
	table tbody > tr >td{
		vertical-align: middle;
	}
</style>
<table class=" table-striped table-bordered table-condensed table-hover" id="table-class-info">

	<thead>
		<tr>
			<th>School</th>
			<th>Post Title</th>
			<th>Jobcode</th>
		     <th>Grade</th>
		     <th>Post Details</th>
		      <th>Action</th>
		     <th hidden="hidden">Action</th>
		      <th>
		      <input  type="checkbox" id="checkall"></input>

		      </th>


		</tr>
	</thead>
	<tbody>
		@foreach($posts as $key => $p)
		<tr>
			<td>{{$p->school}}</td>
			<td>{{$p->job_title}}</td>
			<td>{{$p->jobcode_name}}</td>
			<td>{{$p->grade}}</td>
			
				<td class="academic-detail">
				<a href="#" data-id="{{$p->post_id}}" id="post-edit">
				School:{{$p->school}} / Jobcode:{{$p->jobcode_name}}  / Post Title: {{$p->job_title}} / Grade: {{$p->grade}}/ Posted On:{{date("d-m-y",strtotime($p->updated_at))}}
				</a>
			</td>
			<td class="del" id="hidden">
				<button class="btn btn-danger btn-sm del-post" value="{{$p->post_id}}" id="del-post">Del</button>

			</td>
			<td>
				<input type="checkbox" name="chk[]" value="{{$p->post_id}}" class="chk"></input>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
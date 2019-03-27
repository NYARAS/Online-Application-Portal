<table class="table table-bordered table-hover table-striped table-condensed" id="applicant-info">


<caption>{{$courses[0] -> vacancy}}</caption>

	<thead>
		<tr>
			<th>#</th>
			<th>Applicant ID</th>
			<th>Name</th>
      <th>Email</th>
      <th>Primary Phone No.</th>
      <th>Date Of Birth</th>
			<th>Marital Status</th>
      <th>Gender</th>

		</tr>
	</thead>

	<tbody>
		@foreach($courses as $key => $c)
		<tr>
			<td>{{ ++$key}}</td>
      <td>{{sprintf("%05d",$p->applicant_id)}}</td>
				<td>{{$p->name}}</td>
        <td>{{$p->email}}</td>
        <td>{{$p->primary_phone_number}}</td>
				<td>{{$p->dob}}</td>
        <td>{{$p ->marital_status}}</td>
        <td>{{$p ->gender}}</td>



		</tr>



		@endforeach
	</tbody>
</table>

<script type="text/javascript">

$(document).ready(function() {
	$('#applicant-info').DataTable({

		  dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
	})
})


</script>

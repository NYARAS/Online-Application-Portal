@extends('layouts.app')
@section('content')

<div class="row">

<div class="col-lg-12">
<h3 class="page-header"><i class="fa fa-file-text-o"></i>Candidates</h3>
<ol class="breadcrumb">
	<li><i class="fa fa-home"></i><a href="#">Home</a></li>
	<li><i class="icon_document_alt"></i>Qualified</li>
	<li><i class="fa fa-file-text-o"></i>View Qualified candidates</li>
</ol>

</div>

</div>


  <div class="row">
  <div class="col-lg-12">

  <section class="panel panel-default">
  <header class="panel-heading">
  Manage Posts

  </header>
  <div class="panel panel-body" style="border-bottom: 1px solid #ccc;">
    <div class="table table-responsive">
      <table class="table table-bordered table-condensed table-striped" id="candidate-info">
                     <tr>
                     <th>S.NO</th>
                     <th>First Name</th>
                     <th>Second Name</th>
                     <th>email</th>
                     <th>Position Appllied for</th>
                     <th>School</th>
                     <th>Job Code</th>
                         <th>Grade</th>

                      <th>Action</th>


                     </tr>

      @if(count($personals)>0)
      	@foreach($personals as $key => $personal)

          <td>{{++$key}}</td>
            <td>{{$personal -> first_name}}</td>
              <td>{{$personal -> second_name}}</td>
                <td>{{$personal -> email}}</td>
              <td>{{$personal -> job_title}}</td>
                  <td>{{$personal -> school}}</td>
                      <td>{{$personal -> jobcode_name}}</td>
                          <td>{{$personal -> grade}}</td>


                <td>
                  <a href="#" class="show-modal btn btn-info btn-sm">
                  <i class="fa fa-eye">show</i>
                  </a>
                  <a href="#" class="edit-modal btn btn-warning btn-sm" id="edit-user">
                    <i class="glyphicon glyphicon-pencil">edit</i>
                  </a>
                  <a href='{{url("/delete/{$personal -> applicant_id}")}}' class="delete-modal btn btn-danger btn-sm" >
                    <i class="glyphicon glyphicon-trash">Delete</i>
                  </a>
                </td>

        </tr>

        @endforeach
        @else
        <p>No vacancy available</p>
            @endif

      </table>
    </div>


  </div>
</section>
</div>


</div>








@endsection

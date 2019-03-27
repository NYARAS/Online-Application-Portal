@extends('layouts.app')
@section('content')

<div class="row">

<div class="col-lg-12">
<h3 class="page-header"><i class="fa fa-file-text-o"></i>Vacancies/Posts</h3>
<ol class="breadcrumb">
	<li><i class="fa fa-home"></i><a href="#">Home</a></li>
	<li><i class="icon_document_alt"></i>Vacancies</li>
	<li><i class="fa fa-file-text-o"></i>View Created Vacancies</li>
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
      <table class="table table-bordered" id="table">
      <tr>
      <th width="150px">No</th>
      <th>Post Title</th>
      <th>School</th>
      <th>Job code</th>
      <th>Grade</th>
      <th>Description/Requirements</th>
      <th>Action</th>


      </tr>

      @if(count($posts)>0)
      	@foreach($posts as $key => $post)

          <td>{{++$key}}</td>
              <td>{{$post -> job_title}}</td>
                  <td>{{$post -> school}}</td>
                      <td>{{$post -> jobcode_name}}</td>
                          <td>{{$post -> grade}}</td>
                          <td>{!!substr($post ->post_body, 0, 100)!!}</td>

                <td>
                  <a href="#" class="show-modal btn btn-info btn-sm">
                  <i class="fa fa-eye">show</i>
                  </a>
									@can('isAdmin')
                  <a href="#" class="edit-modal btn btn-warning btn-sm" id="edit-user">
                    <i class="glyphicon glyphicon-pencil">edit</i>
                  </a>
                  <a href='{{url("/manage/post/delete/{$post->post_id}")}}' class="delete-modal btn btn-danger btn-sm" >
                    <i class="glyphicon glyphicon-trash">Delete</i>
                  </a>
									@endcan
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

@extends('layouts.app')
<style type="text/css">
    .avatar{
        border-radius: 100px;
        max-width: 100px;
    }
      .panel-green > .panel-heading {
        border-color: #5cb85c;
        color: green;
    }

.panel-green {
    border-color: red;
}
            }
.form-group.required .control-label:after {
    color: #ff0000;
    content: "*";

}
.control-label{
    color: green;
}
.lead{
    font-weight: bold;
}

</style>
@section('content')

{{----------------------}}

<div class="row">
<div class="col-lg-12">

<h3 class="page-header"><i class="fa fa-file-text-o"></i>Schools</h3>

<ol class="breadcrumb">
<li><i class="fa fa-home" ></i><a href="#"></a>Home</li>
<li><i class="icon_document"></i>Applicants</li>
<li><i class="fa fa-file-text-o"></i>Update</li>
  </ol>
</div>

</div>


{{---------------------}}



            <div class="panel panel-default">

                <div class="panel-heading" ></div>

                <div class="panel-body">



<table class="table table-bordered table-condensed table-striped" id="candidate-info">
  <thead>


                               <tr>
                               <th>S.NO</th>
                               <th>Name</th>
                               <th>Position Appllied for</th>
                               <th>Job Code</th>
                               <th>School/Dept/Sec</th>
                                   <th>Status</th>

                                <th>Action</th>


                               </tr>

  </thead>
  <tbody>
    @if(count($posts)>0)
    @foreach($posts  as $post)

               <tr>
               <td style="color:black;font-weight: bold;">{{$post->applicant_id}}{{$post->jobcode_name}}</td>
               <td style="color:green;font-weight: bold;">{{$post->first_name}}  {{$post->second_name}}</td>
               <td style="color:black;font-weight: bold;">{{$post->job_title}}</td>
               <td style="color:black;font-weight: bold;">{{$post->jobcode_name}}</td>
               <td style="color:black;font-weight: bold;">{{$post->school}}</td>
               <td style="color:black;font-weight: bold;">{{$post->qualified_candidate}}</td>
                 <td>
                     <a href"#" id="edit-candidate" class="btn btn-primary">View</a>|
                      <a href='{{url("/editcandidates/{$post->applicant_id}")}}' class="btn btn-success">Update</a>|
                       <a href="" class="btn btn-danger">Delete</a>|
                     </td>


               </tr>
               @endforeach
               @else
               <p>No applicant(s) available</p>
                   @endif
  </tbody>
                               </table>
                </div>
                </div>
                        </div>


                                @endsection

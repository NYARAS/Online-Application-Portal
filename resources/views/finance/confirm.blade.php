@extends('layouts.app')
@section('content')

<div class="row">

<div class="col-lg-12">
<h3 class="page-header"><i class="fa fa-file-text-o"></i>PAYMENT CONFIRMATION</h3>
<ol class="breadcrumb">
	<li><i class="fa fa-home"></i><a href="#">Home</a></li>
	<li><i class="icon_document_alt"></i>Applicants</li>
	<li><i class="fa fa-file-text-o"></i>Payment</li>
</ol>

</div>

</div>
{{-------------------------------------}}
<div class="panel panel-default">

    <div class="panel-heading" >Update</div>

    <div class="panel-body">
      @if(session('info'))
    <div style="color: green" class="alert alert-success">


    {{session('info')}}
     </div>
    @endif



<table class="table table-bordered table-condensed table-striped" id="candidate-info">
<thead>


                   <tr>
                   <th>S.NO</th>
                   <th>Name</th>
                   <th>Position Appllied for</th>
                    <th>School/Dept/Sec</th>
                   <th>Transaction Code</th>


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
      <td style="color:black;font-weight: bold;">{{$post->school}}</td>
   <td style="color:black;font-weight: bold;">{{$post->transaction_code}}</td>


   <td style="color:black;font-weight: bold;">{{$post->paid}}</td>
     <td>

          <a href='{{url("/finance/update-payment/{$post->applicant_id}")}}' class="btn btn-success">Verify</a>

         </td>


   </tr>
   @endforeach
   @else
   <p>No applicant(s) available</p>
       @endif

</tbody>
                   </table>




    </div>            </div>

@endsection

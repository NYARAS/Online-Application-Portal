@extends('layouts.app')



        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }
            .wrapper{
                margin: 0 auto;
                width: 120%;
            margin-top: 10px;
            }



        </style>

    @section('content')

    {{----------------------}}
    <div class="row">
    <div class="col-lg-12">
    <h3 class="page-header"><i class="fa fa-file-text-o"></i>Applicants Personal Files</h3>
    <ol class="breadcrumb">
    <li><i class="fa fa-home" ></i><a href="#"></a>Home</li>
    <li><i class="icon_document"></i>Download</li>
    <li><i class="fa fa-file-text-o"></i>Files</li>
    	</ol>
    </div>

    </div>

    {{---------------------}}



      <div class="panel panel-default">
      <div class="panel-heading">
      <b><i class="fa fa-apple"></i>Qualification Files </b>

      </div>
    <div class="panel-body">








      <br>
    <div class="table table-responsive">
    <table class="table table-bordered" id="qualifications-Information">

      <caption>Qualification Information</caption>
    <thead>
        <th>Candidate Name</th>
            <th>Email</th>
            <th>Course Applies</th>
              <th>Campus</th>


        <th>Secondary Certificate</th>
            <th>University Certificate</th>
              <th>Othe Qualifications</th>
                <th>Export</th>


    </thead>
    <tbody>
        @if(count($personals)>0)
    @foreach( $personals as $pe )
        <tr>
        <td>{{$pe -> first_name  }} {{$pe -> second_name  }}</td>
        <td>{{$pe -> email  }}</td>
        <td>{{$pe -> course_name  }}</td>
        <td>{{$pe -> name  }}</td>


        <td><a href="public/storage/secondary_files/{{$pe ->secondary_file}}" download="{{$pe -> secondary_file}}">
           <button type="button" class="btn btn-primary">
           <i class="glyphicon glyphicon-download">Download
           </i>
           </button>
        </a></td>
        <td><a href="public/storage/university_files/{{$pe ->university_file}}" download="{{$pe -> university_file}}">
           <button type="button" class="btn btn-primary">
           <i class="glyphicon glyphicon-download">Download
           </i>
           </button>
        </a></td>
        <td><a href="public/storage/other_qualification_files/{{$pe ->other_qualification_file}}" download="{{$pe -> other_qualification_file}}">
           <button type="button" class="btn btn-primary">
           <i class="glyphicon glyphicon-download">Download
           </i>
           </button>
        </a></td>




        <td>


               <button type="button" class="btn btn-success">
              <a href='{{url("/getpdfexport/{$pe->id}")}}'>Export to Pdf</a>
               </button>


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

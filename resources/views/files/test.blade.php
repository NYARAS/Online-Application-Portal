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
            .avatar{
                border-radius: 50px;
                max-width: 100px;
            }



        </style>

    @section('content')

    {{----------------------}}
    <div class="row">
    <div class="col-lg-12">
    <h3 class="page-header"><i class="fa fa-file-text-o"></i>Personal Information Files</h3>
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
      <b><i class="fa fa-apple"></i>Personal Information Files </b>

      </div>
    <div class="panel-body">



      <br>
    <div class="table table-responsive">
    <table class="table table-bordered" id="qualifications-Information">


    <thead>
        <th>Candidate Name</th>
            <th>Email</th>
            <th>Cover Letter</th>
         <th>Curriculum Vitae</th>
        <th>Applicant Photo</th>

            <th>Export</th>

    </thead>
    <tbody>
        @if(count($qualifications)>0)
    @foreach( $qualifications as $q )
        <tr>
        <td>{{$q -> first_name  }} {{$q -> second_name  }}</td>

      <td>{{$q -> first_name  }} {{$q -> school  }}</td>


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

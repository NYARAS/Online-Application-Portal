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

  
    <section class="panel panel-primary">
    <div class="panel-heading">
    Download Files for Personal Information

    </div>
    <div class="panel-body">
    <div class="table table-responsive">
    <table class="table table-bordered">
    <thead>
        <th>Candidate Name</th>
            <th>Email</th>
         <th>Applied on</th>
        <th>Cover Letter</th>
        <th>Curriculum Vitae</th>
        <th>Photo Image</th>

    </thead>
    <tbody>
    @foreach( $personal as $personals )
        <tr>
        <td>{{$personals -> first_name  }} {{$personals -> second_name  }}</td>
        <td>{{$personals->primary_phone_number}}</td>
      <td>{{date('M j, Y H:i', strtotime($personals->date_applied))}} </td>

                  <td>
                      <a href="public/storage/cover_letters/{{$personals ->cover_letter}}" download="{{$personals -> cover_letter}}">
                         <button type="button" class="btn btn-primary">
                         <i class="glyphicon glyphicon-download">Download
                         </i>
                         </button>
                      </a>
                  </td>
                  <td>
                      <a href="public/storage/curriculum_vitae/{{$personals ->curriculum_vitae}}" download="{{$personals -> curriculum_vitae}}">
                         <button type="button" class="btn btn-primary">
                         <i class="glyphicon glyphicon-download">Download
                         </i>
                         </button>
                      </a>
                  </td>
                  <td>
                      <a href="public/storage/photo_images/{{$personals ->applicant_photo}}" download="{{$personals -> applicant_photo}}">
                         <button type="button" class="btn btn-primary">
                         <i class="glyphicon glyphicon-download">Download
                         </i>
                         </button>
                      </a>
                  </td>

        </tr>
        @endforeach
    </tbody>

    </table>
        </div>

    </div>

    </section>




@endsection

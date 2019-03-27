@extends('layouts.app')

@include('Candidates.editpopup')
@include('Candidates.popup.userpopup')
<style type="text/css">
    .avatar{
     display: block;
      border-radius: 100px;
     margin-left: auto;
     margin-right: auto;
     width: 30%;

    }
    h5{
      margin-left: 350px;
      font-family: Poppins;
      font-weight: bold;
    }
</style>
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
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
            <div class="panel panel-secondary">
                <div class="panel-heading">All Applicants</div>

                <div class="panel-body">
                  <div class="col-md-4">
                  <ul class="list-group">
                      @if(count($schools) >0)
                      @foreach($schools->all() as $school)
                       <li class="list-group-item"><a href='{{url("/personal/applicant/get-personal/{$school->school_id}")}}'>{{$school->school}}</a></li>
                      @endforeach


                      @else
                      <p>No school found!</p>
                      @endif


                  </ul>






                   </div>

                <div class="avatar "><img   src="{{url('public/images/mmu2.jpg')}}" class="avatar" alt="">
                  <h3 style="text-align: center;font-weight: bold;">Maasai Mara University</h3></div>
          <h6 style="margin-left: 350px"><em><strong>Office of Deputy Vice Chancellor (Administration, Finance and Planning)</strong></em></h6>
          <h5><em><strong>Tel: +254 020 5131400, P. O. Box 861 - 20500, Narok, Kenya</strong></em></h5>
                <br>
                <br>
                    <form class="form-horizontal" method="POST" action="">
                        {{ csrf_field() }}
                        <div class="table table-responsive">


 <table class="table table-bordered table-condensed table-striped" id="candidate-info">
                <tr>
                <th>S.NO</th>
                <th>Name</th>
                <th>Position Appllied for</th>
                <th>Job Code</th>
                <th>School/Dept/Sec</th>
                    <th>Status</th>

                 <th>Action</th>


                </tr>

 @foreach($personals as $personal)
<tr>
<td style="color:black;font-weight: bold;">{{$personal->applicant_id}}{{$personal->jobcode_name}}</td>
<td style="color:green;font-weight: bold;">{{$personal->first_name}}  {{$personal->second_name}}</td>
<td style="color:black;font-weight: bold;">{{$personal->job_title}}</td>
<td style="color:black;font-weight: bold;">{{$personal->jobcode_name}}</td>
<td style="color:black;font-weight: bold;">{{$personal->school}}</td>
<td style="color:black;font-weight: bold;">{{$personal->qualified_candidate}}</td>
  <td>
      <a href"#" id="edit-candidate" class="btn btn-primary">View</a>|
       <a href='{{url("/editcandidates/{$personal->applicant_id}")}}' class="btn btn-success">Update</a>|
        <a href="" class="btn btn-danger">Delete</a>|
      </td>


</tr>
                @endforeach

                </table>


</div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
<div class="col-md-12">
  <h1>Get All Users</h1>
</div>

</div>


<div class="row">
  <div class="table table-responsive">
    <table class="table table-bordered" id="table">
    <tr>
    <th width="150px">No</th>
    <th>First Name</th>
    <th>Second Name</th>
    <th>Email</th>
    <th>Gender</th>
    <th class="text-center" width="150px">
    <a href="#" class="create-modal btn btn-success btn-sm ">
    <i class="glyphicon glyphicon-plus"></i>


    </a>
</th>

    </tr>
    {{csrf_field()}}
    <?php  $no=1; ?>
    <?php foreach ($users as $key => $value): ?>
      <tr class="users{{$value->id}}">
        <td>{{$no++}}</td>
        <td>{{$value->first_name}}</td>
              <td>{{$value->second_name}}</td>
                <td>{{$value->email}}</td>
                  <td>{{$value->gender}}</td>
              <td>
                <a href="#" class="show-modal btn btn-info btn-sm">
                <i class="fa fa-eye">show</i>
                </a>
                <a href="#" class="edit-modal btn btn-warning btn-sm" id="edit-user">
                  <i class="glyphicon glyphicon-pencil">edit</i>
                </a>
                <a href="#" class="delete-modal btn btn-danger btn-sm" >
                  <i class="glyphicon glyphicon-trash">Delete</i>
                </a>
              </td>

      </tr>
    <?php endforeach; ?>


    </table>
  </div>
</div>
{{-- form Create User --}}
<div class="modal fade" id="create" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dimiss="modal" name="button">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form">
          <div class="form-group row add">
            <label class="control-label col-sm-2" for="fname">First Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="fname" name="fname" placeholder="Your First Name" required>
              <p class="error text-center alert alert-danger hidden" ></p>

            </div>

          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="sname">Second Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="sname" name="sname" placeholder="Your Second Name" required>
              <p class="error text-center alert alert-danger hidden" ></p>

            </div>

          </div>

        </form>

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success" id="add" >
          <span class="glyphicon glyphicon-plus"></span>Save User
        </button>
        <button type="button" class="btn btn-warning" data-dimiss="modal" >
          <span class="glyphicon glyphicon-remove"></span>Close
        </button>
      </div>
    </div>

  </div>

</div>


@endsection

@section('script')
<script type="text/javascript">
$('#edit-candidate').on('click',function () {
  $('#candidate-show').modal();

})

//---------------------Edit Users---------------------------
$('#edit-user').on('click',function () {
  $('#user-show').modal();

})

</script>


@endsection

@extends('layouts.header')
@section('content')
<style type="text/css">

@import url('https://fonts.googleapis.com/css?family=Spicy+Rice');
@import url('https://fonts.googleapis.com/css?family=Roboto');
@import url('https://fonts.googleapis.com/css?family=Lato:700');
@import url('https://fonts.googleapis.com/css?family=Poppins');
@import url('https://fonts.googleapis.com/css?family=Anton');
body{
  background: white;
  font-family: 'Roboto', sans-serif;
}
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
p{

font-family: 'Roboto', sans-serif;
  font-size: 18px;
  font-weight: bold;

}
h4,h3,h5{
  color: red;
font-family: 'Poppins', sans-serif;
}

hr{
  width: 100%;
  margin-right: 0;
  margin-left: 0;
  padding: 0;
  margin-top: 5px;
  margin-bottom: 20px;
  border:0 none;
  border-top: 1px solid #322f32;
  background: none;
  height: 0;

}

</style>

<div class="col-lg-6" id="conversation-content">
    <div id="scroll">
        <div ui-view="conversation-content"></div>
    </div>
</div>

<div class="container">
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
    <div class="row">
        <div class="col-md-12">


                    <div class="row">


<div class="col s6">
      <form  method="POST" action="{{url('/search') }}">
                        {{ csrf_field() }}
                        <div class="input-field">

                        <input type="text" name="search" class="white grey-text autocomplete" id="autocomplete-input" placeholder="Search for........">

                        <span class="input-group-btn">


                        </span>


                        </div>

 </form>
</div>









               <div class="col s4">
                 <div class="row">




<p>Master in Computer Science Courses</p>
<hr>
@foreach($course->all() as $c)
<h5 style="color: green; ;">{{$c ->course_name}}</h5>
<h6>{!!substr($c ->course_body, 0, 100)!!}</h6>


     @endforeach

















</div>
                </div>

                <div class="col s8">
                <p style="color: green">Maasai Mara University wishes to invite qualified candidates to apply for the following master degree courses. Intake is open for all the courses. Please read all the requirements for each course before applying</p>
                @if(count($course)>0)
                @foreach($course ->all() as $c)
                <h5>{{$c -> course_name}}</h5>

                <p style="color: black;font-weight:200px;text-align: left;">{!!($c ->course_body)!!}</p>
                <ul class="nav nav-pills">

                <a href='#' class="btn btn-primary btn-xs">
                    <span class="fa fa-eye">View</span>
                </a>|<a href='{{url("/admission/{$c->id}")}}' class="btn btn-success btn-xs "><span class="glyphicon glyphicon-save">Apply</span></a>













                </ul>
                <br>
                <br>
               <cite style="float:  left; margin-top:13px">Posted on:{{date('M j, Y H:i', strtotime($c->updated_at))}}</cite>
                <hr>
                <br>



                @endforeach
                @else
                <p>No vacancy available</p>
                    @endif



                </div>

                </div>
                        </div>

                                </div>







@endsection


@section('script')
<script type="text/javascript">

const ac = document.querySelector('.autocomplete');
M.Autocomplete.init(ac,{

  data: {
    "Senior Lecturer":null,
      "Assistant Lecturer":null,
        "Graduate Lecturer":null,
          "Tutorial Fellow":null,
  }

});

</script>
@endsection

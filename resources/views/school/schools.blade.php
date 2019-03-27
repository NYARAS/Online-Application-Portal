@extends('layouts.header')
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
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"  style="color:red;font-weight: bold; text-align: center;">Post view<h3 style="font-weight: bold;"></h3></div>

                <div class="panel-body">


               <div class="col-md-4">
               <ul class="list-group">
                   @if(count($schools) >0)
                   @foreach($schools->all() as $school)
                    <li class="list-group-item"><a href='{{url("school/{$school->school_id}")}}'>{{$school->school}}</a></li>
                   @endforeach


                   @else
                   <p>No school found!</p>
                   @endif

               </ul>






                </div>
                <div class="col-md-8">
                     @if(count($posts)>0)
                @foreach($posts ->all() as $post)
                <h4 style="color: red; font-weight: bold;">{{$post ->job_title}}</h4>
                <p style="color: black;font-weight:200px;text-align: left;">{!!$post ->post_body!!}</p>

                <hr>
                @endforeach
                @else
                <p>No vacancy available</p>
                    @endif
                </div>
                </div>
                </div>
                        </div>
                                </div></div>

                                @endsection

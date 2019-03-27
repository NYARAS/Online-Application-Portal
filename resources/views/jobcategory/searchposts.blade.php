@extends('layouts.header')
@section('content')
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

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
<div class="col-md-4">
   Online Application Dashboard
</div>
<div class="col s6">
      <form class="form-horizontal" method="POST" action="{{url('/search') }}">
                        {{ csrf_field() }}
                        <div class="input-field">
                        <input type="text" name="search" class="white grey-text autocomplete" id="autocomplete-input" placeholder="Search for........">



                        </div>

 </form>
</div>
                </div>



</div>
                <div class="panel-body">
                    @if (session('info'))
                        <div class="alert alert-success">
                            {{ session('info') }}
                        </div>
                    @endif
                     @if(!empty($profile))

               <div class="col-md-4">
                  <img src="{{$profile->profile_pic}}" class="avatar" alt="">
                @else
                <div class="col-md-4">
                  <img src="{{url('public/images/unnamed.png')}}" class="avatar" alt="">


                @endif
                 @if(!empty($profile))

             <p  style="font-weight: bold;" class="lead">{{$profile->username}}</p>
                @else


  <p class="lead"></p>
                @endif

<p style="font-weight: bold; font-style: italic;">{{ Auth::user()->email }}</p>
                </div>
                <div class="col-md-8">
                <p style="color: green">Maasai Mara University wishes to invite qualified and dedicated applicants to fill the following vacant positions.</p>
                @if(count($posts)>0)
                @foreach($posts ->all() as $post)
                <h4 style="color: red; font-weight: bold;">{{$post ->job_title}}</h4>
                <p style="color: black;font-weight:200px;text-align: left;">{!!substr($post ->post_body, 0, 150)!!}</p>
                <ul class="nav nav-pills">
                <li role="presentation">
                <a href='{{url("/view/{$post->post_id}")}}'>
                    <span class="fa fa-eye">View</span>
                </a>

                </li>
                @if(Auth::id() == 1)

  <li role="presentation">
                <a href='{{url("/edit/{$post->post_id}")}}'>
                    <span class="fa fa-pencil-square-o">Edit</span>
                </a>

                </li>
                 <li role="presentation">
                <a href='{{url("/delete/{$post->post_id}")}}'>
                    <span class="fa fa-trash">Delete</span>
                </a>

                </li>
                @endif





                </ul>
               <cite style="float: left;">Posted on:{{date('M j, Y H:i', strtotime($post->updated_at))}}</cite>
                <hr>
                @endforeach
                @else
                <p>No vacancy available</p>
                    @endif



                </div>
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

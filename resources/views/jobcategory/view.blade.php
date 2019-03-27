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
        max-width: 50px;
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

font-family: 'Poppins', sans-serif;
  font-size: 18px;
  font-weight: bold;

}
h4,h3,h5{
  color: red;
font-family: 'Poppins', sans-serif;
}

</style>

<div class="container">
    <div class="row">
        <div class="col s12">

    @if(session('info'))
 <div style="color: green" class="alert alert-success">


 {{session('info')}}
  </div>
 @endif



               <div class="col s4">
               <ul class="list-group">
                   @if(count($schools) >0)
                   @foreach($schools->all() as $school)
                    <li class="list-group-item" style="font-family: 'Poppins', sans-serif;"><a href='{{url("school/{$school->school_id}")}}'>{{$school->school}}</a></li>
                   @endforeach


                   @else
                   <p>No school found!</p>
                   @endif


               </ul>






                </div>
                <div class="col s8">


                     @if(count($posts)>0)
                @foreach($posts ->all() as $post)
                <h4 >{{$post ->post_title}}</h4>
                <p>{!!$post ->post_body!!}</p>
                <ul class="nav nav-pills">
                <li role="presentation">
                <a href='{{url("/like/$post->post_id")}}'>
                    <span class="fa fa-thumbs-up">Like({{$likeCtr}}) </span>
                </a>

                </li>
                 <li role="presentation">
                <a href='{{url("/dislike/$post->post_id")}}'>
                    <span class="fa fa-thumbs-down">Dislike({{$dislikeCtr}})</span>
                </a>

                </li>
                 <li role="presentation">
                <a href='#'>
                    <span class="fa fa-comment-o">Comment</span>
                </a>

                </li>

                </ul>

                <hr>
                @endforeach
                @else
                <p>No vacancy available</p>
                    @endif
                      <form class="form-horizontal" method="POST" action='{{url("/comment/{$post->post_id}")}}'>
                        {{ csrf_field() }}
                        <div class="form-group">
                        <textarea id="comment" rows="5" type="text" class="form-control" name="comment"required autofocus>
                                </textarea>
                                @if ($errors->has('comment'))
                                    <span class="help-block">
                                        <strong style="color: red">{{ $errors->first('comment') }}</strong>
                                    </span>
                                @endif
                                </div>
                                <div class="form-group">
                                <button type="submit" class="btn btn-success btn-lg btn-block">
                                    Post Comment
                                </button>

                                </div>


                        </form>
                        <div class="row">
                        <h4 style="color: green; font-family: Poppins">Comments</h4>
                                       @if(count($comments)>0)
                @foreach($comments ->all() as $comment)
                        <div class="col-xs-7">
                        <ul class="media-list">
                        <li class="media">
                        <div class="media-left">
                               @if(!empty($profile))


                  <img src="{{$profile->profile_pic}}" class="avatar" alt="">
                @else

                  <img src="{{url('public/images/unnamed.png')}}" class="avatar" alt="">


                @endif
                        </div>
                        <div class="media-body">
                          <h5 class="media-heading" style="font-weight: bold;">{{$comment->first_name}}  <small>  <cite>{{date('M j, Y H:i', strtotime($comment->updated_at))}}</cite></small></h5>
                           <p style="font-style: italic;">{{$comment->comment}}</p>
                        </div>

                        </li>
                         <hr>
                        </ul>

                        </div>

                                   @endforeach
                @else
                <p>No comments available</p>
                    @endif
                        </div>



                </div>

                </div>
                        </div>
                                </div></div>

                                @endsection

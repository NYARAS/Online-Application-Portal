@extends('layouts.header')
@section('content')
<style type="text/css">
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

</style>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

    @if(session('info'))
 <div style="color: green" class="alert alert-success">


 {{session('info')}}
  </div>
 @endif
            <div class="panel panel-default">
                <div class="panel-heading"  style="color:red;font-weight: bold; text-align: center;">Maasai Mara University<h3 style="font-weight: bold;"></h3></div>

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
                <h4 style="color: red; font-weight: bold;">{{$post ->post_title}}</h4>
                <p style="color: black;font-weight:200px;text-align: left;">{!!$post ->post_body!!}</p>
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
                        <textarea id="comment" rows="7" type="text" class="form-control" name="comment"required autofocus>
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
                        </div>
                                </div></div>

                                @endsection

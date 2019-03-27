@extends('layouts.header')
@section('content')
<style type="text/css">
    .avatar{
     display: block;
      border-radius: 100px;
     margin-left: auto;
     margin-right: auto;
     width: 40%;

    }
</style>

<div class="container">
    <div class="row">

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
                <div class="panel-heading" style="font-style: Poppins; color: Black;text-align: center;"><strong>Welcome to Maasai Mara University Online Job Application Portal.</strong></div>

                <div class="panel-body">
                <div class="avatar"><img   src="{{url('public/images/mmu2.jpg')}}" class="avatar" alt=""></div>
                                    <div class="col-md-12">
    <div class="form-group">
        <h4 style="color:forestgreen">How To Apply</h4>
      <ul  class="list-group" style="list-style:disc; text-align:left;font-size:x-large">



  <li class="list-group-item list-group-item-primary" style="color:black">All the information you give during registration will be used as your personal information</li>
  <li class="list-group-item list-group-item-secondary" style="color:black">The aplication consist of 6 parts which you have to fill all and give all the documents required either in <strong>pdf,png,doc,docx</strong>. All the documents provided are for safe and secure.</li>
  <li class="list-group-item list-group-item-secondary" style="color:black">You are not suppused to apply for another post after the first application else all of them will automatically be cancelled</li>
  <li class="list-group-item list-group-item-secondary" style="color:black">Your password should be 8 characters long with atleast one letter</li>


</ul>
        </div>
    </div>
                <br>
                <br>

<div class="form-group">
  @if(count($terms)>0)


                 @foreach($terms as $t)

  <a href="#" >Apply for admission</a>


@endforeach

@else
  <a href="#" >Apply for admission</a>
  <a href="{{route('personal')}}">Apply for job</a>
@endif
</div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

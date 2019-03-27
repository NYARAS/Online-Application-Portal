@extends('layouts.app')
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
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-secondary">
                <div class="panel-heading" style="font-style: Poppins; color: Black;text-align: center;"><strong>Welcome to Maasai Mara University Online Job Application Portal.</strong></div>

                <div class="panel-body">
                <div class="avatar"><img   src="{{url('public/images/mmu2.jpg')}}" class="avatar" alt="">   <h3 style="text-align: center;font-weight: bold;">Maasai Mara University</h3></div>
                        <h6 style="margin-left: 350px"><em><strong>Office of Deputy Vice Chancellor (Administration, Finance and Planning)</strong></em></h6>
          <h5><em><strong>Tel: +254 020 5131400, P. O. Box 861 - 20500, Narok, Kenya</strong></em></h5>

                                    <div class="col-md-12">
    <div class="form-group">
        <h4 style="color:forestgreen">How to Register and Apply</h4> 
      <ul  class="list-group" style="list-style:disc; text-align:left;font-size:x-large">
  

  
  <li class="list-group-item list-group-item-primary" style="color:black">All the information you give during registration will be used as your personal information. Make sure you give correct information </li>
  <li class="list-group-item list-group-item-secondary" style="color:black">The aplication consist of 6 parts which you have to fill all and give all the documents required either in <strong>pdf,png,doc,docx</strong>. All the documents provided are for safe and secure.</li>
  <li class="list-group-item list-group-item-secondary" style="color:black">You are not suppused to apply for another post after the first application else all of them will automatically be cancelled</li>
  <li class="list-group-item list-group-item-secondary" style="color:black">Your password should be 8 characters long with atleast one letter</li>
 
 
</ul>
        </div>
    </div>
                <br>
                <br>

                 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

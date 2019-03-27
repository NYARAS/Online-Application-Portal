<div class="modal fade modal-lg" id="publication-show"   role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">


<div class="modal-dialog modal-lg">
<div class="modal-content">
  <form action="#" method="POST" enctype="multipart/form-data" id="register_form" data-toggle="validator">
        {!!csrf_field()!!} {{method_field('POST')}}
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title"></h4>

</div>

<div class="modal-body">
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

<input type="hidden" id="id" value="id">
<br>

  <div class="panel panel-default">
  <div class="panel-heading">
  <b><i class="fa fa-apple"></i>Publications and Conferences </b>

  </div>




  <div class="panel panel-body" style="padding-bottom: 10px; margin-top: 0;">

<div class="row">
  <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

<div class="col s4 input-field">
  <i class="material-icons prefix"></i>
  <input  value="" name="number_of_journals" id="number_of_journals" type="number"  class="validate">
  <label for="number_of_journals" class="active  control-label " >Number of Journals Published</label>

</div>
<div class=" form-group required col-md-6">
  <label for="levelofeducation" class="control-label">
    Attach List
  </label>
<input type="file" name="list_of_journals" id="list_of_journals" class="form-control" placeholder="Level of education e.g Certificate" >

<span class="help-block with-errors"></span>


</div>



<br>
</div>

<div class="row">


<br>
<div class=" form-group required col-md-6">
  <label for="yearofcompletion" class="control-label">
Number of Books Published
  </label>
<input type="text" name="number_of_books" id="number_of_books" class="form-control" placeholder="dd/mm/yyyy"></input>


</div>

<div class=" form-group required col-md-6">
  <label for="attachfile" class="control-label">
    Attach List
  </label>
<input type="file" name="list_of_books" id="list_of_books" class="form-control" placeholder="please attach file"></input>


</div>

</div>
<br>
</div>
</div>

<div class="panel panel-default">
<div class="panel-heading">
<b><i class="fa fa-apple"></i>Referees </b>

</div>




<div class="panel panel-body" style="padding-bottom: 10px; margin-top: 0;">

<div class="row">

<div class=" form-group required col-md-6">
<label for="nameoftheinstitution" class="control-label">
  Name Of Referee
</label>
<input type="text" name="name_of_referee" id="name_of_referee" class="form-control" placeholder="Name of referee" required></input>
<span class="help-block with-errors"></span>

</div>
<div class=" form-group required col-md-6">
<label for="levelofeducation" class="control-label">
Attach Recommendation Letter
</label>
    <input type="file" name="recommendation_letter" id="recommendation_letter" class="form-control"  required autofocus></input>
<span class="help-block with-errors"></span>


</div>

<br>
</div>


</div>
<br>
</div>
</div>

<div class="modal-footer">


  <button type="submit"  class="btn btn-info btn-sm">Save</button>
<button data-dismiss="modal" class="btn btn-default" type="button">Close</button>

</div>
	</form>
</div>

</div>

</div>
</div>
</div>
</div>

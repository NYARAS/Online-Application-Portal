<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="modal fade" id="post-show" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title">Job Title</h4>
	
</div>
<div class="modal-body">
<div class="row">
<div class="col-sm-12">
<input type="text" name="job_title" id="new_jobtitle" class="form-control" placeholder="job title"></input>
	
</div>
	
</div>
<br>
<div class="row">
<div class="col-sm-12">
<input type="text" name="description" id="new_description" class="form-control" placeholder="post  description"></input>
	
</div>
	
</div>
	
</div>
<div class="modal-footer">
<button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
	<button class="btn btn-success btn-save-post" type="button">Save</button>
</div>
	
</div>
	
</div>
	
</div>
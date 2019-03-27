<script type="text/javascript">
			//===============================================
	$('#jobtitle_id').on('change',function(e){
		showPostInfo();
	})
	
	//===============================================
	$('#jobcode_id').on('change',function(e){
		showPostInfo();
	})
	//===============================================
	$('#school_id').on('change',function(e){
		showPostInfo();
	})
	//===============================================
	$('#grade_id').on('change',function(e){
		showPostInfo();
	})
	//===============================================

	



    	//====================================
	
	$("#frm-view-course #school_id").on('change',function(e){
		var school_id =$(this).val();
		var jobcode_name = $('#jobcode_id')
		$(jobcode_name).empty();
		$.get("{{route('showJobcode')}}",{school_id:school_id},function(data){
		$.each(data,function(i,l){
			$(jobcode_name).append($("<option/>",{
				value :l.jobcode_id,
				text : l.jobcode_name

			}))
		})
			showPostInfo();
		})
	})
	//====================================

	//===========================================
$('#show-course-info').on('click',function(e){
	e.preventDefault();
	showPostInfo();
	$('#choose-academic').modal('show');
})
//===================================================

function showPostInfo()

	{
		var data = $('#frm-view-course').serialize();
		$.get("{{route('showPostInformation')}}", data,function(data){
				$('#add-class-info').empty().append(data);
				$('td#hidden').addClass('hidden');
				$('th#hidden').addClass('hidden');
		})
	
	}

	
	
	//===============================================
</script>
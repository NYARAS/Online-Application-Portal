@if(session('success'))
<div style="color: green" class="alert alert-success">
{{session('success')}}
</div>

@endif
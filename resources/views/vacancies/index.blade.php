@extends('layouts.app')

@section('content')


<h3>Vacancies</h3>
 <div class="row">
 <div class="col-md-12 col-lg-12">
 @if(session('info'))
 <div style="color: green" class="alert alert-success">
 	

 {{session('info')}}
  </div>
 @endif
 </div>
 </div>
@if(count($vacancies)> 0)
@foreach($vacancies as $vacancy)
<div class="well">
<h3><a href="{{url("/vacancies/{$vacancy->id}")}}">{{$vacancy -> title}}</a></h3>
<small>Posted on {{$vacancy -> created_at}}</small>

</div>

@endforeach
{{$vacancies->links()}}
@else

<p>No vacancy available</p>
@endif
@endsection
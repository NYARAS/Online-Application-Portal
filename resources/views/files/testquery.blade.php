

@if(count($qualifications)>0)
@foreach( $qualifications as $qu )



<h3>{{$qu -> first_name}}</h3>
<h3>{{$qu -> academic_level}}</h3><h3>{{$qu -> institution_name}}</h3>

@endforeach
@endif


@if(count($data)>0)
@foreach( $data as $q )

<h3>{{$q -> number_of_books}}</h3>

<h3>{{$q -> first_name}}</h3>
<h3>{{$q -> first_name}}</h3>

@endforeach
@endif

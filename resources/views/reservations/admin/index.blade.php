@extends('layouts.app')

@section('content')



<table class="table table-striped table-bordered">
   <thead>
    <tr>
        <td>Name</td>
        <td>Phone</td>
        <td>Persons</td>
        <td>Date</td>
        <td>Time</td>
        <td>Actions</td>
    </tr>
	</thead>
	<tbody>
	    @foreach($rez as $rezerv)
	    <tr>
	        <td>{{$rezerv->name}}</td>
	        <td>{{$rezerv->phone}}</td>
	        <td>{{$rezerv->persons}}</td>
	        <td>{{$rezerv->date}}</td>
	        <td>{{$rezerv->time}}</td> 
	        <td><a class="btn btn-small btn-info" href="{{ route('reservation.edit', $rezerv->id)}}">Edit</a>
		    {!! Form::open(['route' => ['reservation.destroy', $rezerv->id], 'method' => 'DELETE']) !!}
		    {!! Form::submit('Delete', array('class' => 'btn btn-warning')) !!}
		    {!! Form::close() !!} </td>
	    @endforeach
	</tbody>
</table>

@endsection('content')
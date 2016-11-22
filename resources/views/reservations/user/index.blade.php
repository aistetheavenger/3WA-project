@extends('layouts.app')

@section('content')

@if

<p>Table booked succesfuly!</p>
	@foreach ($rez as $rezerv)
		{{ $rezerv->name }}
		{{ $rezerv->phone }}
		{{ $rezerv->persons }}
		{{ $rezerv->date }}
		{{ $rezerv->time }}
	@endforeach



@endsection('content')
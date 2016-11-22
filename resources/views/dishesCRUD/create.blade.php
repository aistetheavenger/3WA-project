@extends('layouts.app')


@section('content')

@include('partials.errors', ['errors'=>$errors])

    <nav class="navbar navbar-inverse">
        <ul class="nav navbar-nav">
            <li class="btn btn-small btn-danger">Admin mode</li>
            <li><a href="{{ URL::to('dishes') }}">View All Dishes</a></li>
            <li><a href="{{ URL::to('dishes/create') }}">Create Dish</a>
        </ul>
    </nav>


    {!! Form::open([
        'route' => 'dishes.store',
        'method' => 'POST',
        'files'=>true
    ]) !!}


    <div class="form-group">
        {{ Form::label('title', 'Title:') }}
        {{ Form::text('title', null, ['required' => 'required']) }}
    </div>

    <div class="form-group">
        {{ Form::label('photo', 'Photo:') }}
        {{ Form::file('photo' ) }}

    </div>

    <div class="form-group">
        {{Form::label('description', 'Description:', ['class' => 'control-label']) }}
        {{ Form::textarea('description', null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('price', 'Price:') }}
        {{ Form::text('price', null, ['required' => 'required']) }}
    </div>




    {{ Form::submit('Create', array('class' => 'btn btn-primary')) }}
    {{ Form::close() }}

@endsection



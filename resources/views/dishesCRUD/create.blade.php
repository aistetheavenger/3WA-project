@extends('layouts.app')


@section('content')

@include('partials.errors', ['errors'=>$errors])



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



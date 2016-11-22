@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Book a table</div>
                    <div class="panel-body">
                    <form class="form-horizontal">


                       {{-- {{Form::text(name), Auth::guest ?"": Auth::where()->name}} --}}

                       {{--  {!! Form::model([
                       'route' => 'dishes.store',
                       'method' => 'POST',
                       'files'=>true
                       ]) !!}  --}}





                    <div class="form-group">
                        {{ Form::label('name', 'Name:') }}
                        {{ Form::text('name', null, ['class'=>'form-control','required' => 'required']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('phone', 'Phone:') }}
                        {{ Form::text('phone', null, ['class'=>'form-control','required' => 'required']) }}
                    </div>

                    <div class="dropdown">
                        {{ Form::label('persons', 'Table for:') }}
                        {{ Form::selectRange ( 'quantity', 1, 10, 1, ['class'=>'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('date', 'Date:') }}
                        {{ Form::date('date', null, ['class'=>'form-control','required' => 'required']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('time', 'Time:') }}
                        {{ Form::time('time', null, ['class'=>'form-control','required' => 'required']) }}
                    </div>

                    {{ Form::submit('Book!', array('class' => 'btn btn-primary')) }}
                    {{ Form::close() }}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection('content')







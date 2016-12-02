@extends('layouts.app')

@section('content')


@include('partials.errors', ['errors'=>$errors])

{!! Form::model($rez, array('route' =>array ('reservation.update', $rez->id),'method' => 'PUT')) !!}
    <div class="row">
        <div class="col-md-12 text-center"> 
             <div class="form-group">
                {{ Form::label('name', 'Name:', ['class' => 'control-label col-md-4']) }}
                <div class="col-md-6">
                    {{ Form::text('name', null, ['class'=>'form-control','required' => 'required']) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('phone', 'Phone:', ['class' => 'control-label col-md-4']) }}
                <div class="col-md-6">
                    {{ Form::text('phone', null,['class'=>'form-control','required' => 'required']) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('persons', 'Table for:', ['class' => 'control-label col-md-4']) }}
                <div class="col-md-6">
                    {{ Form::selectRange ( 'persons', 1, 10, 1, ['class'=>'form-control']) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('date', 'Date:', ['class' => 'control-label col-md-4']) }}
                <div class="col-md-6">
                    {{ Form::date('date', null, ['class'=>'form-control','required' => 'required']) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('time', 'Time:', ['class' => 'control-label col-md-4']) }}
                <div class="col-md-6">
                    {{ Form::time('time', null, ['class'=>'form-control','required' => 'required']) }}
                </div>
            </div>
            <div class="form-group">
                <div class=" col-md-6 col-md-offset-4">
                    {{ Form::submit('SAVE', array('class' => 'btn btn-primary form-control')) }}
                </div>
            </div>
        </div>
    </div>
{{ Form::close() }}

@endsection('content')
@extends('layouts.app')

@section('content')

@include('partials.errors', ['errors'=>$errors])

<div class="bg-rez">
    <img src="{{$url = asset('/images/slide-index-04.jpg')}}">
</div>

<div class="container ">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">Book a table</div>
                <div class="panel-body">
                @if (session('message'))
                    <div class="alert alert-success">
                    {{session('message')}}
                    </div>
                @endif

                 {!! Form::open([
                 'route' => 'reservation.store',
                 'method' => 'POST',
                 'class'=> 'form-horizontal'
                 ]) !!}

                 <div class="form-group">
                    {{ Form::label('name', 'Name:', ['class' => 'control-label col-md-4']) }}
                    <div class="col-md-6">
                        {{ Form::text('name', $userName, ['class'=>'form-control','required' => 'required']) }}
                    </div>
                </div>


                <div class="form-group">
                    {{ Form::label('phone', 'Phone:', ['class' => 'control-label col-md-4']) }}
                    <div class="col-md-6">
                        {{ Form::text('phone', $userPhone, ['class'=>'form-control','required' => 'required']) }}
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
                        {{ Form::submit('Book!', array('class' => 'btn btn-primary form-control')) }}
                    </div>
                </div>
                {{ Form::close() }}
            </form>
        </div>
    </div>
</div>
</div>
@endsection('content')







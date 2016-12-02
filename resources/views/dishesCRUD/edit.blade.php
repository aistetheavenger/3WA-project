@extends('layouts.app')


@section('content')



@include('partials.errors', ['errors'=>$errors])


{!! Form::model($dishes, array('route' =>array ('dishes.update', $dishes->id),'method' => 'PUT', 'files'=>true)) !!}
    <div class="row">
        <div class="col-md-12 text-center"> 
            <table class="table table-bordered">
                <tr>
                    <td><div class="form-group">
                        {{ Form::label('photo', 'Photo:') }}
                        <img class="img-responsive" width="100" height="100" alt="dish image" src="{{$dishes->getPhotoUrl() }}" >
                        {{ Form::file('photo' ) }}
                    </div></td>

                    <td><div class="form-group">
                        {{ Form::label('title', 'Title:') }}
                        {{ Form::text('title', null, ['required' => 'required']) }}
                    </div></td>

                    <td><div class="form-group">
                        {{Form::label('description', 'Description:', ['class' => 'control-label']) }}
                        {{ Form::textarea('description', null, ['class' => 'form-control']) }}
                    </div></td>

                    <td><div class="form-group">
                        {{ Form::label('price', 'Price:') }}
                        {{ Form::text('price', null, ['required' => 'required']) }}
                    </div></td>

                    <td><div class="form-group">
                        {{ Form::submit('Update', array('class' => 'btn btn-primary')) }}
                        {{ Form::close() }}
                        </div></td>
                </tr>
            </table>
        </div>
    </div>
@endsection

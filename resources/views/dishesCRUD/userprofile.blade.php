@extends('layouts.app')

@section('content')



@include('partials.errors', ['errors'=>$errors])

{!! Form::model($users, array('route' =>array ('users.profile.update', $users->id),'method' => 'POST')) !!}
    <div class="row">
        <div class="col-md-12 text-center"> 
            <table class="table table-bordered">
                <tr>
                    <td><div class="form-group">
                        {{ Form::label('name', 'Name:') }}
                        {{ Form::text('name', null, ['required' => 'required']) }}
                    </div></td>

                    <td><div class="form-group">
                        {{ Form::label('surname', 'Surname:') }}
                        {{ Form::text('surname', null, ['required' => 'required']) }}
                    </div></td>

                    <td><div class="form-group">
                        {{ Form::label('email', 'Email:') }}
                        {{ Form::text('email', null, ['required' => 'required']) }}
                    </div></td>                  

                    <td><div class="form-group">
                        {{ Form::label('phone', 'Phone:') }}
                        {{ Form::text('phone', null, ['required' => 'required']) }}
                    </div></td>     

                    <td><div class="form-group">
                        {{ Form::label('address', 'Address:') }}
                        {{ Form::text('address', null, ['required' => 'required']) }}
                    </div></td>     

                    <td><div class="form-group">
                        {{ Form::label('city', 'City:') }}
                        {{ Form::text('city', null, ['required' => 'required']) }}
                    </div></td>   
                </tr>

                <tr>
                    <td><div class="form-group">
                        {{ Form::label('zip', 'Zip:') }}
                        {{ Form::text('zip', null, ['required' => 'required']) }}
                    </div></td> 

                    <td><div class="form-group">
                        {{ Form::label('country', 'Country:') }}
                        {{ Form::text('country', null, ['required' => 'required']) }}
                    </div></td> 

                    <td><div class="form-group">
                        {{ Form::label('birthdate', 'Birthdate:') }}
                        {{ Form::text('birthdate', null, ['required' => 'required']) }}
                    </div></td> 

                    <td><div class="form-group">
                        {{ Form::label('password', 'New Password:') }}
                        {{ Form::text('password', '', ['required' => 'required']) }}
                    </div></td> 

                    <td><div class="form-group">
                        {{ Form::label('password', 'Confirm New Password:') }}
                        {{ Form::text('password', '', ['required' => 'required']) }}
                    </div></td>                     

                    <td><div class="form-group">
                        {{ Form::submit('Update', array('class' => 'btn btn-primary')) }}
                    </div></td>
                </tr>
            </table>
        </div>
    </div>
{{ Form::close() }}
@endsection
@extends('layouts.app')

@section('content')



<table class="table table-striped table-bordered">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Surname</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Address</th>
        <th>City</th>
        <th>Zip</th>
        <th>Country</th>
        <th>Birthdate</th>
        <th>is admin</th>
        <th>Action</th>
    </tr>
    @foreach($users as $user)
        <tr>
            <td>{{ $user->id}}</td> 
            <td>{{ $user->name}}</td>  
            <td>{{ $user->surname}}</td>    
            <td>{{ $user->email}}</td>
            <td>{{ $user->phone}}</td>
            <td>{{ $user->address}}</td>
            <td>{{ $user->city}}</td>
            <td>{{ $user->zip}}</td>
            <td>{{ $user->country}}</td>
            <td>{{ $user->birthdate}}</td> 
            <td> 
                @if ($user->isAdmin())
                   is admin
                @else
                    not admin
                @endif
            </td> 
                @if ($user->id != Auth::user()->id)
                    <td>
                        <a class="btn btn-small btn-info" href="{{route('users.edit', $user->id)}}">Edit</a>
                        {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'DELETE'])!!}
                        {!! Form::submit('DELETE', ['class'=>'btn btn-warning']) !!}
                        {!! Form::close() !!}
                    </td>
                @else
                <td> 
                    <a class="btn btn-small btn-info" href="{{route('users.edit', $user->id)}}">Edit</a>
                </td>
                @endif
        </tr>
    @endforeach
</table>

@endsection


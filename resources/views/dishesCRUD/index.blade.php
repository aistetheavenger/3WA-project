@extends('layouts.app')

@section('content')

    <nav class="navbar navbar-inverse">
        <ul class="nav navbar-nav">
            <li class="btn btn-small btn-danger">Admin mode</li>
            <li><a href="{{ URL::to('dishes') }}">View All Dishes</a></li>
            <li><a href="{{ URL::to('dishes/create') }}">Create Dish</a>
        </ul>
    </nav>

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <td>ID</td>
            <td>Title</td>
            <td>Photo</td>
            <td>Description</td>
            <td>Price Neto</td>
            <td>Action</td>

        </tr>
        </thead>
        <tbody>
        @foreach($dishes as $dish)
            <tr>
                <td>{{ $dish->id }}</td>
                <td>{{ $dish->title }}</td>
                <td><img class="img-responsive" width="100" height="100" alt="dish image" src="{{$dish->getPhotoUrl() }}" ></td>
                {{--<td><img src="{{ Storage::url($dish->photo)}}" width="100" height="100" alt="dish image"/></td>--}}
                <td>{!!$dish->description !!}</td>
                <td>{{ $dish->price }}</td>

                {{--<td>{{ $dish->Quantity }}</td>--}}

                <td>

                    <a class="btn btn-small btn-info" href="{{ URL::to('dishes/' . $dish->id . '/edit') }}">Edit</a>

                    {!! Form::open(['route' => ['dishes.destroy', $dish->id], 'method' => 'DELETE']) !!}
                    {!! Form::submit('Delete', array('class' => 'btn btn-warning')) !!}
                    {!! Form::close() !!}

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection




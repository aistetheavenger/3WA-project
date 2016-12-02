@extends('layouts.app')

@section('content')



<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Title</td>
            <td>Photo</td>
            <td>Description</td>
            <td>Price Neto</td>
            <td>Sale price</td>
            <td>Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($dishes as $dish)
            <tr>
                <td>{{ $dish->id }}</td>
                <td>{{ $dish->title }}</td>
                <td><img class="img-responsive" width="100" height="100" alt="dish image" src="{{$dish->getPhotoUrl() }}" ></td>
                <td>{!!$dish->description !!}</td>
                <td>{{ $dish->price }}</td>
                <td>{!!$dish->getSalePrice()!!}</td>
            {{--<td>{{ $dish->Quantity }}</td>--}}
                <td><a class="btn btn-small btn-info" href="{{ URL::to('dishes/' . $dish->id . '/edit') }}">Edit</a>
                    {!! Form::open(['route' => ['dishes.destroy', $dish->id], 'method' => 'DELETE']) !!}
                    {!! Form::submit('Delete', array('class' => 'btn btn-warning')) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection




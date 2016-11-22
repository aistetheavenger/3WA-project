@extends('layouts.app')

@section('content')

{{--{!! Form::open(['route' => ['cart.store', $dish->id], 'method' => 'POST']) !!} --}}

<table class="table table-striped table-bordered">
   <thead>
    <tr>
        <td>Photo</td>
        <td>Name</td>
        <td>Quantity</td>
        <td>Price</td>
        <td>Total price</td>
        <td>Delete</td>

    </tr>
</thead>
<tbody>
    @foreach($dishes as $dish)
    <tr>
        <td><img src="{{$dish->getPhotoUrl() }}" width="100" height="100" alt="dish image"/></td>
        <td>{{ $dish->title }}</td>
        <td>{{ $quantities[$dish->id] }} x </td>
        <td>{{ $dish->price }}</td>
        <td>{{ ($quantities[$dish->id]) * ($dish->price) }}</td>
        <td> {!! Form::open(['route' => ['cart.destroy', $dish->id], 'method' => 'DELETE']) !!}
            {!! Form::submit('Delete', array('class' => 'btn btn-warning')) !!}
            {!! Form::close() !!}</td>
        </tr>
        @endforeach
    </tbody>
</table>



<!-- {!! Form::submit('BUY!', array('class' => 'btn btn-primary')) !!} -->





@endsection


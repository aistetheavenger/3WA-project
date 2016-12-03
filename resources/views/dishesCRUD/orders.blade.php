@extends('layouts.app')

@section('content')

<table class="table table-striped table-bordered">
    <tr>
        <th>Name</th>
        <th>Date</th>
        <th>Total</th>
        <th>Order id</th>
        <th>Products</th>
        <th>Action</th>
    </tr>
    @foreach($orders as $order)
        <tr>
            <td>
                @if($order->user)
                    {{ $order->user->getFullName() }}
                @endif
            </td>  
            <td>{{ $order->created_at }}</td> 
            <td>{{ $order->total }}</td>    
            <td>{{ $order->id }}</td>
            <td>
                <ul>
                    @foreach ($order->dishes as $product)
                        <li>
                            {{$product->title }} x 
                            {{$product->pivot->quantity}} x
                            {{$product->pivot->price}} &euro;,
                            {{$product->pivot->price*$product->pivot->quantity}} &euro;
                        </li>
                    @endforeach
                </ul>
            </td>
            <td>
                {!! Form::open(['route' => ['orders.destroy', $order->id], 'method' => 'DELETE'])!!}
                {!! Form::submit('DELETE', ['class'=>'btn btn-warning']) !!}
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
</table>

@endsection







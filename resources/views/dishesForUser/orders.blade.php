@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-12"> 
        <table class="table table-hover">
            <tr>
                <th>User name</th>
                <th>Date</th>
                <th>Order ID</th>
                <th>Total price</th>
                <th>Products</th>
                <th>Action</th>
            </tr>
            @foreach($orders as $order)
            <tr>
                <td>{{ $order->user->getFullName() }}</td>  
                <td>{{ $order->created_at }}</td> 
                <td>{{ $order->id }}</td>
                <td>{{ $order->total }}</td>    
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
                <td>Order done!<td>
            </tr>
            @endforeach
        </table>
    </div>
</div>

@endsection






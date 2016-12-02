@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-12"> 
        <table class="table table-hover">
            <tr>
                <th>User name</th>
                <th>Order ID</th>
                <th>Total price</th>
                <th>Action</th>
            </tr>
            @foreach($orders as $order)
            <tr>
                <td>{{ $order->user->getFullName() }}</td>  
                <td>{{ $order->id }}</td>
                <td>{{ $order->total }}</td>    
                <td>Order done!<td>
            </tr>
            @endforeach
        </table>
    </div>
</div>

@endsection




@extends('layouts.app')

@section('content')

@include('partials.admin_navbar')

<div class="row">
    <div class="col-md-12"> 
        <table class="table table-hover">
            <tr>
                <th>User name</th>
                <th>Order ID</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
            @foreach($orders as $order)
                <tr>
                    {!! Form::open(['route' => ['orders.destroy', $order->id], 'method' => 'DELETE'])!!}
                        <td>{{ $order->user->getFullName() }}</td>  
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->total }}</td>    
                        <td>{!! Form::submit('DELETE', ['class'=>'btn btn-warning']) !!}<td>
                    {!! Form::close() !!}
                </tr>
            @endforeach
        </table>
    </div>
</div>

@endsection




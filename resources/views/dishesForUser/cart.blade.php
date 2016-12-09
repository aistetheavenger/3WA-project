@extends('layouts.app')

@section('content')

@if (session('message'))
    <div class="alert alert-warning">
        {{session('message')}}  
    </div>
@endif

<style type="text/css">
    table {
        background-color: black;
        color: white;
        margin-top: 20px;
        
    }
    .btn-danger {
        margin-top: 20px;
    }
    .black {
        color: black;
    }


</style>

<div class="bg-rez">
    <img src="{{$url = asset('/images/Panna-Cotta.jpeg')}}">
</div>

<table class="table table-condensed">
   <thead>
        <tr>
            <td>Photo</td>
            <td>Name</td>
            <td>Quantity</td>
            <td>Price</td>
            <td>Total price</td>
            <td>Total price (tax included)</td>
            <td>Delete</td>
        </tr>
    </thead>
<tbody>
    @foreach($cart->getProducts() as $dish)
    <tr>
        <td><img src="{{$dish->getPhotoUrl() }}" width="100" height="100" alt="dish image"/></td>
        <td>{{ $dish->title }}</td>
        <td>{{ $cart->get($dish->id) }} x </td>
        <td>{{ $dish->price }}</td>
        <td>{{  $cart->get($dish->id) * $dish->price}}</td>
        <td>{{  $cart->get($dish->id) * $dish->getSalePrice() }}</td> 
        <td> {!! Form::open(['route' => ['cart.destroy', $dish->id], 'method' => 'DELETE']) !!}
            {!! Form::submit('Delete', array('class' => 'btn btn-danger')) !!}
            {!! Form::close() !!}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="row black">
    <div class="col-md-6 col-md-offset-6">   
        <p>Price <span class="label label-default">{{$cart->getTotal()}}</span></p>      
        <p>Price (tax included) <span class="label label-default">{{$cart->getTotalTax()}}</span></p> 
    </div>
</div>

<div class="row black">
    <div class="col-md-6 col-md-offset-6"> 
        {!! Form::open([
        'route' => 'orders.store',
        'method' => 'POST'
        ]) !!}
        <a href="/shopNow" class="btn btn-default" role="button"><- Back to dishes</a>
        {!! Form::submit('BUY! ->', array('class' => 'btn btn-success')) !!}
        {!! Form::close() !!}
    </div>
</div>
@endsection

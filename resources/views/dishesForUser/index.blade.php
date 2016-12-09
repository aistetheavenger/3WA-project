@extends('layouts.app')

@section('content')

@include('partials.errors', ['errors'=>$errors])


<div class="bg-rez">
    <img src="{{$url = asset('/images/Panna-Cotta.jpeg')}}">
</div>


<div class="row text-center">
    @foreach($dishes as $dish)
        <div class="col-md-3 col-sm-6 col-xs-12 hero-feature ">
            <div class="thumbnail">
                <img  class="img-responsive" width="500" height="250" alt="dish image" src="{{$dish->getPhotoUrl() }}">
                <div class="caption">
                    {!! Form::open(['route' => ['cart.update', $dish->id], 'method' => 'PUT']) !!}
                        <h3>{{ $dish->title }}</h3>
                        <p>{!!$dish->description !!}</p>
                        <P>Price: {!!$dish->getSalePrice()!!} eur</P>
                        <P>Choose quantity:  {!! Form::selectRange ( 'quantity', 1, 10) !!}</P>
                    {!! Form::submit('Add to cart!', array('class' => 'btn btn-primary')) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    @endforeach
</div>


@endsection





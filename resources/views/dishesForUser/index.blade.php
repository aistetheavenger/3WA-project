@extends('layouts.app')

@section('content')

@include('partials.errors', ['errors'=>$errors])


{{--<div class="container ">--}}

<a class="btn btn-primary" href="{{route('cart.index') }}">Cart: {{$cartCount}} item(s), total price 
@foreach($dishes as $dish)

{{$cartCount* ($dish->price)}}
@endforeach
</a>

<style>
    .img-responsive {
        max-width: 500px;
        max-height: 250px;
    }
</style>

        @foreach($dishes as $dish)

        {!! Form::open(['route' => ['cart.update', $dish->id], 'method' => 'PUT']) !!}
        <div class="row text-center">
            <div class="col-md-3 col-sm-6 col-xs-12 hero-feature ">
                <div class="thumbnail ">
                    <img  class="img-responsive"  alt="dish image" src="{{$dish->getPhotoUrl() }}">
                    <div class="caption">
                        <h3>{{ $dish->title }}</h3>
                        <p>{!!$dish->description !!}</p>
                        <P>Price: {{ $dish->price }} eur</P>
                        <P> Choose quantity: {!! Form::selectRange ( 'quantity', 1, 10) !!}</P>

                            {!! Form::submit('Add to cart!', array('class' => 'btn btn-primary')) !!}


                        </p>
                    </div>
                </div>
            </div>
        </div>
{!! Form::close() !!}
        @endforeach
{{--</div>--}}


@endsection




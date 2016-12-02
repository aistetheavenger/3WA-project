<nav class="navbar navbar-inverse">
    <ul class="nav navbar-nav">
        <li class="btn btn-small btn-danger">Admin mode</li>

        <li><a href="{{ URL::to('dishes') }}">View All Dishes</a></li>
        <li><a href="{{ URL::to('dishes/create') }}">Create Dish</a>
        <li><a href="{{ route('reservation.index') }}">Bookings</a>
        <li><a href="{{route('reservation.create')}}">Create Booking</a>
        <li><a href="{{route('users.index')}}">Users</a>
        <li><a href="{{ route('users.create') }}">Create Users</a>
        <li><a href="{{ route('orders.index') }}">Orders history</a>
    </ul>
</nav>
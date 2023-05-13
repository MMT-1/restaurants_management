<h1>Restaurants near {{ $location }}</h1>

<ul>
@foreach ($restaurants as $restaurant)
    <li>{{ $restaurant->name }}</li>
@endforeach
</ul>

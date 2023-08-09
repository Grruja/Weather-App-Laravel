@foreach($weather as $forecast)
    <p>Trenutno je {{ $forecast->temp }} u {{ $forecast->cities->city }}</p>
    <a href="{{ route('forecast_city', ['cities' => $forecast->cities->city]) }}">View more</a>
    <hr>
@endforeach

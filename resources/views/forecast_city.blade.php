
<h1>{{ $cities->city }}</h1>

@foreach($cities->forecasts as $forecast)
    <p>{{ $forecast->temp }}</p>
    <hr>
@endforeach



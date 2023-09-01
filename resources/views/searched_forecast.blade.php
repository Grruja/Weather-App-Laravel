@extends('layout')

@section('content')
    @foreach($cities as $city)
        <a href="{{ route('forecast_city', ['cities' => $city->city]) }}" class="d-block">
            <i class="fa-solid {{ \App\Http\Forecast_helper::get_icon_by_weather($city->today_forecast->weather_type) }}"></i>
            {{ $city->city }}
        </a>
    @endforeach
@endsection

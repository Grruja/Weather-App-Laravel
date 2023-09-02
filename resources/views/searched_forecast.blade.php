@extends('layout')

@section('content')
    <div class="row">
        @foreach($cities as $city)
            <div class="border border-dark p-2 m-2 col-5">

                @if(in_array($city->id, $favourite))
                    <a href="{{ route('remove_user_cities', ['city' => $city->id]) }}"
                       class="text-dark me-2 text-decoration-none"
                       style="cursor: pointer">
                        <i class="fa-solid fa-star"></i>
                    </a>
                @else
                    <a href="{{ route('user_cities', ['city' => $city->id]) }}"
                       class="text-dark me-2 text-decoration-none"
                       style="cursor: pointer">
                        <i class="fa-regular fa-star"></i>
                    </a>
                @endif

                <a href="{{ route('forecast_city', ['cities' => $city->city]) }}" class="text-decoration-none">
                    <i class="fa-solid {{ \App\Http\Forecast_helper::get_icon_by_weather($city->today_forecast->weather_type) }}"></i>
                    {{ $city->city }}
                </a>
            </div>
        @endforeach
    </div>
@endsection

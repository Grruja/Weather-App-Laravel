@extends('layout')

@section('title')
    Weather App
@endsection

@section('content')
    <form method="GET" action="{{ route('forecast_search') }}">
        <div>
            <input type="text" name="city" placeholder="Enter city name">
        </div>

        @if(session('error'))
            <p class="text-danger">{{ session('error') }}</p>
        @endif

        <button>Search</button>
    </form>

    <div class="mt-4">
        @if ($favourite)
            @foreach($favourite as $city)
                <div class="d-flex align-items-center gap-3 mb-2">
                    <i class="fa-solid {{ \App\Http\Forecast_helper::get_icon_by_weather(
                            $city->cities->today_forecast->weather_type
                         ) }}">
                    </i>
                    <p class="m-0">{{ $city->cities->city }} : {{ $city->cities->today_forecast->temp }}</p>
                </div>
            @endforeach
        @endif
    </div>
@endsection



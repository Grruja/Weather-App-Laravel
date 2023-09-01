@extends('admin.admin_layout')

@section('admin_title')
    Admin | Forecasts
@endsection

@section('admin_content')
    <form action="{{ route('add_forecast') }}" method="POST">
        {{ csrf_field() }}

        @if($errors->any())
            <p class="text-danger">{{ $errors->first() }}</p>
        @endif

        <select name="city_id">
            @foreach(\App\Models\Cities::all() as $city)
                <option value="{{ $city->id }}">{{ $city->city }}</option>
            @endforeach
        </select>
        <input type="number" name="temp" required placeholder="Temperature">
        <select name="weather_type">
            @foreach(\App\Models\Forecasts::WEATHERS as $weather)
                <option value="{{ $weather }}">{{ $weather }}</option>
            @endforeach
        </select>
        <input type="number" name="probability" placeholder="Probability">
        <input type="date" name="date_forecast" required>
        <button class="btn btn-outline-primary">Add</button>
    </form>


    <div class="d-flex flex-wrap gap-3 mt-5">
        @foreach(\App\Models\Cities::with('forecasts')->get() as $city)
            <div class="border rounded-2 p-2">
                <h3>{{ $city->city }}</h3>
                <ul class="list-group">
                    @foreach($city->forecasts as $forecast)

                        @php
                            $color = \App\Http\Forecast_helper::get_color_by_temp($forecast->temp);
                            $icon = \App\Http\Forecast_helper::get_icon_by_weather($forecast->weather_type);
                        @endphp

                        <li class="list-group-item">{{ $forecast->date_forecast }} - <i class="fa-solid {{ $icon }}"></i> <span class="{{ $color }}">{{ $forecast->temp }}</span></li>
                    @endforeach
                </ul>
            </div>
        @endforeach
    </div>
@endsection

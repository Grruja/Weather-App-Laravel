@extends('admin.admin_layout')

@section('admin_title')
    Admin | Weathers
@endsection

@section('admin_content')
    <form action="{{ route('weather_update') }}" method="POST">
        {{ csrf_field() }}

        <input type="number" name="temp" placeholder="Temperature">
        <select name="city_id">
            @foreach(\App\Models\Cities::all() as $city)
                <option value="{{ $city->id }}">{{ $city->city }}</option>
            @endforeach
        </select>
        <button>Save</button>
    </form>

    @foreach(\App\Models\Weather::all() as $weather)
        <h3>{{ $weather->cities->city }}</h3>
        <p>- temperature: {{ $weather->temp }}</p>
        <hr>
    @endforeach
@endsection

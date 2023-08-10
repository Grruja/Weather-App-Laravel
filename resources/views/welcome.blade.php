@extends('layout')

@section('title')
    Weather App
@endsection

@section('content')
    <form method="GET" action="{{ route('forecast_search') }}">
        <div>
            <input type="text" name="city" placeholder="Enter city name">
        </div>
        <button>Search</button>
    </form>
@endsection



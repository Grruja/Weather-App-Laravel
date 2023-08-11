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
@endsection



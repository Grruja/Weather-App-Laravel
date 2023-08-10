@extends('layout')

@section('content')
    @foreach($cities as $city)
        <a href="{{ route('forecast_city', ['cities' => $city->city]) }}" class="d-block">{{ $city->city }}</a>
    @endforeach
@endsection

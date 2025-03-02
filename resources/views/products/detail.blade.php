@extends('layout.app')
@section('content')
    <h2>
        @foreach ($product as $item)
            {{ $item }}
        @endforeach
    </h2>
@endsection

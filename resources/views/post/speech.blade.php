@extends('layout.app')
@section('content')
    <h1>this is post with data</h1>

    @foreach ($post as $item)

    {{$item->title}} ||
    {{$item->body}}
    <br>
    @endforeach
@endsection
@extends('layout.app')
@section('content')
    <h1>This is Index.blade.php</h1>
    <h2>This is data pass to view: {{ $productName }} - {{ $price }} </h2>
    <h2>My phone : @foreach ($myPhone as $phone)
            {{ $phone }}
        @endforeach
    </h2>
    <div>
        <a href="{{ route('product') }}/1">Link to product detail</a>
        <img src="{{ URL('image/ticket.jpg') }}" alt="" class="w-25">
    </div>
@endsection

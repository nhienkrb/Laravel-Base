@extends('layout.app')
@section('content')
<div class="container mb-2">
    <h2>Update Food</h2>
    <form action="/food/{{$food->id}}" method="post" >
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="" class="form-label">Name</label>
            <input type="text" class="form-control" name="foodName" id="foodName"  placeholder="Name Food" value="{{$food->name}}"/>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Price</label>
            <input type="text" class="form-control" name="foodPrice" id="foodPrice"  placeholder="Price" value="{{$food->price}}" />
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Quality</label>
            <input type="number" class="form-control" name="foodQuality" id="foodQuality"  placeholder="Quality" value="{{$food->quality}}" />
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
    
@endsection

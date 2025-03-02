@extends('layout.app')
@section('content')
    <div class="container mb-2">
        <form action="/food" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Name</label>
                <input type="text" class="form-control" name="foodName" id="foodName" placeholder="Name Food" />
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Price</label>
                <input type="text" class="form-control" name="foodPrice" id="foodPrice" placeholder="Price" />
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Quality</label>
                <input type="number" class="form-control" name="foodQuality" id="foodQuality" placeholder="Quality" />
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Categories</label>
                <select class="form-select form-select-lg" name="category" id="category">
                    @foreach ($food as $item)
                        <option value="{{ $item->category_id }}">{{ $item->category_id }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Image Food</label>
                <input type="file" class="form-control" name="image" id="image" placeholder="" aria-describedby="fileHelpId" />
                <div id="fileHelpId" class="form-text">Click to file choice Image</div>
            </div>
            <button type="submit" class="btn btn-success">Create</button>
        </form>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @else
    @endif
@endsection

@extends('layout.app')
@section('content')
    <div class="mx-5">
        <h1>Food Show Page</h1>


        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quality</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($foods as $food)
                        <tr class="">
                            <td scope="row">{{ $food->name }}</td>
                            <td>{{ $food->price }}</td>
                            <td>{{ $food->quality }}</td>
                            <td> <img style="width: 100px; height: 100px;"
                                    src="{{ asset('image/') . '/' . $food->image_path }}" alt="" srcset="">
                            </td>
                            <td>
                                <a class="btn btn-dark" href="{{ route('food.index') }}/{{ $food->id }}/edit">Edit</a>
                                <form action="{{ route('food.destroy', $food->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
            </table>
        </div>


    </div>
@endsection

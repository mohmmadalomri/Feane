@extends('layouts.app')
@section('page_title', 'All Meal')
@section('content')

    <div class="mb-3">
        <x-flash-message />
        <table class="table table-striped">
            <a href="{{ asset('meals/create') }}" class="btn btn-primary">create meal</a>
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Name</th>
                    <th scope="col">description</th>
                    <th scope="col">price</th>
                    <th scope="col">category</th>
                    <th scope="col">image</th>



                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($meals as $kay => $meal)
                    <tr>
                        <th scope="row">{{ $kay + 1 }}</th>
                        <td><a href="{{ route('meals.show', $meal->id) }}">{{ $meal->name }}</a></td>
                        <td>{{ $meal->description }}</td>
                        <td>{{ $meal->price }}</td>
                        <td>{{ $meal->category_id }}</td>
                        <td><img src="{{ asset('storage/' . $meal->image) }}" width="50px" height="50px" /></td>

                        <td><a href="{{ route('meals.edit', $meal->id) }}" class="btn btn-primary">Edit</a></td>
                        <td>
                            <form action="{{ route('meals.destroy', $meal->id) }}" class="d-inline-block" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach



            </tbody>
        </table>

    </div>
    {{ $meals->links() }}


@endsection

@extends('layouts.app')
@section('page_title','index')
@section('content')

    <div class="mb-3" ma>
        <x-flash-message />
        <table class="table table-striped">
            <a href="{{ asset('category/create') }}" class="btn btn-primary">create category</a>
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $key => $category)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{ $category->name }}</td>
                        <td><a href="{{ route('category.edit', $category->id) }}" class="btn btn-primary">Edit</a></td>
                        <td>
                            <form action="{{ route('category.destroy', $category->id) }}" class="d-inline-block"
                                method="POST">
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
@endsection

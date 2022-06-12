<x-flash-message />
@extends('layouts.app')
@section('page_title', 'Create')
@section('content')

    <div class="mb-3" style="--bs-columns: 3;">

        <form class="form" style="--bs-columns: 3;" method="POST" action="{{ route('meals.store') }}"
            enctype="multipart/form-data">

            @csrf
            <div class="mb-3">

                <label for="exampleInputEmail1" class="form-label">Meal Name</label>
                <input type="name" class="form-control" name="name" id="name">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label"> Meal description</label>
                <textarea class="form-control" name="description" id="description" rows="3"></textarea>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Meal price</label>
                <input type="number" class="form-control" name="price" id="price">
            </div>
            <select class="form-select" aria-label="Default select example" name="category_id" id="category_id">
                <option selected>Meal category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ old('category_id', $meals->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}</option>
                @endforeach



            </select>

            <div>
                <label for="formFileLg" class="form-label">Meal image</label>
                <input class="form-control form-control-lg" id="image" name="image" type="file">
            </div>



            <button type="submit" class="btn btn-primary">Add</button>
        </form>
    </div>



@endsection

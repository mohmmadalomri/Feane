
@extends('layouts.app')
@section('page_title','create')
@section('content')


    <div class="mb-3" >
        <x-flash-message />
        <form class="form" style="--bs-columns: 3;" method="post"  action="{{ route('category.store') }}">
            <div class="mb-3">
                @csrf
                <label  for="exampleInputEmail1" class="form-label">Category Name</label>
                <input type="name" class="form-control" name="name" id="name" width="200px">
            </div>


            <button type="submit" class="btn btn-primary">Add</button>
        </form>
    </div>


@endsection

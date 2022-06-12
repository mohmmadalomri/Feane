@extends('layouts.app')
@section('page_title','edit')
@section('content')

    <div class="mb-3">
        <form class="form" style="--bs-columns: 3;" method="post" action="/category/{{ $category->id }}">
            {{ csrf_field() }}

            <div class="mb-3">
                {{ method_field('PUT') }}
                @csrf
                <label for="exampleInputEmail1" class="form-label">Category Name</label>
                <input type="name" class="form-control" value="{{ $category->name }}" name="name" id="name">
            </div>


            <button type="submit" class="btn btn-primary">UPDATE</button>
        </form>
    </div>

@endsection

@extends('layouts.global')
@section('title') Edit Category @endsection
@section('pageTitle') Edit Category @endsection
@section('content')
    <div class="col-md-8">
        @if(session('status'))
            <div class="alert alert-success">
                {{session('status')}}
            </div>
        @endif
        <form action="{{route('categories.update', [$category->id])}}" enctype="multipart/form-data" method="post" class="bg-white shadow-sm p-3">
            @csrf
            <input type="hidden" name="_method" value="PUT">

            <label>Category name</label><br>
            <input type="text" name="name" value="{{$category->name}}" class="form-control">
            <br><br>

            <label>Category slug</label>
            <input type="text" name="slug" value="{{$category->slug}}" class="form-control">
            <br><br>

            <label>Category image</label><br>
            @if($category->image)
                <span>Current image</span><br>
                <img src="{{asset('storage/' . $category->image)}}" width="90">
                <br><br>
            @endif
            <input type="file" name="image" class="form-control">
            <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar</small>
            <br><br>

            <input type="submit" value="Update" class="btn btn-primary">
        </form>
    </div>
@endsection
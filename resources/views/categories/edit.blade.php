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
            <input type="text" name="name" value="{{old('name') ? old('name') : $category->name}}" class="form-control {{$errors->first('name') ? 'is-invalid' : ''}}">
            <div class="invalid-feedback">
                {{$errors->first('name')}}
            </div>
            <br><br>

            <label>Category slug</label>
            <input type="text" name="slug" value="{{old('slug') ? old('slug') : $category->slug}}" class="form-control {{$errors->first('slug') ? 'is-invalid' : ''}}">
            <div class="invalid-feedback">
                {{$errors->first('slug')}}
            </div>
            <br><br>

            <label>Category image</label><br>
            @if($category->image)
                <span>Current image</span><br>
                <img src="{{asset('storage/' . $category->image)}}" width="90">
                <br><br>
            @endif
            <input type="file" name="image" class="form-control {{$errors->first('image') ? 'is-invalid' : ''}}">
            <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar</small>
            <div class="invalid-feedback">
                {{$errors->first('image')}}
            </div>
            <br><br>

            <input type="submit" value="Update" class="btn btn-primary">
        </form>
    </div>
@endsection
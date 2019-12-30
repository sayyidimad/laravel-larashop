@extends('layouts.global')
@section('title') Create Category @endsection
@section('pageTitle') Create Category @endsection
@section('content')
<div class="col-md-8">
    @if(session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
    @endif
    <form enctype="multipart/form-data" action="{{ route('categories.store') }}" method="post" class="bg-white shadow-sm p-3">
        @csrf
        <label>Category name</label><br>
        <input type="text" name="name" class="form-control {{$errors->first('name') ? 'is-invalid' : ''}}" value="{{old('name')}}">
        <div class="invalid-feedback">
            {{$errors->first('name')}}
        </div>
        <br>

        <label>Category image</label>
        <input type="file" name="image" class="form-control {{$errors->first('image') ? 'is-invalid' : ''}}">
        <div class="invalid-feedback">
            {{$errors->first('image')}}
        </div>
        <br>

        <input type="submit" value="Save" class="btn btn-primary">
    </form>
</div>
@endsection
@extends('layouts.global')
@section('title') Edit book @endsection
@section('pageTitle') Edit book @endsection
@section('content')
<div class="row">
    <div class="col-md-8">
        @if(session('status'))
            <div class="alert alert-success">
                {{session('status')}}
            </div>
        @endif
        <form action="{{route('books.update', [$book->id])}}" method="post" class="p-3 shadow-sm bg-white" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_method" value="PUT">
            <label for="title">Title</label><br>
            <input type="text" name="title" class="form-control {{$errors->first('title') ? 'is-invalid' : ''}}" value="{{old('title') ? old('title') : $book->title}}" placeholder="Book title">
            <div class="invalid-feedback">
                {{$errors->first('title')}}
            </div>
            <br>

            <label for="cover">Cover</label><br>
            <small class="text-muted">Current cover</small><br>
            @if($book->cover)
                <img src="{{asset('storage/' . $book->cover)}}" width="90">
            @endif
            <br><br>

            <input type="file" name="cover" class="form-control">
            <small class="text-muted">Kosongkan jika tidak ingin mengubah cover</small>
            <br><br>

            <label for="slug">Slug</label><br>
            <input type="text" name="slug" class="form-control {{$errors->first('slug') ? 'is-invalid' : ''}}" value="{{old('slug') ? old('slug') : $book->slug}}" placeholder="enter-a-slug">
            <div class="invalid-feedback">
                {{$errors->first('slug')}}
            </div>
            <br>

            <label for="description">Description</label><br>
            <textarea name="description" id="description" cols="30" rows="10" class="form-control {{$errors->first('description') ? 'is-invalid' : ''}}">{{old('description') ? old('description') : $book->description}}</textarea>
            <div class="invalid-feedback">
                {{$errors->first('description')}}
            </div>
            <br>

            <label for="categories">Categories</label>
            <select name="categories[]" id="categories" class="form-control" multiple></select>
            <br>
            <br>

            <label for="stock">Stock</label><br>
            <input type="text" name="stock" id="stock" class="form-control {{$errors->first('stock') ? 'is-invalid' : ''}}" placeholder="Stock" value="{{old('stock') ? old('stock') : $book->stock}}">
            <div class="invalid-feedback">
                {{$errors->first('stock')}}
            </div>
            <br>

            <label for="author">Author</label>
            <input type="text" name="author" id="author" class="form-control {{$errors->first('author') ? 'is-invalid' : ''}}" placeholder="Author" value="{{old('author') ? old('author') : $book->author}}">
            <div class="invalid-feedback">
                {{$errors->first('author')}}
            </div>
            <br>

            <label for="publisher">Publisher</label><br>
            <input type="text" name="publisher" id="publisher" class="form-control {{$errors->first('publisher') ? 'is-invalid' : ''}}" placeholder="Publisher" value="{{old('publisher') ? old('publisher') : $book->publisher}}">
            <div class="invalid-feedback">
                {{$errors->first('publisher')}}
            </div>
            <br>

            <label for="price">Price</label><br>
            <input type="text" name="price" id="price" class="form-control {{$errors->first('price') ? 'is-invalid' : ''}}" placeholder="Price" value="{{old('price') ? old('price') : $book->price}}">
            <div class="invalid-feedback">
                {{$errors->first('price')}}
            </div>
            <br>

            <label for="status">Status</label>
            <select name="status" id="status" class="form-control">
                <option value="PUBLISH" {{$book->status == 'PUBLISH' ? 'selected' : ''}}>PUBLISH</option>
                <option value="DRAFT" {{$book->status == 'DRAFT' ? 'selected' : ''}}>DRAFT</option>
            </select>
            <br>

            <button class="btn btn-primary" value="PUBLISH">Update</button>
        </form>
    </div>
</div>
@endsection
@section('footer-scripts')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>
     $('#categories').select2({
         ajax: {
             url: 'http://larashop.test/ajax/categories/search',
             processResults: function (data) {
                 return {
                     results: data.map(function (item) {
                         return {
                             id: item.id,
                             text: item.name
                         }
                     })
                 }
             }
         }
     })

     var categories = {!! $book->categories !!}
     categories.forEach(function (category) {
         var option = new Option(category.name, category.id, true, true);
         $('#categories').append(option).trigger('change');
     })
</script>
@endsection
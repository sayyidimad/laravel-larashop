@extends('layouts.global')
@section('footer-scripts')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css">
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
    </script>
@endsection
@section('title') Create book @endsection
@section('pageTitle') Create book @endsection
@section('content')
    <div class="row">
        <div class="col-md-8">
            @if(session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
            @endif
            <form action="{{route('books.store')}}" method="post" class="shadow-sm p-3 bg-white" enctype="multipart/form-data">
                @csrf
                <label for="title">Title</label><br>
                <input type="text" name="title" class="form-control" placeholder="Book title">
                <br>

                <label for="cover">Cover</label>
                <input type="file" name="cover" class="form-control">
                <br>

                <label for="description">Description</label><br>
                <textarea name="description" id="description" cols="30" rows="10" class="form-control" placeholder="Give a description about this book"></textarea>
                <br>

                <label for="categories">Categories</label><br>
                <select name="categories[]" id="categories" class="form-control" multiple></select><br><br>

                <label for="stock">Stock</label><br>
                <input type="number" name="stock" id="stock" class="form-control" min="0" value="0">
                <br>

                <label for="author">Author</label><br>
                <input type="text" name="author" id="author" class="form-control" placeholder="Book author">

                <label for="publisher">Publisher</label><br>
                <input type="text" name="publisher" id="publisher" class="form-control" placeholder="Book publisher">
                <br>

                 <label for="price">Price</label><br>
                 <input type="number" name="price" id="price" class="form-control" placeholder="Book price">
                 <br>

                 <button class="btn btn-primary" name="save_action" value="PUBLISH">Publish</button>
                 <button class="btn btn-secondary" name="save_action" value="DRAFT">Save as draft</button>
            </form>
        </div>
    </div>
@endsection
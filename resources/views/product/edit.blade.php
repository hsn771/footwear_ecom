@extends('layouts.app_back')
@section('content')

<div class="body-wrapper-inner">
    <div class="container-fluid">
        <!--  Row 1 -->
        <div class="row">
            <form action="{{route('product.update', $product->id)}}" method="post">
                @csrf
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{$product->name}}">
              </div>
              <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="form-control" id="description" name="description" placeholder="description" value="{{$product->description}}">
              </div>
              <div class="form-group">
                <label for="price">Price</label>
                <input type="number" class="form-control" id="price" name="price" placeholder="price" value="{{$product->price}}">
              </div>
              <div class="form-group">
                <label for="category_id">Category</label>
                <input type="text" class="form-control" id="category_id" name="category_id" placeholder="Category" value="{{$product->category_id}}">
              </div>
              <div class="form-group">
                <label for="image_url">Image</label>
                <input type="file" class="form-control" id="image_url" name="image_url" value="{{$product->image_url}}">
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>


@endsection
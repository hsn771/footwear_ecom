@extends('layouts.app_back')
@section('pageTitle','Add New Products')
@section('content')

<div class="body-wrapper-inner">
    <div class="container-fluid">
        <!--  Row 1 -->
        <div class="row">
          <h3>Add New Product</h3>
            <form action="{{route('product_size_stock.update', $product_size_stock->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
              <div class="form-group">
                <label for="Products">Products</label>
                <select name="product_id" class="form-control">
                  <option value="">Select Products</option>
                  @forelse ($product as $c)
                      <option value="{{$c->id}}" @if($c->id==$product_size_stock->product_id) selected @endif>{{$c->name}}</option>
                  @empty

                  @endforelse
                </select>
              </div>
              <div class="form-group">
                <label for="Sizes">Sizes</label>
                <select name="size_id" class="form-control">
                  <option value="">Select Sizes</option>
                  @forelse ($size as $c)
                      <option value="{{$c->id}}" @if($c->id==$product_size_stock->size_id) selected @endif>{{$c->size_label}}</option>
                  @empty

                  @endforelse
                </select>
              </div>
              <div class="form-group">
                <label for="Stock Quantity">Stock Quantity</label>
                <input type="number" class="form-control" id="stock_quantity" name="stock_quantity" value="{{$product_size_stock->stock_quantity}}" placeholder="Stock Quantity">
              </div>
              <button type="submit" class="btn btn-info mt-3">Submit</button>
            </form>
        </div>
    </div>
</div>


@endsection
@extends('layouts.app_back')
@section('pageTitle','Add New Products')
@section('content')

<div class="body-wrapper-inner">
    <div class="container-fluid">
        <!--  Row 1 -->
        <div class="row">
          <h3>Add New Product</h3>
            <form action="{{route('product_size_stock.store')}}" method="post" enctype="multipart/form-data">
                @csrf
              <div class="form-group">
                <label for="Products">Products</label>
                <select name="product_id" class="form-control">
                  <option value="">Select Products</option>
                  @forelse ($product as $c)
                      <option value="{{$c->id}}">{{$c->name}}</option>
                  @empty

                  @endforelse
                </select>
              </div>
              <div class="form-group">
                <label for="Sizes">Sizes</label>
                <select name="size_id" class="form-control">
                  <option value="">Select Sizes</option>
                  @forelse ($size as $c)
                      <option value="{{$c->id}}">{{$c->size_label}}</option>
                  @empty

                  @endforelse
                </select>
              </div>
              <div class="form-group">
                <label for="Stock Quantity">Stock Quantity</label>
                <input type="number" class="form-control" id="stock_quantity" name="stock_quantity" placeholder="Stock Quantity">
              </div>
              <button type="submit" class="btn btn-info mt-3">Submit</button>
            </form>
        </div>
    </div>
</div>


@endsection
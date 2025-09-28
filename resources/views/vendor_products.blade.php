@extends('layouts.master')

@section('content')
<div class="container">
    <h2>{{ $vendor->name }} Store</h2>
    <div class="row">
        @foreach($vendor->products as $product)
            <div class="col-md-3">
                <div class="card">
                    <img src="{{ asset('uploads/products/'.$product->image) }}" class="card-img-top">
                    <div class="card-body">
                        <h5>{{ $product->name }}</h5>
                        <p>{{ $product->price }} Tk</p>
                        <a href="{{ route('product.details', $product->id) }}" class="btn btn-sm btn-primary">View</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

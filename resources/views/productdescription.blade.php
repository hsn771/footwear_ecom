@extends('layouts.master')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Product Description</title>
  <!-- Bootstrap 4 CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    .product-title {
      font-size: 2rem;
      font-weight: 600;
    }
    .price {
      font-size: 1.5rem;
      color: #28a745;
    }
    .rating i {
      color: #ffc107;
    }
    .product-image {
      border: 1px solid #ddd;
      padding: 10px;
      border-radius: 8px;
      background-color: #fff;
    }
  </style>
</head>
<body>

<div class="container my-5">
      @forelse ($products as $product)
        <div class="row">
          
                  <!-- Product Image -->
                  <div class="col-md-6">
                    <div class="product-image text-center">
                      <img src="{{asset('uploads/'.$product->image_url)}}" alt="Product" class="img-fluid">
                    </div>
                    <!-- <div class="d-flex justify-content-center mt-3">
                      <img src="https://via.placeholder.com/80" class="mx-1 img-thumbnail" alt="thumb1">
                      <img src="https://via.placeholder.com/80" class="mx-1 img-thumbnail" alt="thumb2">
                      <img src="https://via.placeholder.com/80" class="mx-1 img-thumbnail" alt="thumb3">
                    </div> -->
                  </div>

                  <!-- Product Details -->
                  <div class="col-md-6">
                    <h1 class="product-title">{{$product->name}}</h1>
                    <div class="rating mb-2">
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star-half-alt"></i>
                      <i class="far fa-star"></i>
                      <span class="ml-2">(120 reviews)</span>
                    </div>
                    <p class="price">BDT {{$product->price}}</p>
                    <p>
                      Upgrade your fashion game with these stylish sneakers. Made with high-quality materials, 
                      they provide both comfort and durability for everyday wear.
                    </p>
                    <div class="mb-3">
                      <label for="size"><strong>Size:</strong></label>
                      <select id="size" class="form-control w-50">
                        <option>Choose size</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                      </select>
                    </div>
                    <div class="mb-3">
                      <label for="quantity"><strong>Quantity:</strong></label>
                      <input type="number" id="quantity" value="1" class="form-control w-25">
                    </div>
                    <button class="btn btn-primary btn-lg" onclick="addToCart({{$product->id}})">
                      <i class="fas fa-shopping-cart"></i> Add to Cart
                    </button>
                  </div>
            
        </div>

        <!-- Product Description Tabs -->
        <div class="row mt-5">
          <div class="col-12">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="desc-tab" data-toggle="tab" href="#desc" role="tab">Description</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab">Reviews</a>
              </li>
            </ul>
            <div class="tab-content border p-3" id="myTabContent">
              <div class="tab-pane fade show active" id="desc" role="tabpanel">
                <p>
                  {{$product->description}}
                </p>
              </div>
              <div class="tab-pane fade" id="review" role="tabpanel">
                <h5>Customer Reviews</h5>
                <p><strong>John D.</strong>: Great sneakers! Very comfortable.</p>
                <p><strong>Mary K.</strong>: Loved the design. Worth the price.</p>
              </div>
            </div>
          </div>
        </div>
        @empty

      @endforelse
</div>

<!-- Bootstrap 4 JS + FontAwesome -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>

</body>
</html>

@endsection

@push('scripts')
    <script>
        function addToCart(productId) {
            // Implement the logic to add the product to the cart
            // You might want to make an AJAX request to your server here
            fetch("{{ route('cart.add') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ product_id: productId })
            })
            .then(response => response.json())
            .then(data => {
                //console.log('Success:', data);
                alert('Product added to cart!');
            })
            .catch((error) => {
                //console.error('Error:', error);
                alert('Failed to add product to cart.');
            });

        }
    </script>
@endpush

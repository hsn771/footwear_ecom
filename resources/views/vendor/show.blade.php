@extends('layouts.master')

@section('content')

<div class="container py-5">
    <!-- Enhanced Vendor Header -->
    <div class="vendor-header bg-gradient rounded-4 shadow-lg p-4 mb-5">
        <div class="row align-items-center">
            {{-- <div class="col-md-3 text-center mb-4 mb-md-0">
                <div class="vendor-logo-wrapper">
                    <img src="{{ $vendors->logo ?? asset('images/default-logo.png') }}" 
                         class="img-fluid rounded-circle border-4 border-white shadow" 
                         alt="{{ $vendors->store_name }}"
                         style="width: 150px; height: 150px; object-fit: cover;">
                </div>
            </div> --}}
            <div class="col-md-12 text-center text-md-start">
                <h1 class="display-5 fw-bold text-white mb-3">{{ $vendors->store_name }} Store</h1>
                <div class="d-flex flex-column flex-md-row justify-content-center justify-content-md-start gap-3 mb-3">
                    <span class="badge bg-white text-primary fs-6 py-2 px-3">
                        <i class="fas fa-envelope me-2"></i> {{ $vendors->owner_contact }}
                    </span>
                    <span class="badge bg-white text-primary fs-6 py-2 px-3">
                        <i class="fas fa-store me-2"></i> {{ $vendors->products->count() }} Products
                    </span>
                </div>
                <p class="text-white-50 mb-0">Quality products from trusted Shop</p>
            </div>
        </div>
    </div>

    <!-- Enhanced Product Section -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold position-relative">
            <span class="position-relative z-1">Featured Products</span>
        </h2>
        <div class="dropdown">
            <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                <i class="fas fa-sort me-1"></i> Sort By
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Price: Low to High</a></li>
                <li><a class="dropdown-item" href="#">Price: High to Low</a></li>
                <li><a class="dropdown-item" href="#">Newest First</a></li>
            </ul>
        </div>
    </div>

    <div class="row g-4">
        @forelse($vendors->products as $product)
            <div class="col-md-4">
                <div class="card product-card h-100 border-0 shadow-sm overflow-hidden transition-all hover:shadow-lg hover:translate-y-n1">
                    <div class="position-relative">
                        <img src="{{asset('uploads/'.$product->image_url)}}" 
                             class="card-img-top product-img" 
                             alt="{{ $product->name }}"
                             style="height: 220px; object-fit: cover;">
                        @if($product->discount)
                            <span class="position-absolute top-0 end-0 badge bg-danger m-2">
                                {{ $product->discount }}% OFF
                            </span>
                        @endif
                    </div>
                    <div class="card-body d-flex flex-column">
                        <div class="mb-2">
                            <h5 class="card-title fw-bold mb-1">{{ $product->name }}</h5>
                            <div class="d-flex align-items-center gap-2">
                                <span class="h5 mb-0 text-primary fw-bold">৳{{ number_format($product->price, 2) }}</span>
                                @if($product->original_price)
                                    <span class="text-muted text-decoration-line-through small">৳{{ number_format($product->original_price, 2) }}</span>
                                @endif
                            </div>
                        </div>
                        <p class="card-text text-muted small mb-3">{{ Str::limit($product->description, 100) }}</p>
                        <div class="mt-auto d-flex gap-2">
                            <a href="{{ route('productdescription',$product->id) }}" 
                               class="btn btn-primary btn-sm flex-fill">
                                <i class="fas fa-eye me-1"></i> View Details
                            </a>
                            <a href="javascript:void(0)" onclick="addToCart({{$product->id}})" class="btn btn-outline-primary btn-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info border-0 bg-light rounded-4 py-4 text-center">
                    <i class="fas fa-box-open fa-3x text-primary mb-3 d-block"></i>
                    <h4 class="fw-bold">No Products Available</h4>
                    <p class="mb-0">This vendor hasn't added any products yet. Check back soon!</p>
                </div>
            </div>
        @endforelse
    </div>
</div>

@push('styles')
<style>
    .vendor-header {
        background: linear-gradient(135deg, #43beee 0%, #0c99a3 100%);
    }
    
    .product-card {
        transition: all 0.3s ease;
    }
    
    .product-card:hover {
        transform: translateY(-5px);
    }
    
    .product-img {
        transition: transform 0.5s ease;
    }
    
    .product-card:hover .product-img {
        transform: scale(1.05);
    }
</style>
@endpush

@push('scripts')
<script>
    // Add any interactive JavaScript here
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize tooltips if needed
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        });
    });

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
@endsection
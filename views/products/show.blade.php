@extends('products.layout')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <div class="card" style="border-radius: 20px; border: none; box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);">
                <div class="row g-0">
                  
                    <div class="col-md-6">
                        <img src="{{ asset('images/' . $product->product_image) }}" class="img-fluid rounded-start" alt="{{ $product->product_name }}" style="border-radius: 20px;">
                    </div>

                    <div class="col-md-6">
                        <div class="card-body">
                            <h3 class="card-title">{{ $product->product_name }}</h3>
                            <p class="text-muted">{{ $product->category->category_name }}</p>
                            {{-- <p class="text-muted">{{ $product->brand->brand_name }}</p> --}}
                            <p class="text-muted"><strong>Price: </strong> ₱{{ number_format($product->product_price, 2) }}</p>
                            <p><strong>Description:</strong> {{ $product->description }}</p>
                            <p><strong>Stock Quantity:</strong> {{ $product->stock_quantity }} units</p>
                            <p><strong>Status:</strong> {{ $product->stock_status }}</p>
                            

                            <div class="d-flex justify-content-between mt-3">
                                <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to Products</a>
                                <a href="{{ route('products.edit', $product->product_id) }}" class="btn btn-primary">Edit Product</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>

@endsection

            
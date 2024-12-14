@extends('products.layout')

@section('content')

<main class="col-md-9 ml-sm-auto col-lg-10 px-4"> 
<div class="d-flex justify-content-between align-items-center mb-4">
    <a class="btn btn-secondary btn-sm" href="{{ route('products.index') }}">
        <i class="fas fa-arrow-left"></i> Back to Products
    </a>
    <h2 class="text-dark mb-0">Add New Product</h2>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card shadow-sm rounded-lg p-5">
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <!-- Seller/User -->
            <div class="col-md-4 mb-4">
                <div class="form-group">
                    <label for="user_id"><strong>Seller/User</strong></label>
                    <select id="user_id" name="user_id" class="form-control">
                        <option value="">-- Select Seller Temporary --</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->username }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Product Name -->
            <div class="col-md-4 mb-4">
                <div class="form-group">
                    <label for="product_name"><strong>Product Name</strong></label>
                    <input type="text" id="product_name" name="product_name" class="form-control" placeholder="Enter Product Name">
                </div>
            </div>

            <!-- Price -->
            <div class="col-md-4 mb-4">
                <div class="form-group">
                    <label for="product_price"><strong>Price</strong></label>
                    <input type="number" id="product_price" name="product_price" step="0.01" class="form-control" placeholder="Enter Price">
                </div>
            </div>

            <!-- Category -->
            <div class="col-md-4 mb-4">
                <div class="form-group">
                    <label for="category_id"><strong>Category</strong></label>
                    <select id="category_id" name="category_id" class="form-control" required>
                        <option value="">-- Select Category --</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Brand -->
            <div class="col-md-4 mb-4">
                <div class="form-group">
                    <label for="brand_id"><strong>Brand</strong></label>
                    <select id="brand_id" name="brand_id" class="form-control" required>
                        <option value="">-- Select Brand --</option>
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->brand_id }}">{{ $brand->brand_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Stock Quantity -->
            <div class="col-md-4 mb-4">
                <div class="form-group">
                    <label for="stock_quantity"><strong>Stock Quantity</strong></label>
                    <input type="number" id="stock_quantity" name="stock_quantity" class="form-control" placeholder="Enter Stock Quantity">
                </div>
            </div>

            <!-- Stock Status -->
            <div class="col-md-4 mb-4">
                <div class="form-group">
                    <label for="stock_status"><strong>Stock Status</strong></label>
                    <select id="stock_status" name="stock_status" class="form-control">
                        <option value="In Stock">In Stock</option>
                        <option value="Out of Stock">Out of Stock</option>
                    </select>
                </div>
            </div>

            <!-- Product Image -->
            <div class="col-md-4 mb-4">
                <div class="form-group">
                    <label for="product_image"><strong>Product Image</strong></label>
                    <input type="file" id="product_image" name="product_image" class="form-control">
                </div>
            </div>
        </div>

        <!-- Description -->
        <div class="mb-4">
            <div class="form-group">
                <label for="description"><strong>Description</strong></label>
                <textarea id="description" name="description" class="form-control" rows="5" placeholder="Enter Product Description"></textarea>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="form-group text-right">
            <button type="submit" class="btn btn-primary px-4 py-2"><i class="fas fa-save"></i> Save Product</button>
        </div>
    </form>
</div>
</main>

@endsection

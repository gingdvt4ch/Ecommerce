@extends('products.layout')

@section('content')

<style>
    .container {
    max-width: 900px;
    margin: 0 auto;
    \end{style}
}
.card {
    border-radius: 10px;
    border: none;
    background-color: #f8f9fa;
    margin-top: 50px;
    box-shadow: 0 0 20px rgba(0,0,0,0.2);
}

.form-group {
    font-weight:inherit;
    color: #000000;
}

.form-control {
    border-radius: 5px;
    border: 1px solid #ced4da;
    padding: 10px;
    font-size: 14px;
}

.btn-primary {
    background-color: #014e9f;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    font-weight: bold;
}

.btn-primary:hover {
    background-color: #0165cf;
}
</style>

<div>
    <a class="btn btn-primary" href="{{ route('products.index') }}">BACK</a>
</div>
<div class="card shadow-sm p-4">
   
            <h2 class="mb-4">Add New Product</h2>

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

<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="row">
      
        <div class="col-md-4 mb-3">
            <div class="form-group">
                <strong>Seller/User:</strong>
                {{-- <input type="text" name="user_id" class="form-control" placeholder="Enter Your Name"> --}}
                <select name="user_id" class="form-control">
                    <option value="">-- Select Seller Temporary--</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->username }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="form-group">
                <strong>Product Name:</strong>
                <input type="text" name="product_name" class="form-control" placeholder="Enter Product Name">
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="form-group">
                <strong>Price:</strong>
                <input type="number" step="0.01" name="product_price" class="form-control" placeholder="Enter Price">
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="form-group">
                <strong>Category:</strong>
                <select name="category_id" class="form-control">
                    <option value="">-- Select Category Temporary --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                    @endforeach
                </select> 
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="form-group">
                <strong>Stock Quantity:</strong>
                <input type="number" name="stock_quantity" class="form-control" placeholder="Enter Stock Quantity">
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="form-group">
                <strong>Stock Status:</strong>
                <select name="stock_status" class="form-control">
                    <option value="In Stock">In Stock</option>
                    <option value="Out of Stock">Out of Stock</option>
                </select>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="form-group">
                <strong>Product Image:</strong>
                <input type="file" name="product_image" class="form-control">
                
            </div>
        </div>
    </div>
    
        <!-- descrip. here -->
        <div class="mb-3">
            <div class="form-group">
                <strong>Description:</strong>
                <textarea name="description" class="form-control" rows="5" placeholder="Enter Product Description"></textarea>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div> 
</form>

</div>
@endsection

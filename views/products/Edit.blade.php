@extends('products.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Product</h2>
            </div>

            <div class="pull-right">
               <a class="btn btn-primary" href="{{ route('products.index') }}">BACK</a>
            </div>
        </div>
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
{{-- here --}}
    <form action="{{ route('products.update', $product->product_id) }}" method="POST"> 
        @csrf
        @method('PUT')

        <div class="row">
            <!-- Product Name -->
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Product Name:</strong>
                    <input type="text" name="product_name" value="{{$product->product_name }}" class="form-control" placeholder="Enter Product Name">

                    
                </div>
            </div>
    
            <!-- Description -->
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description:</strong>
                    <textarea name="description" value="{{$product->description }}" class="form-control" rows="5" placeholder="Enter Product Description"></textarea>
                </div>
            </div>
    
            <!-- Product Price -->
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Price:</strong>
                    <input type="number" step="0.01" name="product_price" value="{{$product->product_price }}" class="form-control" placeholder="Enter Price">
                </div>
            </div>
    
           
    
            <!-- Stock Quantity -->
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Stock Quantity:</strong>
                    <input type="number" name="stock_quantity" value="{{$product->stock_quantity }}" class="form-control" placeholder="Enter Stock Quantity">
                </div>
            </div>
    
            <!-- Stock Status -->
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Stock Status:</strong>
                    <select name="stock_status" value="{{$product->stock_status }}" class="form-control">
                        <option value="In Stock">In Stock</option>
                        <option value="Out of Stock">Out of Stock</option>
                    </select>
                </div>
            </div>
    
            <!-- Product Image -->
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Product Image:</strong>
                    <input type="file" name="product_image" value="{{$product->product_image }}" class="form-control">
                </div>
            </div>

          <div class="col-xs-12 col-sm-12 col-md-12 text-center">
             <button type="submit" class="btn btn-primary">Submit</button>
          </div>
    </div>
 </form>
@endsection
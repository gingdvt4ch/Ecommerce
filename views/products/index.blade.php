@extends('products.layout')

@section('content')
    <div class="pull-left">
        <h3>Product CRUD</h3>
    </div>
    <div class="row">
        <div class="col-md-12 margin-tb">
            <div class="pull-right">
                 <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
      <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Product Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Stock Status</th>
            <th>Stock Quantity</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $product->product_name }}</td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->product_price }}</td>
            <td>{{ $product->stock_status }}</td>
            <td>{{ $product->stock_quantity }}</td>
            <td>
                <img src="{{ asset('images/' . $product->product_image) }}"style="width: 50px; height: 50px; object-fit: cover;">
            </td>
            
            <td>
                {{-- button ni dari dapita --}}
                <form action="{{ route('products.destroy', $product->product_id) }}" method="POST">
                    {{-- <a class="btn btn-info" href="{{ route('products.show', $product->product_id) }}">Show</a> --}}
                    <a class="btn btn-primary" href="{{ route('products.edit', $product->product_id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $products->links() !!}
@endsection

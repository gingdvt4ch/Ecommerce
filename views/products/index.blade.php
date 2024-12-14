@extends('products.layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar sa dashboard include dari/call nlng -->

        <main class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Product Management</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>
                </div>
            </div>

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            {{-- Search daria --}}
            <form method="GET" action="{{ route('products.index') }}" class="input-group mb-3 ">
                <input type="text" name="search" class="form-control" placeholder="Search products..." aria-label="Search products" value="{{ request()->input('search') }}">
                <button class="btn btn-outline-secondary" type="submit">Search</button>
            </form>
            
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="thead-dark">
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
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $product->product_name }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->product_price }}</td>
                                <td>{{ $product->stock_status }}</td>
                                <td>{{ $product->stock_quantity }}</td>
                                <td>
                                    <img src="{{ asset('images/' . $product->product_image) }}" class="rounded" style="width: 100px; height: 50px; object-fit: cover;">
                                </td>
                                <td>
                                    <form action="{{ route('products.destroy', $product->product_id) }}" method="POST" class="d-flex justify-content-center align-items-center gap-2">
                                        <a href="{{ route('products.show', $product->product_id) }}" class="btn btn-link text-primary" title="View">
                                            <i class="fas fa-eye" style="font-size: 1 rem;"></i>
                                        </a>
                                        <a href="{{ route('products.edit', $product->product_id) }}" class="btn btn-link text-primary" title="Edit">
                                            <i class="fas fa-edit" style="font-size: 1rem;"></i>
                                        </a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-link text-danger" title="Delete">
                                            <i class="fas fa-trash" style="font-size: 1rem;"></i>
                                        </button>
                                    </form>
                                </td>
                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {!! $products->links() !!}
        </main>
    </div>
</div>
@endsection

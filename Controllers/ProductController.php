<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
// pang import 


use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index(Request $request)
    {
    $query = $request->input('search');
    $products = Product::when($query, function ($queryBuilder) use ($query) {
        return $queryBuilder->where('product_name', 'like', '%' . $query . '%');
    })->paginate(4);

    return view('products.index', compact('products'))
        ->with('i', (request()->input('page', 1) - 1) * 4);
    }

    public function create()
    {
        //dari ang authentication needed temporary rani
        $users = collect([
            (object) ['id' => 1, 'username' => 'admin1'],
            (object) ['id' => 2, 'username' => 'admin2'],
        ]);

        $categories = Category::all();
        $brands = Brand::all();
        return view('products.create', compact('categories', 'brands', 'users'));
        
    }

    public function store(Request $request)
    {
         
         $request->validate([
            'product_name' => 'required',
            'description' => 'required',
            'product_price' => 'required|numeric',
            'category_id' => 'required|exists:categories,category_id',
            'brand_id' => 'required|exists:brands,brand_id',
            'user_id' => 'required',
            'stock_quantity' => 'required|integer',
            'stock_status' => 'required|in:In Stock,Out of Stock',
            'product_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        

        if ($request->hasFile('product_image')) {
            $imageName = time() . '.' . $request->product_image->getClientOriginalExtension();
            
            $filePath = $request->product_image->move(public_path('images'), $imageName);
            \Log::info('Image stored at: ' . $filePath);
        
            $request->merge(['product_image' => $imageName]);
        }
        
         // Creatproduct okay na pd
        Product::create($request->all());
        return redirect()->route('products.index')
            ->with('success', 'Product created successfully');
        
    }

    public function show(Product $product)
    { 
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        $brands = Brand::all();

        return view('products.edit', compact('product', 'categories', 'brands'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([  
        ]);
        $product->update($request->all());
        return redirect()->route('products.index')
        ->with('success','Products updated successfully');
    }

    public function destroy(Product $product)
    { 
        $product->delete();
                return redirect()->route('products.index')
                ->with('success','Product deleted successfully');
    }
}

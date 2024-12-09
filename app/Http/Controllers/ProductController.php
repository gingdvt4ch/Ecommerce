<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::latest()->paginate(10);

        return view('products.index', compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function create()
    {
        //temporary
        $categories = collect([
            (object) ['id' => 1, 'category_name' => 'Electronics'],
            (object) ['id' => 2, 'category_name' => 'Clothing'],
            (object) ['id' => 3, 'category_name' => 'Home Appliances'],
        ]);
        $users = collect([
            (object) ['id' => 1, 'username' => 'admin1'],
            (object) ['id' => 2, 'username' => 'admin2'],
        ]);
        
        return view('products.create', compact('categories', 'users'));
        // return view('products.create');
    }

    public function store(Request $request)
    {
         //to add
         $request->validate([
            'product_name' => 'required',
            'description' => 'required',
            'product_price' => 'required|numeric',
            'category_id' => 'required',
            // 'category_id' => 'required|exists:categories,id',
            // 'user_id' => 'required|exists:users,id',
            'user_id' => 'required',
            'stock_quantity' => 'required|integer',
            'stock_status' => 'required|in:In Stock,Out of Stock',
            'product_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        if ($request->hasFile('product_image')) {
            $imageName = time() . '.' . $request->product_image->getClientOriginalExtension();
            $request->product_image->move(public_path('images'), $imageName);
        
            
            $request->merge(['product_image' => $imageName]);
        }
        

        // Creatproduct okay na pd
        Product::create($request->all());
        return redirect()->route('products.index')
            ->with('success', 'Product created successfully');

        
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    { //okay na
       
        return view('products.show', compact('product'));

    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
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
    { //okay na
        $product->delete();
                return redirect()->route('products.index')
                ->with('success','Product deleted successfully');
    }
}

<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    
    
    public function index()
    {
        try {
            $products = auth()->user()->products;
            return view('products.index', compact('products'));
        } catch (\Exception $e) {
            return redirect()->route('products.index')->with('error', 'Failed to load products: ' . $e->getMessage());
        }
    }
    
    public function create()
    {
        try {
            return view('products.create');
        } catch (\Exception $e) {
            return redirect()->route('products.index')->with('error', 'Failed to load create form: ' . $e->getMessage());
        }
    }
    
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'price' => 'required|numeric|min:0',
                'stock' => 'required|integer|min:0',
                'status' => 'required|in:available,out_of_stock',
            ]);
    
            auth()->user()->products()->create($request->all());
    
            return redirect()->route('products.index')->with('success', 'Product created successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to create product: ' . $e->getMessage())->withInput();
        }
    }
    
    public function show(Product $product)
    {
        try {
            if ($product->user_id !== auth()->id()) {
                abort(403, 'Unauthorized action.');
            }
            
            return view('products.show', compact('product'));
        } catch (\Exception $e) {
            return redirect()->route('products.index')->with('error', 'Failed to show product: ' . $e->getMessage());
        }
    }
    
    public function edit(Product $product)
    {
        try {
            if ($product->user_id !== auth()->id()) {
                abort(401, 'Unauthorized action.');
            }
            
            return view('products.edit', compact('product'));
        } catch (\Exception $e) {
            return redirect()->route('products.index')->with('error', 'Failed to edit product: ' . $e->getMessage());
        }
    }
    
    public function update(Request $request, Product $product)
    {
        try {
            if ($product->user_id !== auth()->id()) {
                abort(401, 'Unauthorized action.');
            }
            
            $request->validate([
                'name' => 'required|string|max:255',
                'price' => 'required|numeric|min:0',
                'stock' => 'required|integer|min:0',
                'status' => 'required|in:available,out_of_stock',
            ]);
    
            $product->update($request->all());
    
            return redirect()->route('products.index')->with('success', 'Product updated successfully!');
        }catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update product: ' . $e->getMessage())->withInput();
        }
    }
    
    public function destroy(Product $product)
    {
        try {
            if ($product->user_id !== auth()->id()) {
                abort(401, 'Unauthorized action.');
            }
            
            $product->delete();
    
            return redirect()->route('products.index')->with('success', 'Product deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->route('products.index')->with('error', 'Failed to delete product: ' . $e->getMessage());
        }
    }
}

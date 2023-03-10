<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\CreateProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('created_at', 'DESC')->with('category')->get();
        return view('admin.product.index', [
            'title' => 'products',
            'products' => $products
        ]);
    }

    public function create()
    {
        $category = Category::with('product')->get();
        // view
        return view('admin.product.create', [
            'title' => 'Product Add',
            'category' => $category
        ]);
    }

    public function store(CreateProductRequest $request)
    {
        // Save Data to Database
        Product::create([
            'name' => strtolower($request->name),
            'category_id' => $request->category_id,
            'stock' => $request->stock,
        ]);
        // flash data
        return redirect()->to('/product')->with([
            'status' => 'success',
            'message' => 'Product Add successfully!!',
        ]);
    }

    public function edit(Product $product)
    {
        $category = Category::get();
        // view
        return view('admin.product.update', [
            'title' => 'Product Edit',
            'category' => $category,
            'product' => $product
        ]);
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        if ($request->stock === '') {
            $stock = $request->old_stock;
        } else if ($request->input('action') == 'add') {
            $stock = $product->stock + $request->stock;
        } else if ($request->input('action') == 'reduce') {
            $stock = $product->stock - $request->stock;
        }
        // update product data
        $product->update([
            'name' => strtolower($request->name),
            'category_id' => $request->category_id,
            'stock' => $stock,
        ]);
        // flash data
        return redirect()->to('/product')->with([
            'status' => 'success',
            'message' => 'Product Update successfully!!',
        ]);
    }

    public function destroy(Product $product)
    {
        // Delete user
        $product->delete();
        // flash data
        return redirect()->back()->with([
            'status' => 'success',
            'message' => 'Category Delete successfully!!',
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    public function index(){
        $products = Product::latest()->paginate(3);
        
        return view('products.index', ['products' => $products]);
    }

    public function create(){
        return view('products.create');
    }

    public function save(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required | mimes:jpeg,jpg,png,gif,svg | max:2000'
        ]);

        $image = time() . '.' . $request->image->extension();
        $request->image->move(public_path('products'), $image);

        Product::create($data);
        
        return back()->withSuccess('Product created');
    }

    public function edit(Product $product){
        return view('products.edit', ['product' => $product]);
    }

    public function update(Request $request, Product $product){
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable | mimes:jpeg,jpg,png,gif,svg | max:2000'
        ]);

        if(isset($request->image)){
            $image = time() . '.' . $request->image->extension();
            $request->image->move(public_path('products'), $image);
            $data->image = $image;
        }

        $product->update($data);
        
        return back()->withSuccess('Product updated');
    }

    public function delete(Product $product){
        $product->delete();
        
        return back()->withSuccess('Product deleted');
    }

    public function view(Product $product){
        return view('products.view', ['product' => $product]);
    }
}

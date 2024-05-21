<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(){
        $products = Product::get();
        return response()->json(['message' => 'products', 'data' => $products, 'success' => true], 200);
    }

    public function create(Request $request){
        $product = new Product();
        $product->code = $request->code;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->total_price = $request->quantity * $request->price;
        $product->save();
        return response()->json(['message' => 'create product', 'success' => true], 200);
    }

    public function edit($id){
        $product = Product::find($id);
        return response()->json(['message' => 'edit product', 'data' => $product, 'success' => true], 200);
    }

    public function update(Request $request, $id) {
        $product = Product::find($id);
        $product->code = $request->code;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->total_price = $request->quantity * $request->price;
        $product->save();
        return response()->json(['message' => 'update product', 'success' => true], 200);
    }

    public function delete($id) {
        $product = Product::find($id);
        $product->delete();
        return response()->json(['message' => 'delete product', 'success' => true], 200);
    }
}

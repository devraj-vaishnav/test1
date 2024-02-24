<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products=Product::get();
        return view('admin.product.index',compact('products'));
    }
    public function create(){
        return view('admin.product.create');
    }
    public function store(Request $request){
        $request->validate([
            'name'=>'required',
            'price'=>'required'
        ]);
        $product = New Product;
        $product->name=$request['name'];
        $product->price=$request['price'];
        $product->save();
        return redirect('product/index');
    }
    public function delete($id){
        Product::where('id', $id)->delete();
        return redirect('product/index');
    }
    public function edit($id){
        $edit = Product ::find($id);
        return view('admin.product.edit',compact('edit'));

    }
    public function update(Request $request,$id){
       $request->validate([
            'name'=>'required',
            'price'=>'required'
        ]);
        $products = Product::find($id);
        $products->name=$request['name'];
        $products->price=$request['price'];
        $products->save();
        return redirect('product/index');
    }
}

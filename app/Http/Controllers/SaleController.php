<?php

namespace App\Http\Controllers;
use App\Models\product;
use App\Models\Customer;
use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
 {
    public function index(){
        $customers=Customer::get();
        return view('admin.sale.index',compact('customers'));
    }
    public function create(){
        $products= Product::get();
        return view('admin.sale.create',compact('products'));
    }

    public function filter(Request $request){

        $product = $request->id;
        $product = Product::find($product);
        return view('admin/sale/filter',compact('product'));
            // echo $product->price;
      }

     public function store(Request $request) {
     $request->validate([
        'name' => 'required',
        'mobile_no' => 'required',
        'date' => 'required',
        'address' => 'required'
     ]);
      $customer = new Customer;
    $customer->name= $request['name']; 
    $customer->mobile_no=$request['mobile_no']; 
    $customer->date=$request['date']; 
    $customer->address=$request['address']; 
    $customer->save();

   $products = $request->product_id;
   $price = $request->price;
    $qty = $request->qty;
    $total = $request->total;

    foreach ($products as $key => $product) {
    $customerProduct = new Sale;
    $customerProduct->customer_id = $customer->id;
    $customerProduct->product_id = $product;
    $customerProduct->price = $price[$key];
    $customerProduct->qty = $qty[$key];
    $customerProduct->total = $total[$key];
    $customerProduct->save();
    }
   return redirect('sale/index');
    }
    public function delete($id){
        Customer::where('id',$id)->delete();
        return redirect('sale/index');
    }
    public function edit($id){
        $edit=Customer::find($id);
        $sales = Sale::where('customer_id', $id)->get();
        $products= Product::get();
        return view('admin/sale/edit',compact('edit','sales','products'));
    }
    public function view($id){
        $customer=Customer::find($id);
        $sales = Sale::where('customer_id', $id)->get();
        return view('admin/sale/view',compact('sales','customer'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'mobile_no' => 'required',
            'date' => 'required',
            'address' => 'required'
        ]);
        $update = Customer::find($id);
        $update->name = $request['name'];
        $update->mobile_no = $request['mobile_no'];
        $update->date = $request['date'];
        $update->address = $request['address'];
        $update->save();
         $products = $request->product_id;
        $price = $request->price;
        $qty = $request->qty;
        $total = $request->total;
        $old = $request->old;

        foreach ($products as $key => $product) {
            if (!isset($old[$key])) {
                $sale = new Sale;
                $sale->customer_id = $update->id; 
                $sale->product_id = $product;
                $sale->price = $price[$key];
                $sale->qty = $qty[$key];
                $sale->total = $total[$key];
            } else {
            
                $id = $old[$key];
                $sale = Sale::find($id); 
                $sale->product_id = $product;
                $sale->price = $price[$key];
                $sale->qty = $qty[$key];
                $sale->total = $total[$key];
            }
            $sale->save();
        }
        return redirect('sale/index');
    } 
    public function rowdelete( Request $request){
        Sale::where('id',$id)->delete();

    }
    
}

 
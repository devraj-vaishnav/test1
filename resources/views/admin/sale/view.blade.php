@extends('layouts.app')
@section('main-content')

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">Starter page</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb">

                                <li>
                                    <button class="btn btn-dark" onclick="window.print()"><i
                                            class="ri-printer-line fs-1"></i></button>

                                    <a class="btn btn-primary" href="{{route('sale/index')}}">Back</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->
{{-- 

            <div class="row mt-5">
                <div class="col">
                    <h1 class="text-center">Company Bill Book</h1>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-6">
                    <h3>Bill To:</h3>
                    <p>Customer Name: John Doe</p>
                    <p>Address: 123 Main St, City, Country</p>
                    <p>Email: john@example.com</p>
                    <p>Phone: 123-456-7890</p>
                </div>
                <div class="col-md-6">
                    <h3>Invoice Details:</h3>
                    <p>Invoice Number: #12345</p>
                    <p>Date: February 24, 2024</p>
                    <p>Due Date: March 10, 2024</p>
                    <p>Payment Method: Credit Card</p>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Item</th>
                                <th scope="col">Description</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Unit Price</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Item 1</td>
                                <td>Description of Item 1</td>
                                <td>2</td>
                                <td>$50</td>
                                <td>$100</td>
                            </tr>
                            <tr>
                                <td>Item 2</td>
                                <td>Description of Item 2</td>
                                <td>1</td>
                                <td>$75</td>
                                <td>$75</td>
                            </tr>
                            <!-- Add more rows as needed -->
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <h3>Total Amount: $175</h3>
                </div>
            </div> --}}
            <div class="row d-flex justify-content-center">
                <div class="col-sm-10">
                    <div class="card">
                        <div class="card-body">
                          
                            <div class="row mt-5">
                                <div class="col">
                                    <h1 class="text-center">Company Bill Book</h1>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <h4>Bill To:</h4>
                                    <p>Customer Name:  {{$customer->name}}</p>
                                    <p>Address: {{$customer->address}}</p>
                                    <p>Phone: {{$customer->mobile_no}}</p>
                                </div>
                                <div class="col-md-6">
                                    <h4>Invoice Details:</h4>
                                    <p>Invoice Number: #12345</p>
                                    <p>Date: {{$customer->date}}</p>
                                    <p>Payment Method: Credit Card</p>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Item</th>
                                                <th scope="col">Product Name</th>
                                                <th scope="col">Product Price</th>
                                                <th scope="col">Quantity</th>
                                                <th scope="col">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($sales as $sale )
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$sale->product->name}}</td>
                                                <td>{{$sale->product->price}}</td>
                                                <td>{{$sale->qty}}</td>
                                                <td>{{$sale->total}}</td>
                                            </tr>
                                            @endforeach
        
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <h3>Total Amount: $175</h3>
                                </div>
                            
                        </div>
                    </div>
                </div> <!-- container-fluid -->
                {{-- <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h4>Sale Details</h4>
                            <table id="datatable" class="table table-bordered dt-responsive  mt-3 nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>SR No.</th>
                                        <th>Product Name</th>
                                        <th>Product Price</th>
                                        <th>qty</th>
                                        <th> Total</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sales as $sale )
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$sale->product->name}}</td>
                                        <td>{{$sale->product->price}}</td>
                                        <td>{{$sale->qty}}</td>
                                        <td>{{$sale->total}}</td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> --}}
            </div>
            <!-- End Page-content -->




            {{-- <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h4>Customer Details</h4>

                            <table id="datatable" class="table table-bordered dt-responsive  mt-3 nowrap w-100 noPrint">
                                <thead>
                                    <tr>
                                        <th>Customer Name</th>
                                        <th> Bill Date</th>
                                        <th>Mobile number</th>
                                        <th>Address</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{$customer->name}}</td>
                                        <td>{{$customer->date}}</td>
                                        <td>{{$customer->mobile_no}}</td>
                                        <td>{{$customer->address}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> <!-- container-fluid -->
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h4>Sale Details</h4>
                            <table id="datatable" class="table table-bordered dt-responsive  mt-3 nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>SR No.</th>
                                        <th>Product Name</th>
                                        <th>Product Price</th>
                                        <th>qty</th>
                                        <th> Total</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sales as $sale )
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$sale->product->name}}</td>
                                        <td>{{$sale->product->price}}</td>
                                        <td>{{$sale->qty}}</td>
                                        <td>{{$sale->total}}</td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> --}}
            <!-- End Page-content -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> © Nazox.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-right d-none d-sm-block">
                                Crafted with <i class="mdi mdi-heart text-danger"></i> by <a href="#"
                                    target="_blank">HelloDeveloper</a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        @endsection
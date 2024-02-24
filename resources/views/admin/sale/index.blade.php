@extends('layouts.app')

@push('header_script')
<link href="{{asset('assets/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
@endpush
@section('main-content')

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">Sale Details</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                               
                                <li>
                                    <button class="btn btn-dark"  onclick="window.print()"><i class="ri-printer-line fs-1"></i></button>

                                    <a class="btn btn-primary" href="{{route('sale/create')}}">+ Add</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="datatable" class="table table-bordered dt-responsive  mt-3 nowrap w-100">
                                <thead>
                                <tr>
                                    <th>SR No.</th>
                                    <th>Customer Name</th>
                                    <th>Date</th>
                                    <th>Mobile Number</th>
                                    <th>Address</th>
                                    <th>Operation</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($customers as $customer )
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$customer->name}}</td>
                                    <td>{{$customer->date}}</td>
                                    <td>{{$customer->mobile_no}}</td>
                                    <td>{{$customer->address}}</td>
                                   <td>
                                        <a href="{{route('sale/edit', ['id' => $customer['id']])}}" class="btn btn-primary"><i class="ri-pencil-line"></i></a>
                                        <a href="{{route('sale/delete', ['id' => $customer['id']])}}" class="btn btn-danger btn waves-effect waves-light" id="sa-position"><i class="ri-delete-bin-7-fill"></i></a>
                                        <a href="{{route('sale/view', ['id' => $customer['id']])}}" class="btn btn-success">View</a>
                                    </td>
                                </tr>
                                 @endforeach 
                                </tbody>
                            </table>
                        </div>
                    </div>
        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <script>document.write(new Date().getFullYear())</script> © Nazox.
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-right d-none d-sm-block">
                        Crafted with <i class="mdi mdi-heart text-danger"></i> by <a href="#" target="_blank">HelloDeveloper</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
@endsection
@push('footer_script')
<script src="{{asset('assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>

<!-- Sweet alert init js-->
<script src="{{asset('assets/js/pages/sweet-alerts.init.js')}}"></script>
@endpush
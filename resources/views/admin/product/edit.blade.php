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
                            <ol class="breadcrumb m-0">
                                <li>
                                    <a class="btn btn-primary" href="{{route('product/index')}}">Back</a>
                                </li>
                               
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Update Product Detail</h4>
                            <form class="outer-repeater" action="{{route('product/update',$edit->id)}}" method="post">
                            @csrf
                                <div data-repeater-list="outer-group" class="outer">
                                    <div data-repeater-item class="outer">
                                        <div class="form-group row mb-4">
                                            <label for="taskname" class="col-form-label col-lg-2">Product Name</label>
                                            <div class="col-lg-10">
                                                <input id="taskname" name="name" value="{{$edit->name}}" type="text" class="form-control" placeholder="Enter  Name...">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label for="taskname" class="col-form-label col-lg-2">Product price</label>
                                            <div class="col-lg-10">
                                                <input id="taskname" name="price" value="{{$edit->price}}" type="text" class="form-control" placeholder="Enter  Name...">
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="col-lg-10">
                                        <button type="submit" class="btn btn-primary">Update Detail</button>
                                    </div>
                                </div>
                            </form>
                            
    
                        </div>
                    </div>
                </div>
            </div>

           
         <!-- container-fluid -->
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
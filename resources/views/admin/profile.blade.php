@extends('layouts.app')
@section('main-content')

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title mb-4 fs-3">Update Details</h3>
                            <form class="outer-repeater" action="{{route('profile/update',$user->id)}}" method="post">
                                @csrf
                                <div data-repeater-list="outer-group" class="outer">
                                    <div data-repeater-item class="outer">
                                        <div class="form-group row mb-4">
                                            <label for="taskname" class="col-form-label col-lg-4">User Name</label>
                                            <div class="col-lg-5">
                                                <input id="taskname" name="name" value="{{$user->name}}" type="text" class="form-control"
                                                  >
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label for="taskname" class="col-form-label col-lg-4">User Email</label>
                                            <div class="col-lg-5">
                                                <input id="taskname" name="email" value="{{$user->email}}" type="text" class="form-control"
                                                    >
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
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title mb-4 fs-3"> Password Forgat</h3>
                            <form class="outer-repeater" action="{{route('profile/password',$user->id)}}" method="post">
                                @csrf
                                <div data-repeater-list="outer-group" class="outer">
                                    <div data-repeater-item class="outer">
                                        <div class="form-group row mb-4">
                                            <label for="taskname" class="col-form-label col-lg-4">Old Name</label>
                                            <div class="col-lg-5">
                                                <input id="taskname"   name="old_password" type="password" class="form-control"
                                                    placeholder="  ">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label for="taskname" class="col-form-label col-lg-4">New Password</label>
                                            <div class="col-lg-5">
                                                <input id="taskname" name="password" type="password" class="form-control"
                                                   >
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label for="taskname" class="col-form-label col-lg-4">Confrom Password</label>
                                            <div class="col-lg-5">
                                                <input id="taskname" name="password_confirmation"  type="password" class="form-control"
                                                   >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="col-lg-10">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

        </div> <!-- container-fluid -->
    </div>
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
@extends('layouts.app')
@push('header_script')
<link href="{{asset('assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}" rel="stylesheet">
@endpush
@section('main-content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">Edit page</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li>
                                    <a class="btn btn-primary" href="{{route('sale/index')}}">back</a>
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
                            <form method="post" action="{{route('sale/update',$edit->id)}}">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-6 ">
                                        <div class="mb-3">
                                            <label for="manufacturerbrand">Customer Name<span
                                                    class="text-danger">*</span></label>
                                            <input name="name" type="text" value="{{$edit->name}}" class="form-control"
                                                placeholder="Customer Name.....">
                                            <span class="text-danger">{{$errors->first('name')}}</span>
                                        </div>
                                        <div class="mb-3">
                                            <label for="Pancard">Moblie Number<span class="text-danger">*</span></label>
                                            <input id="" name="mobile_no" value="{{$edit->mobile_no}}" type="number"
                                                class="form-control" placeholder="Mobile Number">
                                            <span class="text-danger">{{$errors->first('moblie_no')}}</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <div class="form-group ">
                                                <label> Date <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" value="{{$edit->date}}"
                                                        name="date" data-provide="datepicker"
                                                        data-date-format="dd M, yyyy" data-date-autoclose="true">
                                                    <span class="text-danger">{{$errors->first('date')}}</span>

                                                    <div class="input-group-append">
                                                        <span class="input-group-text"><i
                                                                class="mdi mdi-calendar"></i></span>
                                                    </div>
                                                </div><!-- input-group -->
                                            </div>
                                            <div class="mb-3">
                                                <label for="productdesc">Adderss<span
                                                        class="text-danger">*</span></label>
                                                <textarea class="form-control" id="productdesc" name="address"
                                                    rows="1">{{$edit->address}}</textarea>
                                                <span class="text-danger">{{$errors->first('address')}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <table class="table">
                                    <tr>
                                        <th> Sr No</th>
                                        <th>Product Name</th>
                                        <th>Product Price</th>
                                        <th>qty</th>
                                        <th>Total</th>
                                        <th>
                                            <button class="btn btn-primary ms-5" type="button" id="button"><i
                                                    class="fas fa-plus"></i></button>
                                        </th>
                                    </tr>
                                    @php
                                    $u = 2;
                                    @endphp

                                    @foreach ($sales as $sale )

                                    <tr>
                                        <input type="hidden" name="old[]" value="{{$sale->id}}" />
                                        <td>{{$loop->iteration}} </td>
                                        <td>
                                            <select name="product_id[]" class="form-control" id="product{{$u}}">
                                                <option value="">Select Product</option>
                                                @foreach ($products as $product)
                                                <option value="{{$product->id}}" {{( $product->id ==
                                                    $sale->product_id)
                                                    ? 'selected' : '' }}>{{$product->name}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td><input type="text" class="form-control" name="price[]" id="price{{$u}}"
                                                value="{{$sale->price}}"></td>
                                        <td><input type="text" class="form-control" name="qty[]" id="qty{{$u}}"
                                                value="{{$sale->qty}}">
                                        </td>
                                        <td><input type="text" class="form-control" name="total[]" id="total{{$u}}"
                                                value="{{$sale->total}}">
                                        </td>
                                    </tr>
                                    @php
                                    $u++;
                                    @endphp
                                    @endforeach
                                    <tbody id="addInput">
                                    </tbody>
                                </table>
                                <div class="d-flex flex-wrap gap-2">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Update
                                        Detail</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Page-content -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>
                                document.write(new Date().getFullYear())
                            </script>
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

        @push('footer_script')

        <script>
            $(function () {
       $("select[id^=product]").on('change', function () {
        var id = $(this).val();
        console.log(id);
        var last_num = $(this).attr('id').slice(-1); 
        $.ajax({
            url: "{{ route('sale/filter') }}",
            type: 'GET',
            data: { id: id },
            success: function (response) {
                $("#price" + last_num).val(response);
            }
        });
    });

    $("input[id^=price]").keyup(function () {
        var price = Number($(this).val());
        console.log(price);
        var last_num = $(this).attr('id').slice(-1);
        var qty = Number($("#qty" + last_num).val());
        $("#total" + last_num).val(qty * price);
    });
});

$("input[id^=qty]").keyup(function () {
        var qty = Number($(this).val());
        var last_num = $(this).attr('id').slice(-1);
        var price = Number($("#price" + last_num).val());

        $("#total" + last_num).val(qty * price);
    });


         $(document).ready(function () {
  @php
    $i = $u + 1; 
@endphp
 
let i = {{ $i }};
        $("#button").on('click', function () {
            let rowData = "<tr>";
            rowData += "<td>"+i+"</td>";
            rowData += "<td> <select name='product_id[]' class='form-control' id='productname"+i+"' > <option value=''>Select Product</option>  @foreach ($products as $product)  <option value='{{$product->id}}'>{{$product->name}}</option> @endforeach </select></td>";
            rowData += "<td><input type='number'  name='price[]' id='price"+i+"'  placeholder='Price....' class='form-control' ></td>";
            rowData += "<td><input type='number'  name='qty[]' id='qty"+i+"'  placeholder='qty....' class='form-control' ></td>";
            rowData += "<td><input type='number'  name='total[]' id='total"+i+"'  placeholder='total....' class='form-control' ></td>";
            rowData += "</tr>"
            $("#addInput").append(rowData);
            i++; 
            $("select[id^=productname]").on('change', function () {
               var id = $(this).val();
               var last_num = $(this).attr('id').slice(-1);
                   $.ajax({
                url: "{{route('sale/filter')}}",
                type: 'GET',
                data: { id: id },
                success: function (response) {
               $("#price"+last_num).val(response);
                }
            });
        });
        $("input[id^=qty]").keyup(function () {
                var qty = Number($(this).val());
                var last_num = $(this).attr('id').slice(-1);
                var price = Number($("#price" + last_num).val());
                $("#total" + last_num).val(qty * price);
            });

            $("input[id^=price]").keyup(function () {
                var price = Number($(this).val());
                var last_num = $(this).attr('id').slice(-1);
                var qty = Number($("#qty" + last_num).val());
                $("#total" + last_num).val(qty * price);
            });

            $('#price').keyup(function () {
                var price = Number($(this).val());
                var qty = Number($("#qty").val());
                var total=Number(qty*price);
                $("#total").val(total);
            });
        });
    });
      
        </script>
        <script src="{{asset('assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
        @endpush
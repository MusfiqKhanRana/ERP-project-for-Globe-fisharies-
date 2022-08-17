@extends('backend.master')
@section('site-title')
    inventory store-in
@endsection
@section('main-content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            @if(Session::has('msg'))
                <script>
                    $(document).ready(function(){
                        swal("{{Session::get('msg')}}","", "success");
                    });
                </script>
            @endif
            <!-- BEGIN PAGE TITLE-->
            <h3 class="page-title bold">Requisition
                <small> Requisition-managment </small>
            </h3>
            <hr>
            @if (count($errors) > 0)
                <div class="row">
                    <div class="col-md-06">
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
            <div class="portlet box blue-chambray">
                <div class="portlet-title">
                <div class="caption">
                <i class="fa fa-briefcase"></i>Store-In List
                </div>
                </div>
                <div class="portlet-body">
                    <div class="table-scrollable">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Item Name</th>
                                <th>Type</th>
                                <th>Varient</th>
                                <th>Grade</th>
                                <th>Quantity(kg)</th>
                                <th style="text-align: center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($ppu as $key=> $data)
                                    <tr id="row1">
                                        <td class="text-align: center;"> {{$data->production_processing_item->name}}</td>
                                        <td class="text-align: center;"> {{$data->processing_name}}</td>
                                        <td class="text-align: center;"> {{$data->processing_variant}}</td>
                                        <td class="text-align: center;"> 
                                            @foreach ($data->production_processing_grades as $item)
                                                @if ($item->block_name != null)
                                                    <li>Block : {{$item->block_name}} KG</li>
                                                    <li>Block Size: {{$item->block_size}}</li>
                                                @endif
                                                @if ($item->grade_id != null)
                                                    <li>Grade Name : {{$item->grade_name}}</li>
                                                @endif
                                                @if ($item->grade_id == null && $item->block_id == null)
                                                    <p style="color: red">Not Selected</p>
                                                @endif
                                            @endforeach
                                        </td>
                                        <td class="text-align: center;"> {{$data->alive_quantity+$data->dead_quantity}}</td>
                                        <td style="text-align: center">
                                            <a class="btn green move_to_store"  data-toggle="modal" data-quantity="{{$data->alive_quantity+$data->dead_quantity}}" data-processing_variant="{{$data->processing_variant}}" data-processing_name="{{$data->processing_name}}" data-item_name="{{$data->production_processing_item->name}}" data-production_processing_grades="{{$data->production_processing_grades}}" href="#move_to_storeModal" data-id="{{$data->id}}"><i class="fa fa-edit"></i>Move to Store</a>
                                            {{-- @if ($data->store_in_status=='QC_checked')
                                                <a class="btn btn-success"  data-toggle="modal" href="{{route('metal-detector.show',$data->id)}}"><i class="fa fa-edit"></i>MD Form</a>
                                            @endif
                                            @if ($data->store_in_status=='MD_checked')
                                                <a class="btn green move_to_store"  data-toggle="modal" href="#move_to_storeModal" data-id="{{$data->id}}"><i class="fa fa-edit"></i>Move to Store</a>
                                            @endif --}}
                                        </td>
                                    </tr>                       
                                @endforeach
                            </tbody>
                        </table>
                        <div id="move_to_storeModal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form class="form-horizontal" role="form" method="post" action="{{route('inventory.move_to_store')}}">
                                        {{csrf_field()}}
                                        <input type="hidden" name="inputs" class="inputs">
                                        <input type="hidden" name="production_processing_unit_id" class="production_processing_unit_id">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                        <h2 class="modal-title" style="color: rgb(75, 65, 65);">Move To Store</h2>
                                    </div>
                                    <br>
                                    <div class="modal-body">
                                        @csrf
                                        <div class="row" style="margin-bottom:6%">
                                            <div class="col-md-6">
                                                <p>Item Name : <b><span class="item_name"></span></b></p>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Item Quantity : <b><span class="item_quantity"></span></b></p>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Item Type : <b><span class="item_type"></span></b></p>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Item Varient : <b><span class="item_varient"></span></b></p>
                                            </div>
                                        </div><hr>
                                        <div class="row select_option" style="margin-bottom:5%">
                                            <div class="col-md-5">
                                                <label>Select Grade</label>
                                                <select type="text" class="form-control grade_select" >
                                                    <option>--Select--</option>
                                                    @foreach ($grades as $item)
                                                    <option value="{{$item->id}}" data-grade_name="{{$item->name}}">{{$item->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-5" >
                                                <label>Quantity (Kg) </label>
                                                <input type="text" class="form-control grade_weight"  placeholder="weight">
                                            </div>
                                            <div class="col-md-2" style="margin-top: 3%">
                                                <button type="button" class="btn btn-success add_btn">add</button>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <table class="table table-striped table-bordered table-hover fillet_grading_table">
                                                    <thead>
                                                        <tr>
                                                            <th>
                                                                Grade
                                                            </th>
                                                            <th>
                                                                Quantity (Kg)
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                300-500gm
                                                            </td>
                                                            <td>
                                                                5
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="modal-footer">
                                        <button type="submit" class="m-10 btn btn-success">Confirm</button>
                                        <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            {{-- <div class="col-md-12 text-center">{{ $employee->links() }}</div> --}}
                            {{ $ppu->links('vendor.pagination.custom') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
     </div>
@endsection
@section('script')
<script>
    $(document).ready(function()
    {
        $(".move_to_store").click(function () {
            console.log($(this).data("id"));
            
            var grade = $(this).data("production_processing_grades");
            $(".item_name").html($(this).data("item_name"));
            $(".item_quantity").html($(this).data("quantity"));
            $(".item_type").html($(this).data("processing_name"));
            $(".item_varient").html($(this).data("processing_variant"));
            var ppu_id = $(this).data("id");
            console.log(grade.length); 
            if (grade.length==0) {
                $(".select_option").show();
                $('.production_processing_unit_id').val(ppu_id);
                $("table.fillet_grading_table tbody tr").empty();
                var product_array = [];
                var grade_id , grade_name ,grade_weight = null; 
                $('.grade_select').change(function() {
                    grade_id=$('option:selected',this).val();
                    grade_name =$('option:selected',this).attr("data-grade_name");
                    console.log(grade_name);
                });
                $('.grade_weight').on("change keyup",function() {
                    grade_weight = $(this).val();
                });
                $('.add_btn').click(function () {
                    $("table.fillet_grading_table tbody tr").empty();
                    product_array.push({"grade_id":grade_id,"grade_name":grade_name,"grade_weight":grade_weight,"status":"stay"});
                    $.each( product_array, function( key, product ) {
                        if (product.status == "stay") {
                            $("table.fillet_grading_table tr").last().after("<tr class='delete"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_weight+"</td><td><button class='btn btn-danger delete' data-id='"+key+"'>Delete</button></td></tr>");
                        }
                    });
                    $(".inputs").val('');
                    $(".inputs").val(JSON.stringify(product_array));
                    $('.grade_weight').val(0);
                    $('.grade_select').val("--select--");
                    $(".delete").click(function(){
                        console.log('good');
                        product_array[$(this).data("id")].status="delete";
                        $(".inputs").val(JSON.stringify(product_array));
                        $('.grade_weight').val(0);
                        $('.grade_select').val("--select--");
                        $(".delete"+$(this).data("id")).remove();
                    });
                })
            }
            if (grade.length!=0) {
                $('.production_processing_unit_id').val(ppu_id);
                $(".select_option").hide();
                console.log(grade);
                $("table.fillet_grading_table tbody tr").empty();
                $.each( grade, function( key, product ) {
                        if (product.block_id==null) {
                            $("table.fillet_grading_table tr").last().after("<tr><td>"+product.grade_name+"</td><td>"+product.grade_quantity+"</td></tr>");   
                        }
                        if (product.grade_id==null) {
                            $("table.fillet_grading_table tr").last().after("<tr><td>"+product.block_name+"</td><td>"+product.block_quantity+"</td></tr>");   
                        }
                    });
            }
        });
    });
</script>
@endsection
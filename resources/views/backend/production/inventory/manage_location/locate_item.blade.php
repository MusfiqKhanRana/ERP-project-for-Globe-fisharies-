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
            <h3 class="page-title bold">Inventory
                <small> Manage Location </small>
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
                <i class="fa fa-briefcase"></i>Locate Item
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
                                <tr id="row1">
                                    <td class="text-align: center;">Pangas</td>
                                    <td class="text-align: center;">IQF</td>
                                    <td class="text-align: center;">Whole</td>
                                    <td class="text-align: center;">300-500gm/3pcs</td>
                                    <td class="text-align: center;">40</td>
                                    <td style="text-align: center">
                                        <a class="btn btn-info"  data-toggle="modal" href="#Add_Location_Modal"><i class="fa fa-edit"></i>Add Location</a>
                                    </td>
                                </tr> 
                                <tr id="row1">
                                    <td class="text-align: center;">Pangas</td>
                                    <td class="text-align: center;">IQF</td>
                                    <td class="text-align: center;">Whole</td>
                                    <td class="text-align: center;">300-500gm/3pcs</td>
                                    <td class="text-align: center;">40</td>
                                    <td style="text-align: center">
                                        <a class="btn btn-info"  data-toggle="modal" href="#Add_Location_Modal"><i class="fa fa-edit"></i>Add Location</a>
                                    </td>
                                </tr>
                                {{-- @foreach($ppu as $key=> $data)
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
                                            @if ($data->store_in_status=='Initial')
                                                <a class="btn btn-info"  data-toggle="modal" href="{{route('microbiological.test.report.genarate',$data->id)}}"><i class="fa fa-edit"></i>QC Form</a>
                                            @endif
                                            @if ($data->store_in_status=='QC_checked')
                                                <a class="btn btn-success"  data-toggle="modal" href="{{route('metal-detector.show',$data->id)}}"><i class="fa fa-edit"></i>MD Form</a>
                                            @endif
                                            @if ($data->store_in_status=='MD_checked')
                                                <a class="btn green move_to_store"  data-toggle="modal" href="#move_to_storeModal" data-id="{{$data->id}}"><i class="fa fa-edit"></i>Move to Store</a>
                                            @endif
                                        </td>
                                    </tr>                       
                                @endforeach --}}
                            </tbody>
                        </table>
                        <div id="Add_Location_Modal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form class="form-horizontal" role="form" method="post" action="#">
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
                                        <div class="row">
                                            <div class="col-md-5">
                                                <p>Item name: <b>Pangas</b></p>
                                            </div>
                                            <div class="col-md-5" >
                                                <p>Item type: <b>IQF</b></p>
                                            </div>
                                        </div><br>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <p>Item Variant: <b>Fillet</b></p>
                                            </div>
                                            <div class="col-md-5" >
                                                <p>Grade: <b>300-500gm/3pcs</b></p>
                                            </div>
                                        </div><br>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <p>Quantity: <b>20 kg</b></p>
                                            </div>
                                        </div><br>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <p>Select Storage :</p>
                                            </div>
                                            <div class="col-md-8" >
                                                <select name="" class="form-control" id="">
                                                    <option value="">--Select Storage--</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <p>Select Zone :</p>
                                            </div>
                                            <div class="col-md-8" >
                                                <select name="" class="form-control" id="">
                                                    <option value="">--Select Zone--</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <p>Rack No :</p>
                                            </div>
                                            <div class="col-md-8" >
                                                <input type="text" placeholder="Give Rack No" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <p>Self Coloum no:</p>
                                            </div>
                                            <div class="col-md-8" >
                                                <input type="text" placeholder="Self Coloum No" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <p>Self Row No :</p>
                                            </div>
                                            <div class="col-md-8" >
                                                <input type="text" placeholder="Self Row No" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="modal-footer">
                                        <button type="submit" class="m-10 btn btn-success">Submit</button>
                                        <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            {{-- <div class="col-md-12 text-center">{{ $employee->links() }}</div> --}}
                            {{-- {{ $ppu->links('vendor.pagination.custom') }} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
     </div>
@endsection
@section('script')
{{-- <script>
    $(document).ready(function()
    {
        $(".move_to_store").click(function () {
            console.log($(this).data("id"));
            var ppu_id = $(this).data("id");
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
                product_array.push({"grade_id":grade_id,"grade_name":grade_name,"grade_weight":grade_weight});
                $.each( product_array, function( key, product ) {
                    $("table.fillet_grading_table tr").last().after("<tr><td>"+product.grade_name+"</td><td>"+product.grade_weight+"</td></tr>");
                });
                $(".inputs").val('');
                $(".inputs").val(JSON.stringify(product_array));
                $('.grade_weight').val(0);
                $('.grade_select').val("--select--");
            })
        });
    });
</script> --}}
@endsection
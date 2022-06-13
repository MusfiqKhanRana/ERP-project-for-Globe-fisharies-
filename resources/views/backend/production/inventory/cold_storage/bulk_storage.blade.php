@extends('backend.master')
@section('site-title')
    inventory bulk-storage
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
                <small> Cold Storage </small>
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
                <i class="fa fa-briefcase"></i>Bulk Storage
                </div>
                </div>
                <div class="portlet-body">
                    <div class="table-scrollable">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Item Name</th>
                                <th>Grade</th>
                                <th>P.Type</th>
                                <th>P.Varient</th>
                                <th>Produced</th>
                                <th>Reprocessed(kg)</th>
                                <th>Local(kg)</th>
                                <th>Damage Quantity(kg)</th>
                                <th>Closing Stock(kg)</th>
                                <th style="text-align: center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($ppu as $item)
                                    <tr id="row1">
                                        <td class="text-align: center;">{{$item->production_processing_item->name}}</td>
                                        <td class="text-align: center;">
                                            @foreach ($item->production_processing_grades as $value)
                                                @if ($value->block_id == null)
                                                    <li>Grade Name: {{$value->grade_name}}</li>
                                                @endif
                                                @if ($value->grade_id == null)
                                                    <li>Block Name : {{$value->block_name}}</li>
                                                @endif
                                            @endforeach
                                        </td>
                                        <td class="text-align: center;">{{$item->processing_name}}</td>
                                        <td class="text-align: center;">{{$item->processing_variant}}</td>
                                        <td class="text-align: center;">40</td>
                                        <td class="text-align: center;">
                                            <table class="table table-striped table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <td class="text-align: center;">In</td>
                                                        <td class="text-align: center;">Out</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="text-align: center;">10</td>
                                                        <td class="text-align: center;">10</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td class="text-align: center;">40</td>
                                        <td class="text-align: center;">40</td>
                                        <td class="text-align: center;">40</td>
                                        <td style="text-align: center">
                                            <a class="btn btn-success"  data-toggle="modal" href="#transfer_Modal"><i class="fa fa-edit"></i>Transfer</a>
                                            <a class="btn btn-danger"  data-toggle="modal" href="#damaged_Modal"><i class="fa fa-edit"></i>Damaged</a>
                                            <a class="btn btn-info"  data-toggle="modal" href="#reprocessed_Modal"><i class="fa fa-edit"></i>Reprocessed</a>
                                        </td>
                                    </tr> 
                                @endforeach
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
                        <div id="transfer_Modal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form class="form-horizontal" role="form" method="post" action="#">
                                        {{csrf_field()}}
                                        <input type="hidden" name="inputs" class="inputs">
                                        <input type="hidden" name="production_processing_unit_id" class="production_processing_unit_id">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                        <h2 class="modal-title" style="color: rgb(75, 65, 65);">Transfer Stock</h2>
                                    </div>
                                    <br>
                                    <div class="modal-body">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-3">
                                                <p>Storage :</p>
                                            </div>
                                            <div class="col-md-8" >
                                                <select name="" class="form-control" id="">
                                                    <option value="">--Select Storage--</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <p>Pack Size(CNT) :</p>
                                            </div>
                                            <div class="col-md-8" >
                                                <select name="" class="form-control" id="">
                                                    <option value="">--Select Zone--</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <p>Avaiable Stock(CNT) :</p>
                                            </div>
                                            <div class="col-md-8" >
                                                5
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <p>Avaiable Stock(KG) :</p>
                                            </div>
                                            <div class="col-md-8" >
                                                50
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <p>Transfer Quantity(CNT) :</p>
                                            </div>
                                            <div class="col-md-8" >
                                                <input type="text" placeholder="Type qty" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <p>Transfer Quantity(KG) :</p>
                                            </div>
                                            <div class="col-md-8" >
                                                <input type="text" placeholder="System will auto calculate" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <p>Transferred For :</p>
                                            </div>
                                            <div class="col-md-8" >
                                                <select name="" class="form-control" id="">
                                                    <option value="">--Select Client--</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1" />
                                            <label class="form-check-label" for="inlineCheckbox1">Transfer this stock having vacuum packed</label>
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
                        <div id="damaged_Modal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form class="form-horizontal" role="form" method="post" action="#">
                                        {{csrf_field()}}
                                        <input type="hidden" name="inputs" class="inputs">
                                        <input type="hidden" name="production_processing_unit_id" class="production_processing_unit_id">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                        <h2 class="modal-title" style="color: rgb(75, 65, 65);">Damage Info</h2>
                                    </div>
                                    <br>
                                    <div class="modal-body">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-3">
                                                <p>Item Name :</p>
                                            </div>
                                            <div class="col-md-8" >
                                                <p><b>Pangus</b></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <p>Item Grade :</p>
                                            </div>
                                            <div class="col-md-8" >
                                                <p><b>300-500gm/3pcs</b></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <p>Damaged :</p>
                                            </div>
                                            <div class="col-md-8" >
                                                <input type="text" placeholder="Type Damaged Quantity" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <p>Image :</p>
                                            </div>
                                            <div class="col-md-8" >
                                                <input type="file" placeholder="Upoad attachment" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <p>Remark :</p>
                                            </div>
                                            <div class="col-md-8" >
                                                <textarea name="" class="form-control" id="" cols="30" rows="5"></textarea>
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
                        <div id="reprocessed_Modal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
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
                                            <div class="col-md-3">
                                                <p>Item Name :</p>
                                            </div>
                                            <div class="col-md-8" >
                                                <p><b>Pangus</b></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <p>Item Grade :</p>
                                            </div>
                                            <div class="col-md-8" >
                                                <p><b>300-500gm/3pcs</b></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <p>Type :</p>
                                            </div>
                                            <div class="col-md-8" >
                                                <select name="" class="form-control" id="">
                                                    <option value="">--Select Reprocess type--</option>
                                                    <option value="">Convert/Repach<small>(Transfer it to bulk storage)</small></option>
                                                    <option value="">Reprocessed<small>(Transfer it to Chill room)</small></option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <p>Quantity :</p>
                                            </div>
                                            <div class="col-md-8" >
                                                <input type="text" placeholder="Type reprocessed qty" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <p>Remark :</p>
                                            </div>
                                            <div class="col-md-8" >
                                                <textarea name="" class="form-control" id="" cols="30" rows="5"></textarea>
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
@extends('backend.master')
@section('site-title')
    inventory store-in
@endsection
@section('style')
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
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
                <i class="fa fa-briefcase"></i>Export Storage 1
                </div>
                </div>
                <div class="portlet-body">
                    <div>
                        <div class="row" style="margin-left: 2%;margin-bottom: 2%;">
                            <button class="btn red btn-sm" data-toggle="modal" href="#damaged_Modal">Damaged</button>
                            <button class="btn blue btn-sm" data-toggle="modal" href="#reprocessed_Modal">Reprocessed</button>
                        </div>
                    </div> <hr>
                    <div>
                        <div class="row" style="margin-bottom: 2%">
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-4">
                                        category :
                                    </div>
                                    <div class="col-md-8">
                                        <select class="form-control processing_type_btn">
                                            {{-- <option value="">--Select--</option> --}}
                                            <option value="IQF" data-type="BLOCK">IQF</option>
                                            <option value="BLOCK" data-type="BLOCK">Block</option>
                                            <option value="VEGETABLE" data-type="VEGETABLE">Vegetable</option>
                                            <option value="DRYFISH" data-type="DRYFISH">Dry Fish</option>
                                            <option value="SWEET" data-type="SWEET">Sweet</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-4">
                                        Date From :
                                    </div>
                                    <div class="col-md-8">
                                        <input type="date" class="form-control form_date" name="form_date" value="{{\Carbon\Carbon::now()->format('Y-m-d')}}" >
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-4">
                                        Date To :
                                    </div>
                                    <div class="col-md-8">
                                        <input type="date" class="form-control to_date" name="to_date" value="{{\Carbon\Carbon::now()->format('Y-m-d')}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <hr>
                    <div class="table-scrollable">
                        <table class="bulk_storage table table-striped table-bordered table-hover">
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
                            </tr>
                            </thead>
                            <tbody>
                                <tr id="row1">
                                    <td class="text-align: center;">Pangas</td>
                                    <td class="text-align: center;">300-500gm/3pcs</td>
                                    <td class="text-align: center;">IQF</td>
                                    <td class="text-align: center;">Whole</td>
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
                                    <td style="text-align: center;">40</td>
                                    <td style="text-align: center;">40</td>
                                    <td style="text-align: center;">40</td>
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
                                    <form class="form-horizontal" role="form" method="post" action="{{route('inventory-export-damage.store')}}" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <input type="hidden" name="batch_code">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                            <h2 class="modal-title" style="color: rgb(75, 65, 65);">Damage Info</h2>
                                        </div>
                                        <br>
                                        <div class="modal-body">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <p>Processing Type :</p>
                                                </div>
                                                <div class="col-md-8" >
                                                    <select class="form-control type" name="processing_type" id="processing_name">
                                                        <option value="">--Select--</option>
                                                        <option value="iqf">IQF</option>
                                                        <option value="vegetable_iqf">Vegetable/Fruit IQF</option>
                                                        <option value="block_frozen">Block Frozen</option>
                                                        <option value="vegetable_block">Vegetable/Fruit Block</option>
                                                        <option value="dry_fish">Dry Fish</option>
                                                        <option value="raw_bf_shrimp">Raw BF(Shrimp)</option>
                                                        <option value="raw_iqf_shrimp">Raw IQF(Shrimp)</option>
                                                        <option value="semi_iqf">Semi IQF</option>
                                                        <option value="cooked_iqf_shrimp">Cooked IQF(Shrimp)</option>
                                                        <option value="blanched_iqf_shrimp">Balanched IQF(Shrimp)</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <p>Variant :</p>
                                                </div>
                                                <div class="col-md-8" >
                                                    <select class="form-control varient" name="processing_variant">
                                                        <option value="">--Select--</option>
                                                        <option class="iqf" value="fillet">Fillet</option>
                                                        <option class="iqf" value="whole">Whole</option>
                                                        <option class="iqf" value="whole_gutted">Whole Gutted</option>
                                                        <option class="iqf" value="cleaned">Cleaned</option>
                                                        <option class="iqf" value="sliced_fmly_cut">Sliced(Family Cut)</option>
                                                        <option class="iqf" value="sliced_chinese_cut">Sliced(Chinese Cut)</option>
                                                        <option class="iqf" value="butter_fly">Butter Fly</option>
                                                        <option class="iqf" value="hgto">HGTO</option>
                                                        <option class="vegetable_iqf" value="cut_n_clean">Cut & Clean</option>
                                                        <option class="vegetable_iqf" value="whole">Whole</option>
                                                        <option class="vegetable_iqf" value="whole_n_clean">Whole & Clean</option>
                                                        <option class="block_frozen" value="whole">Whole</option>
                                                        <option class="block_frozen" value="clean">Clean</option>
                                                        <option class="block_frozen" value="slice">Slice</option>
                                                        <option class="vegetable_block" value="cut_n_clean">Cut & Clean</option>
                                                        <option class="vegetable_block" value="whole">Whole</option>
                                                        <option class="vegetable_block" value="whole_n_clean">Whole & Clean</option>
                                                        <option class="dry_fish" value="regular">Regular</option>
                                                        <option class="raw_bf_shrimp" value="hlso">HLSO</option>
                                                        <option class="raw_bf_shrimp" value="pud">PUD</option>
                                                        <option class="raw_bf_shrimp" value="p_n_d">P & D</option>
                                                        <option class="raw_bf_shrimp" value="pdto">PDTO</option>
                                                        <option class="raw_bf_shrimp" value="pto">PTO</option>
                                                        <option class="raw_iqf_shrimp" value="hlso">HLSO</option>
                                                        <option class="raw_iqf_shrimp" value="pud">PUD</option>
                                                        <option class="raw_iqf_shrimp" value="p_n_d_tail_on">P&D Tail On</option>
                                                        <option class="raw_iqf_shrimp" value="p_n_d_tail_off">P&D Tail Off</option>
                                                        <option class="raw_iqf_shrimp" value="special_cut_p_n_d">Special Cut P&D</option>
                                                        <option class="raw_iqf_shrimp" value="hlso_easy_pell">HLSO Easy Pell</option>
                                                        <option class="raw_iqf_shrimp" value="butterfly_pud_skewer">Butterfly/PUD Skewer</option>
                                                        <option class="raw_iqf_shrimp" value="pud_pull_vein">PUD Pull Vein</option>
                                                        <option class="semi_iqf" value="hoso">HOSO</option>
                                                        <option class="semi_iqf" value="hoto">HOTO</option>
                                                        <option class="cooked_iqf_shrimp" value="hoso">HOSO</option>
                                                        <option class="cooked_iqf_shrimp" value="pud">PUD</option>
                                                        <option class="cooked_iqf_shrimp" value="p_n_d_tail_on">P&D Tail On</option>
                                                        <option class="cooked_iqf_shrimp" value="p_n_d_tail_off">P&D Tail Off</option>
                                                        <option class="blanched_iqf_shrimp" value="hoso">HOSO</option>
                                                        <option class="blanched_iqf_shrimp" value="pud">PUD</option>
                                                        <option class="blanched_iqf_shrimp" value="p_n_d_tail_on">P&D Tail On</option>
                                                        <option class="blanched_iqf_shrimp" value="p_n_d_tail_off">P&D Tail Off</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <p>Item :</p>
                                                </div>
                                                <div class="col-md-8" >
                                                    <select name="item_id" class="form-control selectpicker" data-live-search="true">
                                                        @foreach ($supply_item as $item)
                                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="block_damage">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <p>Block Size :</p>
                                                    </div>
                                                    <div class="col-md-8" >
                                                        <select name="block_size" class="form-control" >
                                                            <option value="">--Select--</option>
                                                            @foreach ($block_size as $block)
                                                                <option value="{{$block->id}}">{{$block->block_size}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <p>Block Quantity :</p>
                                                    </div>
                                                    <div class="col-md-8" >
                                                        <input class="form-control" type="number" name="block_quantity">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <p>Fish Size :</p>
                                                    </div>
                                                    <div class="col-md-8" >
                                                        <select name="fish_grade" class="form-control" >
                                                            <option value="">--Select--</option>
                                                            @foreach ($fish_size as $size)
                                                                <option value="{{$size->id}}">{{$size->size}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row grade_id">
                                                <div class="col-md-3">
                                                    <p>Item Grade :</p>
                                                </div>
                                                <div class="col-md-8" >
                                                    <select name="processing_grade_id" class="form-control" >
                                                        <option value="">--Select--</option>
                                                        @foreach ($processing_grade as $grade)
                                                            <option value="{{$grade->id}}">{{$grade->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <p>Damaged :</p>
                                                </div>
                                                <div class="col-md-8" >
                                                    <input type="text" name="damage_quantity"  placeholder="Type Damaged Quantity" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <p>Image :</p>
                                                </div>
                                                <div class="col-md-8" >
                                                    <input type="file" placeholder="Upoad attachment" name="image" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <p>Remark :</p>
                                                </div>
                                                <div class="col-md-8" >
                                                    <textarea name="remark" class="form-control"  cols="30" rows="5"></textarea>
                                                </div>
                                            </div>
                                            <input type="hidden" name="damage_form" value="Bulk">
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
                                                <p> Processing Type :</p>
                                            </div>
                                            <div class="col-md-8" >
                                                <select class="form-control type" name="processing_name">
                                                    <option value="">--Select--</option>
                                                    <option value="iqf">IQF</option>
                                                    <option value="vegetable_iqf">Vegetable/Fruit IQF</option>
                                                    <option value="block_frozen">Block Frozen</option>
                                                    <option value="vegetable_block">Vegetable/Fruit Block</option>
                                                    <option value="dry_fish">Dry Fish</option>
                                                    <option value="raw_bf_shrimp">Raw BF(Shrimp)</option>
                                                    <option value="raw_iqf_shrimp">Raw IQF(Shrimp)</option>
                                                    <option value="semi_iqf">Semi IQF</option>
                                                    <option value="cooked_iqf_shrimp">Cooked IQF(Shrimp)</option>
                                                    <option value="blanched_iqf_shrimp">Balanched IQF(Shrimp)</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <p>Variant :</p>
                                            </div>
                                            <div class="col-md-8" >
                                                <select class="form-control varient" name="processing_variant">
                                                    <option value="">--Select--</option>
                                                    <option class="iqf" value="fillet">Fillet</option>
                                                    <option class="iqf" value="whole">Whole</option>
                                                    <option class="iqf" value="whole_gutted">Whole Gutted</option>
                                                    <option class="iqf" value="cleaned">Cleaned</option>
                                                    <option class="iqf" value="sliced_fmly_cut">Sliced(Family Cut)</option>
                                                    <option class="iqf" value="sliced_chinese_cut">Sliced(Chinese Cut)</option>
                                                    <option class="iqf" value="butter_fly">Butter Fly</option>
                                                    <option class="iqf" value="hgto">HGTO</option>
                                                    <option class="vegetable_iqf" value="cut_n_clean">Cut & Clean</option>
                                                    <option class="vegetable_iqf" value="whole">Whole</option>
                                                    <option class="vegetable_iqf" value="whole_n_clean">Whole & Clean</option>
                                                    <option class="block_frozen" value="whole">Whole</option>
                                                    <option class="block_frozen" value="clean">Clean</option>
                                                    <option class="block_frozen" value="slice">Slice</option>
                                                    <option class="vegetable_block" value="cut_n_clean">Cut & Clean</option>
                                                    <option class="vegetable_block" value="whole">Whole</option>
                                                    <option class="vegetable_block" value="whole_n_clean">Whole & Clean</option>
                                                    <option class="dry_fish" value="regular">Regular</option>
                                                    <option class="raw_bf_shrimp" value="hlso">HLSO</option>
                                                    <option class="raw_bf_shrimp" value="pud">PUD</option>
                                                    <option class="raw_bf_shrimp" value="p_n_d">P & D</option>
                                                    <option class="raw_bf_shrimp" value="pdto">PDTO</option>
                                                    <option class="raw_bf_shrimp" value="pto">PTO</option>
                                                    <option class="raw_iqf_shrimp" value="hlso">HLSO</option>
                                                    <option class="raw_iqf_shrimp" value="pud">PUD</option>
                                                    <option class="raw_iqf_shrimp" value="p_n_d_tail_on">P&D Tail On</option>
                                                    <option class="raw_iqf_shrimp" value="p_n_d_tail_off">P&D Tail Off</option>
                                                    <option class="raw_iqf_shrimp" value="special_cut_p_n_d">Special Cut P&D</option>
                                                    <option class="raw_iqf_shrimp" value="hlso_easy_pell">HLSO Easy Pell</option>
                                                    <option class="raw_iqf_shrimp" value="butterfly_pud_skewer">Butterfly/PUD Skewer</option>
                                                    <option class="raw_iqf_shrimp" value="pud_pull_vein">PUD Pull Vein</option>
                                                    <option class="semi_iqf" value="hoso">HOSO</option>
                                                    <option class="semi_iqf" value="hoto">HOTO</option>
                                                    <option class="cooked_iqf_shrimp" value="hoso">HOSO</option>
                                                    <option class="cooked_iqf_shrimp" value="pud">PUD</option>
                                                    <option class="cooked_iqf_shrimp" value="p_n_d_tail_on">P&D Tail On</option>
                                                    <option class="cooked_iqf_shrimp" value="p_n_d_tail_off">P&D Tail Off</option>
                                                    <option class="blanched_iqf_shrimp" value="hoso">HOSO</option>
                                                    <option class="blanched_iqf_shrimp" value="pud">PUD</option>
                                                    <option class="blanched_iqf_shrimp" value="p_n_d_tail_on">P&D Tail On</option>
                                                    <option class="blanched_iqf_shrimp" value="p_n_d_tail_off">P&D Tail Off</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <p>Item :</p>
                                            </div>
                                            <div class="col-md-8" >
                                                <select name="item_id" class="form-control selectpicker" data-live-search="true">
                                                    <option value="">test1</option>
                                                    <option value="">test2</option>
                                                    <option value="">test3</option>
                                                </select>
                                            </div>
                                        </div>
                                        {{-- <div class="row">
                                            <div class="col-md-3">
                                                <p>Item Name :</p>
                                            </div>
                                            <div class="col-md-8" >
                                                <select name="item_name" class="form-control selectpicker" data-live-search="true">
                                                    <option value="">test1</option>
                                                    <option value="">test2</option>
                                                    <option value="">test3</option>
                                                </select>
                                            </div>
                                        </div> --}}
                                        <div class="row">
                                            <div class="col-md-3">
                                                <p>Item Grade :</p>
                                            </div>
                                            <div class="col-md-8" >
                                                <select name="item_id" class="form-control">
                                                    <option value="">test1</option>
                                                    <option value="">test2</option>
                                                    <option value="">test3</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <p>Reprocessing Type :</p>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-chained/1.0.1/jquery.chained.min.js" integrity="sha512-rcWQG55udn0NOSHKgu3DO5jb34nLcwC+iL1Qq6sq04Sj7uW27vmYENyvWm8I9oqtLoAE01KzcUO6THujRpi/Kg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/JavaScript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-chained/1.0.1/jquery.chained.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {

        $(".block_damage").hide();
        $( "#processing_name" ).change(function() {
            if($(this).val() == "block_frozen" || $(this).val() == "semi_iqf" || $(this).val() == "vegetable_block" || $(this).val() == "raw_bf_shrimp" ){
                $(".block_damage").show();
                $(".grade_id").hide();
            }
            else
            {
                $(".block_damage").hide();
                $(".grade_id").show();
            }
        });

        $(".varient").chained(".type");
        get_processing('IQF')
        $('.processing_type_btn').change(function(){
            get_processing($(this).val())  
        });
        function get_processing(processing_type) {
            $.ajax({
                type:"POST",
                url:"{{route('inventory.cold_storage.export_inventory_data')}}",
                data:{
                    'processing_type' : processing_type,
                    'form_date':$('.form_date').val(),
                    'to_date':$('.to_date').val(),
                    'data_for':'Export Storage 1',
                    '_token' : $('input[name=_token]').val()
                },
                success:function(data){
                    appendTable(data);
                    console.log(data);
                    // $('.bulk_storage tr:last').after('<tr><td>1</td> <td>1</td> <td>1</td> <td>1</td> <td>1</td> <td>1</td> <td>1</td> <td>1</td> </tr>');
                }
            });
        }
        function appendTable(data) {
            console.log(data);
            $(".bulk_storage > tbody").html("");
            data.forEach(item => {
                console.log(item);
                $('.bulk_storage > tbody:last-child').append('<tr><td>'+
                    item.item_name+'</td><td>'+
                    item.item_grade+'</td><td>'+
                    item.production_type+'</td><td>'+
                    item.production_variant+'</td><td>'+
                    item.produced+'</td>'+
                    '<td><table class="table table-striped table-bordered table-hover">'+
                        '<thead>'+
                            '<tr>'+
                                '<td class="text-align: center;">In</td>'+
                                '<td class="text-align: center;">Out</td>'+
                            '</tr>'+
                        '</thead>'+
                        '<tbody>'+
                            '<tr>'+
                                '<td class="text-align: center;">'+item.reprocessed_in+'</td>'+
                                '<td class="text-align: center;">'+item.reprocessed_out+'</td>'+
                            '</tr>'+
                        '</tbody>'+
                    '</table></td>'+
                    ' <td>'+item.local+'</td> <td>'+item.damage+'</td> <td>20</td> </tr>');
            });
        }
    });
</script>
@endsection
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
                    <div>
                        <div class="row" style="margin-left: 2%;margin-bottom: 2%;">
                            <button class="btn green btn-lg processing_type_btn" data-type="IQF">IQF</button>
                            <button class="btn blue btn-lg processing_type_btn" data-type="BLOCK">BLOCK</button>
                        </div>
                    </div> <hr>
                    <div>
                        <div class="row" style="margin-bottom: 2%">
                            <div class="col-md-2">
                                Item Name :
                            </div>
                            <div class="col-md-10">
                                <input type="text" class="form-control" placeholder="Type Item name">
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 2%">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-4">
                                        Date From :
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" placeholder="system will auto select">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-4">
                                        Date To :
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" placeholder="system will auto select">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <hr>
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
                                @foreach ($production_processing_unit as $item)
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
<script type="text/javascript">
    $(document).ready(function () {
        get_processing('IQF')   
        $('.processing_type_btn').click(function(){
            get_processing($(this).data('type'))  
        });
        function get_processing(processing_type) {
            $.ajax({
                type:"POST",
                url:"{{route('inventory.cold_storage.bulk_storage_datapass')}}",
                data:{
                    'processing_type' : processing_type,
                    '_token' : $('input[name=_token]').val()
                },
                success:function(data){
                    console.log(data);
                }
            });
        }
    });
</script>
@endsection
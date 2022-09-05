@extends('backend.master')
@section('site-title')
   Disbursement
@endsection 
@section('style')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/i18n/defaults-*.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@endsection
@section('main-content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <span class="page-title" class="portlet box dark"><b>General Stock Disbursement List </b>
            </span>
            <hr>
                @if(Session::has('msg'))
                    <script>
                        $(document).ready(function(){
                            swal("{{Session::get('msg')}}","", "success");
                        });
                    </script>
                @endif
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
            <!-- END PAGE TITLE-->
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet-body" style="height: auto;">
                        <div class="portlet-body">
                            <div class="table-scrollable">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th style="text-align: center"> Serial</th>
                                        <th style="text-align: center;">Disbursement date</th>
                                        <th style="text-align: center"> Department</th>
                                        <th style="text-align: center"> Disburse To</th>
                                        <th style="text-align: center"> Remarks</th>
                                        <th style="text-align: center"> Disbursed Item</th>
                                        <th style="text-align: center"> Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($general_stock_disbursements as $key=> $data)
                                            <tr id="row1">
                                                <td>{{++$key}}</td>
                                                <td class="text-align: center;"> {{$data->disbursement_date}}</td>
                                                <td class="text-align: center;"> {{$data->department_id}}</td>
                                                <td class="text-align: center;"> {{$data->requested_by}}</td>
                                                <td class="text-align: center;"> {{$data->remarks}}</td>
                                                <td>
                                                    <table class="table table-striped table-bordered table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>Sl.</th>
                                                                <th>Item Name</th>
                                                                <th>Item Type Name</th>
                                                                <th>Item Unit Name</th>
                                                                <th>Quantity</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php
                                                                $total = 0;
                                                            @endphp
                                                            @foreach($data->general_stock_disbursement_item as $key2=> $item)
                                                                <tr>
                                                                    <th>{{++$key2}}</th>
                                                                    <th>{{$item->item_name}}</th>
                                                                    <th>{{$item->item_type_name}}</th>
                                                                    <th>{{$item->item_unit_name}}</th>
                                                                    <th>{{$item->quantity}}</th>  
                                                                </tr>
                                                                
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td style="text-align: center">
                                                    <a class="btn green return_model" data-items="{{$data->general_stock_disbursement_item}}" data-toggle="modal" href="#returnModal"><i class="fa fa-check"></i>Return</a>
                                                    <a class="btn blue damage_model" data-items="{{$data->general_stock_disbursement_item}}" data-toggle="modal" href="#damageModal"><i class="fa fa-check"></i>Damage</a>
                                                    <a class="btn red delete_modal" data-toggle="modal" data-id="{{$data->id}}" href="#deleteModal"><i class="fa fa-trash"></i> Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div id="returnModal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form class="form-horizontal" role="form" method="post" action="{{route('general.stock.disbursement.return')}}">
                                                {{csrf_field()}}
                                                <div class="modal-header"  style="background-color: #36C6D3;text-align:center;">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h2 class="modal-title" style="color: rgb(75, 65, 65);"> Return Modal</h2>
                                                </div>
                                                <br>
                                                <div class="modal-body">
                                                <div class="row">
                                                        <div class="col-md-12">
                                                            <table class="table table-striped table-bordered table-hover return_table">
                                                                <thead>
                                                                    <tr>
                                                                        <th>
                                                                            Item Name
                                                                        </th>
                                                                        <th>
                                                                            Item Type
                                                                        </th>
                                                                        <th>
                                                                            Quantity
                                                                        </th>
                                                                        <th>
                                                                            Return Quantity
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                       
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="m-10 btn btn-success">Confirm</button>
                                                    <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div id="damageModal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form class="form-horizontal" role="form" method="post" action="{{route('general.stock.disbursement.damage')}}">
                                                {{csrf_field()}}
                                                <div class="modal-header"  style="background-color: #55c7d2;text-align:center;">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h2 class="modal-title" style="color: rgb(75, 65, 65);"> Damage Modal</h2>
                                                </div>
                                                <br>
                                                <div class="modal-body">
                                                <div class="row">
                                                        <div class="col-md-12">
                                                            <table class="table table-striped table-bordered table-hover damage_table">
                                                                <thead>
                                                                    <tr>
                                                                        <th>
                                                                            Item Name
                                                                        </th>
                                                                        <th>
                                                                            Item Type
                                                                        </th>
                                                                        <th>
                                                                            Quantity
                                                                        </th>
                                                                        <th>
                                                                            Damage Quantity
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                       
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="m-10 btn btn-success">Confirm</button>
                                                    <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div id="deleteModal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                {{-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button> --}}
                                                <h4 class="modal-title">Are You Sure?</h4>
                                            </div>
                                            <br>
                                            <form class="form-horizontal" role="form" method="post" action="{{route('general.stock.disbursement.delete')}}">
                                                {{csrf_field()}}
                                                <input type="hidden" name="disbursement_id" class="disbursement_id">
                                                <div class="modal-footer"><br>
                                                    <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                {{-- <div class="col-md-12 text-center">{{ $employee->links() }}</div> --}}
                                {{-- {{ $production_requisition->withQueryString()->links('vendor.pagination.custom') }} --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script>
    jQuery(document).ready(function() {
        $(".return_model").on('click',function () {
            var items = $(this).data("items");
            console.log(items);
            $("table.return_table tbody tr").empty();
            $.each( items, function( key, product ) {
                $("table.return_table tr").last().after("<tr id='"+key+"'><td>"+product.item_name+"</td><td>"+product.item_type_name+"</td><td>"+product.quantity+"</td><td><input type='number' step='0.01' class='form-control' name='return_quantity[]' placeholder='type quantity'><input type='hidden' name='item_id[]' value='"+product.id+"'></td></tr>");
            });
        });
        $(".damage_model").on('click',function () {
            var items = $(this).data("items");
            console.log(items);
            $("table.damage_table tbody tr").empty();
            $.each( items, function( key, product ) {
                $("table.damage_table tr").last().after("<tr id='"+key+"'><td>"+product.item_name+"</td><td>"+product.item_type_name+"</td><td>"+product.quantity+"</td><td><input type='number' step='0.01' class='form-control' name='damage_quantity[]' placeholder='type quantity'><input type='hidden' name='item_id[]' value='"+product.id+"'></td></tr>");
            });
        });
        $(".delete_modal").on('click',function () {
            var id = $(this).data("id");
            console.log(id);
            $("disbursement_id").val(id);
        });
    });
</script>
@endsection
@extends('backend.master')
@section('site-title')
    Requisition
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
          
            <!-- END PAGE TITLE-->
            <!-- BEGIN PAGE CONTENT-->
            <div class="row" id="printrequisition">
                <div class="col-md-12">
                    <div class="portlet box blue-chambray">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-briefcase"></i>Requisition
                            </div>
                            <div class="tools">
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="row">
                                <div class="col">
                                    <h4>Requisition Code :   <b>{{$data->requisition_id}}</b></h4>
                                </div>
                                <div class="col">
                                    <h4>Warehouse Name : <b>{{$data->warehouse->name}}</b>  </h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <h4>Party Name : <b>{{$data->party->party_name}}</b></h4>
                                </div>
                                <div class="col">
                                    <h4>Status : <b>{{$data->status}}</b></h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <h4>Clearence Date : <b>{{$data->clearance_date}}</b></h4>
                                </div>
                                <div class="col">
                                    <h4>Remark :  <b>{{$data->remark}}</b></h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <h4>Products</h4>
                                </div>
                                <div class="col">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>
                                                    Sl.
                                                </th>
                                                <th>
                                                    Category
                                                </th>
                                                <th>
                                                    Product
                                                </th>
                                                <th>
                                                    Pack Size
                                                </th>
                                                <th>
                                                    Quantity
                                                </th>
                                                @php
                                                    $a=0;
                                                    $b=0;
                                                    $c=0;
                                                @endphp
                                                @foreach ($data->products as $key2 => $item)
                                                @php
                                                    $a+=$item->pivot->final_quantity;
                                                    $b+=$item->pivot->received_quantity;
                                                    $c+=$item->pivot->resolve_quantity;
                                                @endphp
                                                @endforeach
                                                @if ($a>0)
                                                <th>
                                                     Provided Quantity
                                                </th>
                                                @endif
                                                @if ($b>0)
                                                <th>
                                                     Received Quantity
                                                </th>
                                                @endif
                                                @if ($c>0)
                                                <th>
                                                     Resolve Quantity
                                                </th>
                                                @endif

                                                {{-- <th>
                                                    Packet
                                                </th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                             $total_weight=0;
                                             $total_qty=0;   
                                            @endphp
                                            @foreach ($data->products as $key2 => $item)
                                                <tr>
                                                    <td>{{++$key2}}</td>
                                                    <td>{{$item->category_type}}</td>
                                                    <td>{{$item->supplyitem->name}}</td>
                                                    <td>
                                                        {{$item->pack->name}}
                                                    </td>
                                                    <td>
                                                        {{$item->pivot->quantity}}
                                                        @if ($data->status=='Pending' || $data->status=='Processing')
                                                        @php
                                                            $total_qty += $item->pivot->quantity;
                                                            $total_weight += $item->pack->weight*$item->pivot->quantity;
                                                       @endphp
                                                        @endif
                                                    </td>
                                                    @if ($item->pivot->final_quantity>0)
                                                            <td>
                                                                {{$item->pivot->final_quantity}}
                                                                @if ($data->status=='Deliverd')
                                                                @php
                                                                    $total_qty += $item->pivot->final_quantity;
                                                                    $total_weight += $item->pack->weight*$item->pivot->final_quantity;
                                                               @endphp
                                                                @endif
                                                            </td>
                                                    @endif
                                                    @if ($item->pivot->received_quantity>0)
                                                            <td>
                                                                {{$item->pivot->received_quantity}}
                                                                @if ($data->status=='Received' || $data->status=='Imperfect' || $data->status=='OnHold')
                                                                @php
                                                                    $total_qty += $item->pivot->received_quantity;
                                                                    $total_weight += $item->pack->weight*$item->pivot->received_quantity;
                                                               @endphp
                                                                @endif
                                                            </td>
                                                    @endif
                                                    @if ($item->pivot->resolve_quantity>0)
                                                        <td>
                                                            {{$item->pivot->resolve_quantity}}
                                                            @if ($data->status=='Solved')
                                                                @php
                                                                    $total_qty += $item->pivot->resolve_quantity;
                                                                    $total_weight += $item->pack->weight*$item->pivot->resolve_quantity;
                                                               @endphp
                                                            @endif
                                                        </td>   
                                                    @endif
                                                    {{-- <td>{{$item->pivot->packet}}</td> --}}
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <th colspan="4" style="text-align: right">total Pack & Weight :</th>
                                                <th  colspan="5" style="text-align: right">
                                                   <span>{{ $total_qty}}pack</span> <span> & {{ $total_weight}}KG</span>     
                                                </th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
            </div>
            <!-- END PAGE CONTENT-->
            <div class="row">
                <button id="printbtn" class="btn btn-primary" >Print</button>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script type="text/JavaScript" src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.0/jQuery.print.js"></script>
    <script>
       jQuery(document).ready(function() {
            $("#printbtn").click(function () {
                $("#printrequisition").print();
            });
        });
    </script>
@endsection
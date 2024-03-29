@extends('backend.master')
@section('site-title')
    Purchase Requisition Invoice
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
            <h3 class="page-title bold">General Purchase
                <small> Purchase Management </small>
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
                    <div class="" style="margin-left: 2%" >
                        <div class="portlet-body">
                            <div class="col" style="text-align: center">
                                <h2><b>GLOBE FISHERIES LIMITED</b>
                                </h2>
                            </div>
                            <div class="col" style="text-align: center">
                                <h5>Mirwarishpur, Begumganj, Noakhali
                                </h5>
                            </div>
                            <div class="col" style="text-align: center">
                                Phone: +8801 562 458 621, 02 5865235, Email: sales@globefisheries.com
                            </div><br><br>
                            <div class="row">
                                <div class="col">
                                    <h4><b>Requiested By :</b> {{$requisition->users->name}}</h4>
                                </div>
                                <div class="col">
                                    <h4><b>Department : </b> {{$requisition->departments->name}}</h4>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col">
                                    <h2 style="text-align: center">Items</h2><hr>
                                </div>
                                <div class="col">
                                    <table class="table table-striped  table-hover">
                                        <thead>
                                            <tr>
                                                <th>
                                                    Sl.
                                                </th>
                                                <th>
                                                    Item
                                                </th>
                                                <th>
                                                    Demand Date
                                                </th>
                                                <th>
                                                    Quantity
                                                </th>
                                                <th>
                                                   Specification
                                                </th>
                                                <th>
                                                    Remark
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($requisition->items as $key=> $item)
                                                <tr>
                                                    <td>{{++ $key }}</td>
                                                    <td><ul><li>{{$item->pivot->image}}</li><li>{{$item->pivot->item_name}}</li><li>{{$item->pivot->item_type_name}}</li><li>{{$item->pivot->item_unit_name}}</li></ul></td>
                                                    <td>{{$item->pivot->demand_date}}</td>
                                                    <td>{{$item->pivot->quantity}}</td>
                                                    <td>{{$item->pivot->specification}}</td>
                                                    <td>{{$item->pivot->remark}}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <h4><b>Remark :</b> {{$requisition->remark}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
            </div>
            <!-- END PAGE CONTENT-->
            <div class="row" style="text-align: center" >
                <a class="btn blue" style="background-color:#29931D"  href="{{ url()->previous() }}"><i class="fa fa-backward"></i>  Back</a>
                <button id="printbtn" class="btn red" ><i class="fa fa-print" aria-hidden="true">  Print Invoice</i></button>
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
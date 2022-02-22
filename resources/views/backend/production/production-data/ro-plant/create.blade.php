@extends('backend.master')
@section('site-title')
    Microbiological Test Report
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
            <h3 class="page-title bold">RO plant Daily Operational Report
                {{-- <a class="btn blue-ebonyclay pull-right" data-toggle="modal" href="#basic">
                    Add Requisition
                    <i class="fa fa-plus"></i>
                </a> --}}
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
            <form action="{{route('ro-plant.store')}}" class="form-horizontal" method="POST">
            {{ csrf_field() }}
            <div class="row" style="margin-bottom: 1%">
                <div class="col-md-6">
                    <label>Date</label>
                    <div class="input-group input-medium date date-picker"  data-date-format="yyyy-mm-dd" data-date-viewmode="years">
                        <input type="text" class="form-control" name="date" readonly >
                        <span class="input-group-btn">
                            <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                        </span>
                    </div>
                </div>
                <div class="col-md-6">
                    <label>Shift</label>
                    <input class="form-control" type="text" name="shift" value="">
                </div>
            </div>
            <hr>
                <div class="row" style="margin-bottom: 1%">
                    <div class="col-md-2">
                        <label>Start Time</label>
                        <input class="timepicker form-control event-time" id="start_tym" type="text" value="">
                    </div>
                    <div class="col-md-2">
                        <label>Stop Time</label>
                        <input class="timepicker form-control event-time" id="stop_tym" type="text" value="">
                    </div>
                    <div class="col-md-2">
                        <label for="">Testing Time</label>
                        <input type="text" class="timepicker form-control event-time" id="t_time" >
                    </div>
                    <div class="col-md-3">
                        <label for="">Chlorine Dosing(RWST)</label>
                        <input type="text" class="form-control" id="rwst_cl_d" placeholder="Input here">
                    </div>
                    <div class="col-md-3">
                        <label for="">Chlorine Check(RWST)</label>
                        <input type="text" class="form-control" id="rwst_cl_c" placeholder="Input here">
                    </div>
                </div>
                <Label style="margin-top: 1%;margin-bottom: 1%;"><b>Iron Removal/Manganese Filter 1 & 2</b></Label>
                <div class="row" style="margin-bottom: 1%">
                    <div class="col-md-4">
                        <label for="">Pressure(Inlet)</label>
                        <input class="form-control" id="p_inlet1" placeholder="Input here" type="text">
                    </div>
                    <div class="col-md-4">
                        <label for="">Pressure(Outlet)</label>
                        <input type="text" id="p_outlet1" placeholder="Input here" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="">Cl<sub>2</sub> Check</label>
                        <input type="text" id="cl_check1" placeholder="Input here" class="form-control">
                    </div>
                </div>
                <Label style="margin-top: 1%;margin-bottom: 1%;"><b>Sand Filter</b></Label>
                <div class="row" style="margin-bottom: 1%">
                    <div class="col-md-4">
                        <label for="">Pressure(Inlet)</label>
                        <input class="form-control" id="p_inlet2"  placeholder="Input here" type="text">
                    </div>
                    <div class="col-md-4">
                        <label for="">Pressure(Outlet)</label>
                        <input type="text" id="p_outlet2" placeholder="Input here" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="">Cl<sub>2</sub> Check</label>
                        <input type="text" id="cl_check2" placeholder="Input here" class="form-control">
                    </div>
                </div>
                <Label style="margin-top: 1%;margin-bottom: 1%;"><b>Carbon Filter</b></Label>
                <div class="row" style="margin-bottom: 1%">
                    <div class="col-md-4">
                        <label for="">Pressure(Inlet)</label>
                        <input class="form-control" id="p_inlet3" placeholder="Input here" type="text">
                    </div>
                    <div class="col-md-4">
                        <label for="">Pressure(Outlet)</label>
                        <input type="text" id="p_outlet3" placeholder="Input here" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="">Cl<sub>2</sub> Check</label>
                        <input type="text" id="cl_check3" placeholder="Input here" class="form-control">
                    </div>
                </div>
                <Label style="margin-top: 1%;margin-bottom: 1%;"><b>R.O. Plant</b></Label>
                <div class="row" style="margin-bottom: 1%">
                    <div class="col-md-3">
                        <label for="">Inlet Pressure Bar</label>
                        <input class="form-control" id="p_inlet_bar" placeholder="Input here" type="text">
                    </div>
                    <div class="col-md-3">
                        <label for="">Descaling dosing Set points</label>
                        <input type="text" id="dds_point" placeholder="Input here" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="">% of Descaling agent</label>
                        <input type="text" id="p_of_da" placeholder="Input here" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="">Caustic dosing Set Point</label>
                        <input type="text" id="cds_point" placeholder="Input here" class="form-control">
                    </div>
                </div>
                <div class="row" style="margin-bottom: 1%">
                    <div class="col-md-3">
                        <label for="">% of Caustic solution</label>
                        <input class="form-control" id="p_of_cs" placeholder="Input here" type="text">
                    </div>
                    <div class="col-md-3">
                        <label for="">pH</label>
                        <input type="text" id="ph" placeholder="Input here" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="">Conductance</label>
                        <input type="text" id="conductance" placeholder="Input here" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="">TDS,ppm</label>
                        <input type="text" id="tds" placeholder="Input here" class="form-control">
                    </div>
                </div>
                <div class="row" style="margin-bottom: 1%">
                    <div class="col-md-3">
                        <label for="">Chloride(cl<sup>-</sup>),ppm</label>
                        <input class="form-control" id="chloride" placeholder="Input here" type="text">
                    </div>
                    <div class="col-md-3">
                        <label for="">Product Water Flow</label>
                        <input type="text" id="pwf" placeholder="Input here" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="">Drauning Water Flow</label>
                        <input type="text" id="dwf" placeholder="Input here" class="form-control">
                    </div>
                </div>
                <div class="col-md-3" style="margin-left: 90%;margin-top:2%;margin-bottom:1%;">
                    <button type="button" class="btn btn-success" id="addbtn">Add</button>
                </div>
                <input type="hidden" name="reports"  id="reports">
                <hr><hr>
                <div class="portlet-body">
                    <div class="table-scrollable">
                        <table class="table table-striped table-bordered table-hover" id="mytable">
                            <thead>
                                <tr class="trtr">
                                    <th>
                                        Start Time
                                    </th>
                                    <th>
                                        Stop Time
                                    </th>
                                    <th>
                                        Testing Time
                                    </th>
                                    <th>
                                        Chlorine Dosing(RWST)
                                    </th>
                                    <th>
                                        Chlorine Check(RWST)
                                    </th>
                                    <th>
                                        Iron Removal/Manganese Filter 1&2 <br> (Pressure(Inlet)||Pressure(Outlet)||Chlorine Check)
                                    </th>
                                    <th>
                                        Sand Filter <br> (Pressure(Inlet)||Pressure(Outlet)||Chlorine Check)
                                    </th>
                                    <th>
                                        Carbon Filter <br> (Pressure(Inlet)||Pressure(Outlet)||Chlorine Check)
                                    </th>
                                    <th>
                                        R.O. plant <br> (Pressure bar(Inlet)||D.D. Set point||% of descaling agent||C.D. set point||% of Caustic solution||pH||Conductance||TDS,ppm||Chloride(cl<sup>-</sup>),ppm||Product Water Flow||Drauning Water Flow)
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        <div class="row">
                            {{-- <div class="col-md-12 text-center">{{ $employee->links() }}</div> --}}
                            {{-- {{ $requisition->links('vendor.pagination.custom') }} --}}
                        </div>
                    </div>
                </div>
                <button type="submit" style="margin-left: 40%"class="btn btn-primary">Submit</button>
            <!-- END PAGE CONTENT-->
            </form>
        </div>
    </div>
@endsection
@section('script')
<script type="text/javascript" src="dist/bootstrap-clockpicker.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-chained/1.0.1/jquery.chained.min.js" integrity="sha512-rcWQG55udn0NOSHKgu3DO5jb34nLcwC+iL1Qq6sq04Sj7uW27vmYENyvWm8I9oqtLoAE01KzcUO6THujRpi/Kg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $('.timepicker').timepicker({
     });
    $('.date-picker').datepicker();
    $('.date-picker').datepicker('setDate', 'today');
    jQuery(document).ready(function() {
            var max=0;
            var start_tym,stop_tym,rwst_cl_d,rwst_cl_c,p_inlet1,p_outlet1,cl_check1,p_inlet2,p_outlet2,cl_check2,p_inlet3,p_outlet3,cl_check3,p_inlet_bar,dds_point,p_of_da,cds_point,p_of_cs,ph,conductance,tds,chloride,pwf,dwf = null;
            function nullmaking(){
                // $("#start_tym").val(null);
                // $("#stop_tym").val(null);
                // $("#t_time").val(null);
                $("#rwst_cl_d").val(null);
                $("#rwst_cl_c").val(null);
                $("#p_inlet1").val(null);
                $("#p_outlet1").val(null);
                $("#cl_check1").val(null);
                $("#p_inlet2").val(null);
                $("#p_outlet2").val(null);
                $("#cl_check2").val(null);
                $("#p_inlet3").val(null);
                $("#p_outlet3").val(null);
                $("#cl_check3").val(null);
                $("#p_inlet_bar").val(null);
                $("#dds_point").val(null);
                $("#p_of_da").val(null);
                $("#cds_point").val(null);
                $("#p_of_cs").val(null);
                $("#ph").val(null);
                $("#conductance").val(null);
                $("#tds").val(null);
                $("#chloride").val(null);
                $("#pwf").val(null);
                $("#dwf").val(null);
            }
            var product_array = [];
            $("#addbtn").click(function() {
                start_tym =  $("#start_tym").val();
                stop_tym = $("#stop_tym").val();
                t_time = $("#t_time").val();
                rwst_cl_d = $("#rwst_cl_d").val();
                rwst_cl_c = $("#rwst_cl_c").val();
                p_inlet1 = $("#p_inlet1").val();
                p_outlet1 = $("#p_outlet1").val();
                cl_check1 = $("#cl_check1").val();
                p_inlet2 = $("#p_inlet2").val();
                p_outlet2 = $("#p_outlet2").val();
                cl_check2 = $("#cl_check2").val();
                p_inlet3 = $("#p_inlet3").val();
                p_outlet3 = $("#p_outlet3").val();
                cl_check3 = $("#cl_check3").val();
                p_inlet_bar = $("#p_inlet_bar").val();
                dds_point = $("#dds_point").val();
                p_of_da = $("#p_of_da").val();
                cds_point = $("#cds_point").val();
                p_of_cs = $("#p_of_cs").val();
                ph = $("#ph").val();
                conductance = $("#conductance").val();
                tds = $("#tds").val();
                chloride = $("#chloride").val();
                pwf = $("#pwf").val();
                dwf = $("#dwf").val();
                product_array.push({"start_tym":start_tym,"stop_tym":stop_tym,"t_time":t_time,"rwst_cl_d":rwst_cl_d,"rwst_cl_c":rwst_cl_c,"p_inlet1":p_inlet1,"p_outlet1":p_outlet1,"cl_check1":cl_check1,"p_inlet2":p_inlet2,"p_outlet2":p_outlet2,"cl_check2":cl_check2,"p_inlet3":p_inlet3,"p_outlet3":p_outlet3,"cl_check3":cl_check3,"p_inlet_bar":p_inlet_bar,"dds_point":dds_point,"p_of_da":p_of_da,"cds_point":cds_point,"p_of_cs":p_of_cs,"ph":ph,"conductance":conductance,"tds":tds,"chloride":chloride,"pwf":pwf,"dwf":dwf,"status":"stay"})
                console.log(product_array);
                $("#reports").val('');
                $("#reports").val(JSON.stringify(product_array));
                $.each( product_array, function( key, product ) {
                    if (product.status == "stay") {
                        if(product_array.length-1 == key){
                            $("table#mytable .trtr").last().after("<tr id='"+key+"'><td>"+product.start_tym+"</td><td>"+product.stop_tym+"</td><td>"+product.t_time+"</td><td>"+product.rwst_cl_d+"</td><td>"+product.rwst_cl_c+"</td><td>"+product.p_inlet1+" || "+product.p_outlet1+" || "+product.cl_check1+" </td><td> "+product.p_inlet2+" || "+product.p_outlet2+" || "+product.cl_check2+" </td><td> "+product.p_inlet3+" || "+product.p_outlet3+"</td><td>"+product.cl_check3+" || "+product.p_inlet_bar+" || "+product.dds_point+" || "+product.p_of_da+" || "+product.cds_point+" || "+product.p_of_cs+" || "+product.ph+" || "+product.conductance+" || "+product.tds+" || "+product.chloride+" || "+product.pwf+" || "+product.dwf+"</td><td><button class='btn btn-danger delete' data-id='"+key+"'>Delete</button></td></tr>");
                        }
                    }
                });
                $(".delete").click(function(){
                    product_array[$(this).data("id")].status="delete";
                    // console.log(product_array,$(this).data("id"));
                    $("#products").val('');
                    $("#products").val(JSON.stringify(product_array));
                    $("#"+$(this).data("id")).remove();
                });
                nullmaking();
            });
        });
</script>
@endsection
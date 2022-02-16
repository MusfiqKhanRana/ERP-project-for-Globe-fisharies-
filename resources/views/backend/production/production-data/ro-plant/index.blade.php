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
                    <input class="form-control" type="text" value="">
                </div>
            </div>
            <hr>
                <div class="row" style="margin-bottom: 1%">
                    <div class="col-md-3">
                        <label>Start Time</label>
                        <input class="timepicker form-control event-time" type="text" value="">
                    </div>
                    <div class="col-md-3">
                        <label>Stop Time</label>
                        <input class="timepicker form-control event-time" type="text" value="">
                    </div>
                    <div class="col-md-3">
                        <label for="">Chlorine Dosing(RWST)</label>
                        <input type="text" class="form-control" placeholder="Input here">
                    </div>
                    <div class="col-md-3">
                        <label for="">Chlorine Check(RWST)</label>
                        <input type="text" class="form-control" placeholder="Input here">
                    </div>
                </div>
                <Label style="margin-top: 1%;margin-bottom: 1%;"><b>Iron Removal/Manganese Filter 1 & 2</b></Label>
                <div class="row" style="margin-bottom: 1%">
                    <div class="col-md-4">
                        <label for="">Pressure(Inlet)</label>
                        <input class="form-control" placeholder="Input here" type="text">
                    </div>
                    <div class="col-md-4">
                        <label for="">Pressure(Outlet)</label>
                        <input type="text" placeholder="Input here" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="">Cl<sub>2</sub> Check</label>
                        <input type="text" placeholder="Input here" class="form-control">
                    </div>
                </div>
                <Label style="margin-top: 1%;margin-bottom: 1%;"><b>Sand Filter</b></Label>
                <div class="row" style="margin-bottom: 1%">
                    <div class="col-md-4">
                        <label for="">Pressure(Inlet)</label>
                        <input class="form-control" placeholder="Input here" type="text">
                    </div>
                    <div class="col-md-4">
                        <label for="">Pressure(Outlet)</label>
                        <input type="text" placeholder="Input here" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="">Cl<sub>2</sub> Check</label>
                        <input type="text" placeholder="Input here" class="form-control">
                    </div>
                </div>
                <Label style="margin-top: 1%;margin-bottom: 1%;"><b>Carbon Filter</b></Label>
                <div class="row" style="margin-bottom: 1%">
                    <div class="col-md-4">
                        <label for="">Pressure(Inlet)</label>
                        <input class="form-control" placeholder="Input here" type="text">
                    </div>
                    <div class="col-md-4">
                        <label for="">Pressure(Outlet)</label>
                        <input type="text" placeholder="Input here" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="">Cl<sub>2</sub> Check</label>
                        <input type="text" placeholder="Input here" class="form-control">
                    </div>
                </div>
                <Label style="margin-top: 1%;margin-bottom: 1%;"><b>R.O. Plant</b></Label>
                <div class="row" style="margin-bottom: 1%">
                    <div class="col-md-3">
                        <label for="">Inlet Pressure Bar</label>
                        <input class="form-control" placeholder="Input here" type="text">
                    </div>
                    <div class="col-md-3">
                        <label for="">Descaling dosing Set points</label>
                        <input type="text" placeholder="Input here" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="">% of Descaling agent</label>
                        <input type="text" placeholder="Input here" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="">Caustic dosing Set Point</label>
                        <input type="text" placeholder="Input here" class="form-control">
                    </div>
                </div>
                <div class="row" style="margin-bottom: 1%">
                    <div class="col-md-3">
                        <label for="">% of Caustic solution</label>
                        <input class="form-control" placeholder="Input here" type="text">
                    </div>
                    <div class="col-md-3">
                        <label for="">pH</label>
                        <input type="text" placeholder="Input here" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="">Conductance</label>
                        <input type="text" placeholder="Input here" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="">TDS,ppm</label>
                        <input type="text" placeholder="Input here" class="form-control">
                    </div>
                </div>
                <div class="row" style="margin-bottom: 1%">
                    <div class="col-md-3">
                        <label for="">Chloride(cl<sup>-</sup>),ppm</label>
                        <input class="form-control" placeholder="Input here" type="text">
                    </div>
                    <div class="col-md-3">
                        <label for="">Product Water Flow</label>
                        <input type="text" placeholder="Input here" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="">Drauning Water Flow</label>
                        <input type="text" placeholder="Input here" class="form-control">
                    </div>
                </div>
                <hr><hr>
                <div class="portlet-body">
                    <div class="table-scrollable">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
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
                                        Iron Removal/Manganese Filter 1&2
                                    </th>
                                    <th>
                                        Sand Filter
                                    </th>
                                    <th>
                                        Carbon Filter
                                    </th>
                                    <th>
                                        R.O. plant
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <th>
                                </th>
                                <th>
                                </th>
                                <th>
                                </th>
                                <th>
                                </th>
                                <th>
                                </th>
                                <th>
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>
                                                    Pressure(Inlet)
                                                </th>
                                                <th>
                                                    Pressure(Outlet)
                                                </th>
                                                <th>
                                                    Chlorine Check
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </th>
                                <th>
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>
                                                    Pressure(Inlet)
                                                </th>
                                                <th>
                                                    Pressure(Outlet)
                                                </th>
                                                <th>
                                                    Chlorine Check
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </th>
                                <th>
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>
                                                    Pressure(Inlet)
                                                </th>
                                                <th>
                                                    Pressure(Outlet)
                                                </th>
                                                <th>
                                                    Chlorine Check
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </th>
                                <th>
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>
                                                    Inlet Pressure Bar
                                                </th>
                                                <th>
                                                    D.D. Set point
                                                </th>
                                                <th>
                                                    % of descaling agent
                                                </th>
                                                <th>
                                                    C.D. set point
                                                </th>
                                                <th>
                                                    % of Casstic solution
                                                </th>
                                                <th>
                                                    pH
                                                </th>
                                                <th>
                                                    Conductance
                                                </th>
                                                <th>
                                                    TDS,ppm
                                                </th>
                                                <th>
                                                    Chloride(cl<sup>-</sup>),ppm
                                                </th>
                                                <th>
                                                    Product Water Flow
                                                </th>
                                                <th>
                                                    Drauning Water Flow
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </th>
                                <th>
                                </th>
                            </tbody>
                        </table>
                        <div class="row">
                            {{-- <div class="col-md-12 text-center">{{ $employee->links() }}</div> --}}
                            {{-- {{ $requisition->links('vendor.pagination.custom') }} --}}
                        </div>
                    </div>
                </div>
            <!-- END PAGE CONTENT-->
        </div>
    </div>
@endsection
@section('script')
<script type="text/javascript" src="dist/bootstrap-clockpicker.min.js"></script>
<script>
    $('.timepicker').timepicker({
     });
    $('.date-picker').datepicker();
    $('.date-picker').datepicker('setDate', 'today');
</script>
@endsection
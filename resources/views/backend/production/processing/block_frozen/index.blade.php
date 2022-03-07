
@extends('backend.master')
@section('site-title')
    Medicine Report
@endsection

@section('main-content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <h3 class="page-title" class="portlet box dark"><b>Production Management</b>
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
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet-body" style="height: auto;">
                        <ul class="nav nav-pills nav-stacked col-md-2">
                            <li style="margin-bottom:5px;" class="active"><a href="#tab_a" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>Whole</b></a></li>
                            <li style="margin-bottom:5px;"><a href="#tab_b" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>Clean</b></a></li>
                        </ul>
                        <div class="tab-content col-md-10 portlet-body">
                            <div class="tab-pane active" id="tab_a">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <b>Whole List</b>
                                    </div>
                                    <div class="tools"> </div>
                                </div>
                                <hr>
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>
                                                Invoice No.
                                            </th>
                                            <th>
                                                Item Name
                                            </th>
                                            <th>
                                                Grade
                                            </th>
                                            <th>
                                                Quantity
                                            </th>
                                            <th style="text-align: center">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                1001
                                            </td>
                                            <td>
                                                Rui
                                            </td>
                                            <td>
                                                300-500gm
                                            </td>
                                            <td>
                                                60kg
                                            </td>
                                            <td>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#processData" class="btn btn-info"><i class="fa fa-refresh" aria-hidden="true"></i> Process Data</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#blocking" class="btn btn-success"><i class="fa fa-bar-chart" aria-hidden="true"></i> Bloicking</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#blockCounter" class="btn btn-warning"><i class="fa fa-calculator" aria-hidden="true"></i> Block Counter</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#excessVolume" class="btn btn-dark"><i class="fa fa-refresh" aria-hidden="true"></i> Excess Volume</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#WastageReturn" class="btn btn-danger"><i class="fa fa-refresh" aria-hidden="true"></i> Wastage/Return</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                1002
                                            </td>
                                            <td>
                                                Pangash
                                            </td>
                                            <td>
                                                200-300gm
                                            </td>
                                            <td>
                                                50kg
                                            </td>
                                            <td>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#processData" class="btn btn-info"><i class="fa fa-refresh" aria-hidden="true"></i> Process Data</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#blocking" class="btn btn-success"><i class="fa fa-bar-chart" aria-hidden="true"></i> Bloicking</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#blockCounter" class="btn btn-warning"><i class="fa fa-calculator" aria-hidden="true"></i> Block Counter</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#excessVolume" class="btn btn-dark"><i class="fa fa-refresh" aria-hidden="true"></i>  Excess Volume</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#WastageReturn" class="btn btn-danger"><i class="fa fa-refresh" aria-hidden="true"></i>  Wastage/Return</button>
                                                
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane" id="tab_b">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <b>Clean List</b>
                                    </div>
                                    <div class="tools"> </div>
                                </div>
                                <hr>
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>
                                                Invoice No.
                                            </th>
                                            <th>
                                                Item Name
                                            </th>
                                            <th>
                                                Grade
                                            </th>
                                            <th>
                                                Quantity
                                            </th>
                                            <th style="text-align: center">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                10001
                                            </td>
                                            <td>
                                                Rui
                                            </td>
                                            <td>
                                                300-500gm
                                            </td>
                                            <td>
                                                60kg
                                            </td>
                                            <td>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#blockSize1" class="btn btn-success"><i class="fa fa-refresh" aria-hidden="true"></i>  Processing Data</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#SoakingModal" class="btn btn-primary"><i class="fa fa-refresh" aria-hidden="true"></i>  Wastage/Excess/Return</button>
                                                
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                200011
                                            </td>
                                            <td>
                                                Pangash
                                            </td>
                                            <td>
                                                200-300gm
                                            </td>
                                            <td>
                                                50kg
                                            </td>
                                            <td>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#blockSize1" class="btn btn-success"><i class="fa fa-refresh" aria-hidden="true"></i> Processing Data</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#SoakingModal" class="btn btn-primary"><i class="fa fa-refresh" aria-hidden="true"></i> Wastage/Excess/Return</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div id="processData" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                {{csrf_field()}}
                                <input type="hidden" value="" id="delete_id">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="#" method="POST">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                <h2 class="modal-title" style="color: rgb(75, 65, 65);">Inotial Weight</h2>
                                            </div>
                                            <div class="modal-body">
                                                    @csrf
                                                <p><b>Invoice no:</b> 1111111</p>
                                                <p><b>Item Name:</b> Pangas</p>
                                                <p><b>Quantity:</b> 50kg</p>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-md-7">
                                                        <label>Initial Weight</label>
                                                        <input type="text" class="form-control" placeholder="Type Initial weight">
                                                    </div>
                                                    <div class="col-md-3" style="margin-top: 5%"><b>Parcentage:</b> 12%</div>
                                                </div><br>
                                            </div>
                                            
                                            <div class="modal-footer">
                                                <button type="submit" class="m-10 btn btn-success">Confirm</button>
                                                <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div id="blocking" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                {{csrf_field()}}
                                <input type="hidden" value="" id="delete_id">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="#" method="POST">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                <h2 class="modal-title" style="color: rgb(75, 65, 65);"> Blocking</h2>
                                            </div>
                                            <div class="modal-body">
                                                    @csrf
                                                <p><b>Invoice no:</b> 1111111</p>
                                                <p><b>Item Name:</b> Pangas</p>
                                                <p><b>Quantity:</b> 50kg</p>
                                                <p><b>Initial Weight:</b> 50kg</p>
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <label>Block Size</label>
                                                        <select type="text" class="form-control" >
                                                            <option>10</option>
                                                            <option>12</option>
                                                            <option>15</option>
                                                            <option>20</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <label>Quantity</label>
                                                        <select type="text" class="form-control">
                                                            <option>10</option>
                                                            <option>12</option>
                                                            <option>15</option>
                                                            <option>20</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-1" style="margin-top: 4%">
                                                        <button class="btn btn-success">+ Add</button>
                                                    </div>
                                                </div><br>
                                                <div class="col-md-12">
                                                    <table class="table table-striped table-bordered table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th style="text-align: center">
                                                                    Block Size
                                                                </th>
                                                                <th style="text-align: center">
                                                                    Size
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td style="text-align: center">
                                                                    300-500gm
                                                                </td>
                                                                <td style="text-align: center">
                                                                    5
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <br><br><br><br>
                                            <div class="modal-footer">
                                                <button type="submit" class="m-10 btn btn-success">Confirm</button>
                                                <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            {{-- <div id="blocking33" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                {{csrf_field()}}
                                <input type="hidden" value="" id="delete_id">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="#" method="POST">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h2 class="modal-title" style="color: rgb(75, 65, 65);"> Soaking</h2>
                                                </div>
                                                <br>
                                                <div class="modal-body">
                                                        @csrf
                                                    <p><b>Invoice no:</b> 1111111</p>
                                                    <p><b>Item Name:</b> Pangas</p>
                                                    <p><b>Quantity:</b> 50kg</p>
                                                    <div class="col-md-12">
                                                        <table class="table table-striped table-bordered table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th>
                                                                        Grade
                                                                    </th>
                                                                    <th>
                                                                        Quantity
                                                                    </th>
                                                                    <th>
                                                                        Soaking
                                                                    </th>
                                                                    <th>
                                                                        Damage Weight
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        300-500gm
                                                                    </td>
                                                                    <td>
                                                                        5kg
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" class="form-control">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" class="form-control">
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
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
                            </div> --}}
                            <div id="blockCounter" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                {{csrf_field()}}
                                <input type="hidden" value="" id="delete_id">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="#" method="POST">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                <h2 class="modal-title" style="color: rgb(75, 65, 65);">Block Counter </h2>
                                            </div>
                                            <div class="modal-body">
                                                @csrf
                                            <p><b>Invoice no:</b> 1111111</p>
                                            <p><b>Item Name:</b> Pangas</p>
                                            <p><b>Quantity:</b> 50kg</p>
                                            <p><b>Initial Weight:</b> 50kg</p>
                                            <div class="col-md-12">
                                                <table class="table table-striped table-bordered table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>
                                                                Block Size
                                                            </th>
                                                            <th>
                                                                Size
                                                            </th>
                                                            <th>
                                                               Quantity
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                300-500gm
                                                            </td>
                                                            <td>
                                                                5kg
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" placeholder="Type Quantity">
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                            <br><br>
                                            <div class="modal-footer">
                                                <button type="submit" class="m-10 btn btn-success">Confirm</button>
                                                <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div id="excessVolume" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                {{csrf_field()}}
                                <input type="hidden" value="" id="delete_id">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="#" method="POST">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                <h2 class="modal-title" style="color: rgb(75, 65, 65);">Excess Volume </h2>
                                            </div>
                                            <div class="modal-body">
                                                @csrf
                                            <p><b>Invoice no:</b> 1111111</p>
                                            <p><b>Item Name:</b> Pangas</p>
                                            <p><b>Quantity:</b> 50kg</p>
                                            <p><b>Initial Weight:</b> 50kg</p>
                                            <div class="col-md-12">
                                                <table class="table table-striped table-bordered table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>
                                                                Block Size
                                                            </th>
                                                            <th>
                                                                Size
                                                            </th>
                                                            <th>
                                                               Quantity
                                                            </th>
                                                            <th>
                                                                Excess Volume
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                300-500gm
                                                            </td>
                                                            <td>
                                                                5kg
                                                            </td>
                                                            <td>
                                                                100
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" placeholder="Type  Excess Volume">
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                            <br><br>
                                            <div class="modal-footer">
                                                <button type="submit" class="m-10 btn btn-success">Confirm</button>
                                                <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            {{-- <div id="SoakingModal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                {{csrf_field()}}
                                <input type="hidden" value="" id="delete_id">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="#" method="POST">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                <h2 class="modal-title" style="color: rgb(75, 65, 65);"> Clean</h2>
                                            </div>
                                            <br>
                                            <div class="modal-body">
                                                    @csrf
                                                <p><b>Invoice no:</b> 1111111</p>
                                                <p><b>Item Name:</b> Pangas</p>
                                                <p><b>Quantity:</b> 50kg</p>
                                                <p><b>After Cleaning:</b> 20</p>
                                                <p><b>Block Size:</b> 10</p>
                                                <p><b>Block quantity:</b> 50kg</p>
                                                <hr>
                                                <div class="row" style="margin: 3%">
                                                    <div class="col-md-4">
                                                        <label>Wastage</label>
                                                        <input type="text" class="form-control" placeholder="Cleaning">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Excess</label>
                                                        <input type="text" class="form-control" placeholder="Block Quantity">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Return</label>
                                                        <input type="text" class="form-control" placeholder="Return">
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
                            </div> --}}
                            <div id="WastageReturn" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                {{csrf_field()}}
                                <input type="hidden" value="" id="delete_id">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="#" method="POST">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                <h2 class="modal-title" style="color: rgb(75, 65, 65);"> Wastage & Return</h2>
                                            </div>
                                            
                                            <div class="modal-body">
                                                <div class="row" style="margin: 3%" >
                                                    @csrf
                                                <p><b>Invoice no:</b> 1111111</p>
                                                <p><b>Item Name:</b> Pangas</p>
                                                <p><b>Quantity:</b> 50kg</p>
                                                <div>
                                                <table>
                                                    <thead>
                                                        <tr>
                                                            <th></th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-md-12">
                                                <table class="table table-striped table-bordered table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>
                                                                Block Size
                                                            </th>
                                                            <th>
                                                                Size
                                                            </th>
                                                            <th>
                                                               Quantity
                                                            </th>
                                                            <th>
                                                                Excess Volume
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                300-500gm
                                                            </td>
                                                            <td>
                                                                5kg
                                                            </td>
                                                            <td>
                                                                15
                                                            </td>
                                                            <td>
                                                                5
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Wastage</label>
                                                        <input type="text" class="form-control" placeholder=" Type Wastage Volume">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label>Return</label>
                                                        <input type="text" class="form-control" placeholder=" Type Return Value">
                                                    </div>
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
                        </div><!-- tab content -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script src="https://cdn.tiny.cloud/1/i2a8bjsghb2egjws1cli2w9fcs5ke9j47f8jhfky1sq28f5q/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    $(function() {
        tinymce.init({
            selector: 'textarea',
            init_instance_callback : function(editor) {
                var freeTiny = document.querySelector('.tox .tox-notification--in');
                freeTiny.style.display = 'none';
            }
        });
    });
    
  </script>
@endsection




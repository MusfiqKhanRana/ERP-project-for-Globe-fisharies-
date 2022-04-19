@extends('backend.master')
@section('site-title')
   CS List
@endsection
@section('style')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/i18n/defaults-*.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@endsection
@section('main-content')
    <!-- BEGIN CONTENT -->
    <!-- BEGIN PAGE TITLE-->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
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
            @if(Session::has('msg'))
                <script>
                    $(document).ready(function(){
                        swal("{{Session::get('msg')}}","", "success");
                    });
                </script>
            @endif
            <h3 class="page-title bold">Purchase Management
            </h3>
            <div class="portlet box blue-chambray">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-briefcase"></i>CS List
                    </div>
                    <div class="tools">
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-scrollable">
                        <form class="form-horizontal" role="form" method="post" action="#">
                            {{csrf_field()}}
                            <div class="row" style="margin: 3%" >
                                <p ><b>Item name:</b> <span id="item_name"></span></p>
                                <p ><b>Department:</b> <span id="department"></span></p>
                                <p ><b>Request By:</b> <span id="request_by"></span></p>
                                <p ><b>Demand Date:</b><span id="demand_date"></span></p>
                            </div>
                            <hr>
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>
                                            S.l
                                        </th>
                                        <th>Supplier Name</th>
                                        <th>Price</th>
                                        <th>Speciality</th>
                                        <th>Negotiable Price</th>
                                        <th>Remark</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($general_purchase as $key=> $data)
                                    <tr>
                                        <td>
                                            {{++ $key}}
                                        </td>
                                        <td>{{$data->supplier->name}}</td>
                                        <td>{{$data->price}}</td>
                                        <td>{{$data->speciality}}</td>
                                        <td>
                                            <input type="text" class="price" placeholder="Price">
                                        </td>
                                        <td>
                                            <textarea type="text" class="remark" placeholder="Remark"></textarea>
                                        </td>
                                        
                                        <td>
                                            <button class="btn btn-danger" data-toggle="modal" href="#rejectModal">Reject</button>
                                            <button class="btn btn-info">Confirm</button>
                                        </td>
                                    </tr>

                                    <div id="rejectModal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Reject Note</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="form-horizontal" role="form" method="post" action="{{--route('supply-list-item.store')--}}">
                                                        {{csrf_field()}}
                                                        <div class="form-group">
                                                            <label class="col-md-2 control-label" name="remark">Remark  :</label>
                                                            <div class="col-md-9" >
                                                                <textarea type="text"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                            <button type="submit" class="btn red-flamingo"><i class="fa fa-floppy-o"></i> Save</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </tbody>
                            </table>
                            <div>
                                <button type="submit" class="col-md-12 btn btn-info submitButton" ><i class="fa fa-floppy-o"></i> Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script>
    $(document).ready(function(){
        $('.submitButton').hide();
        $('.price').keyup(function()
        {
            ($(this).is(':input')) 
                $('.submitButton').show();

        });
        
    });
</script>
@endsection

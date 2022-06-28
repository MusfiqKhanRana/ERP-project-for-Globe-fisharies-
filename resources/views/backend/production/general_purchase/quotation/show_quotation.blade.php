@extends('backend.master')
@section('site-title')
    Show Quotation
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
                    <i class="fa fa-briefcase"></i>Quotation List
                </div>
                    <div class="tools">
                    </div>
                </div>
            </div>
                <div class="portlet-body">
                    <form action="{{route('production-quotation-confirm')}}" class="form-horizontal" method="POST">
                    {{ csrf_field() }}
                    @method('PUT')
                    <div class="row" style="margin: 3%" >
                        <p ><b>Item Name: </b>  {{$purchase_item->item_name}}</p>
                        <p ><b>Department:</b>  {{$purchase_item->production_purchase_requisition->departments->name}} </p>
                        <p ><b>Request By:</b>  {{$purchase_item->production_purchase_requisition->users->name}}</p>
                        <p ><b>Demand Date:</b>  {{$purchase_item->demand_date}}</p>
                    </div>
                    <div class="table-scrollable">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Serial</th>
                                <th>Supplier Name</th>
                                <th>Price</th>
                                <th>Speciality</th>
                                <th style="text-align: center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($purchase_item->production_general_purchase_quotation as $key=> $data)
                                <tr id="row1">
                                    <td>{{++ $key}}</td>
                                    <td> {{$data->supplier->name}}</td>
                                    <td> {{$data->price}}</td>
                                    <td>{{$data->speciality}}</td>
                                    <td style="text-align: center">
                                        <a class="btn btn-info"  data-toggle="modal" href="#edit{{$data->id}}"><i class="fa fa-edit"></i> Edit</a>
                                        <a class="btn red delete" data-toggle="modal" data-route="{{route('production-quotation-all-list.destroy',$data->id)}}" data-id="{{$data->id}}" href="#deleteModal"><i class="fa fa-trash"></i> Delete</a>
                                    </td> 
                                </tr> 
                                
                                <div id="edit{{$data->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                <h4 class="modal-title">Update (<b>{{$data->supplier->name}}</b>) Data</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form-horizontal" role="form" method="post" action="{{route('production-quotation-all-list.update', $data->id)}}">
                                                    {{csrf_field()}}
                                                    {{method_field('put')}}
                                                    <div class="form-group">
                                                        <label for="inputEmail1" class="col-md-2 control-label">Price</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" value="{{$data->price}}" required name="price">
                                                        </div><br><br>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail1" class="col-md-2 control-label">Speciality</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" value="{{$data->speciality}}" required name="speciality">
                                                        </div><br><br>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                        <button type="submit" class="btn red-flamingo"><i class="fa fa-floppy-o"></i> Update</button>
                                                    </div>
                                                </form>
        
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <input type="hidden" value="{{$purchase_item->id}}" id="requisition_item_id" name="requisition_item_id">
                                    <input type="hidden" value="{{$purchase_item->production_purchase_requisition_id}}" name="requisition_id">
                                </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <button type="submit" class="col-md-12 btn btn-info pull-right" >
                            Confirm
                        </button>
                    </div>
                    </form>
                    <div id="deleteModal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                        {{csrf_field()}}
                        <input type="hidden" value="" id="id">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h2 class="modal-title" style="color: red;">Are you sure?</h2>
                                </div>
                                <div class="modal-footer " >
                                    <div class="d-flex justify-content-between">
                                        <button type="button"data-dismiss="modal"  class="btn default">Cancel</button>
                                    </div>
                                    <div class="caption pull-right">
                                        <form action="" id="delete_quotation" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn red" id="delete"><i class="fa fa-trash"></i>Delete</button>               
                                        </form>
                                    </div>
                                </div>
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
    $(document).ready(function () {
        
        $(".delete").click(function(){
            $("#id").val($(this).data('id'));
            $('#delete_quotation').attr('action', $(this).data('route'));
            console.log($(this).data('route'));
           //console.log($(this).data('id'));
        });
    })
</script>
@endsection



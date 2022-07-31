@extends('backend.master')
@section('site-title')
   Requisition
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
            
            <!-- BEGIN PAGE TITLE-->
            <h3 class="page-title bold">Supply Management
            </h3>
            <!-- END PAGE TITLE-->
            
            <!--category table start-->
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-globe"></i>Production Supply List</div>
                    <div class="tools"> </div>
                </div>
                        <div class="portlet-body">
                            <div class="table-scrollable">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th style="text-align: center;">Serial</th>
                                        <th style="text-align: center">Date</th>
                                        <th style="text-align: center"> Items</th>
                                        <th style="text-align: center"> Remark</th>
                                        <th style="text-align: center"> Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($supply_lists as $key=> $data)
                                            <tr id="row1">
                                                <td>{{++$key}}</td>
                                                <td class="text-align: center;"> {{$data->expected_date}}</td>
                                                <td>
                                                    <table class="table table-striped table-bordered table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>Sl.</th>
                                                                <th>Item Name</th>
                                                                <th>Category</th>
                                                                <th>Grade Name</th>
                                                                <th>Quantity(kg)</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($data->production_supply_list_items as $key2=> $item)
                                                                <tr>
                                                                    <th>{{++$key2}}</th>
                                                                    <th>{{$item->name}}</th>
                                                                    <th>{{$item->category}}</th>
                                                                    <th>{{$item->grade->name}}</th>
                                                                    <th>{{$item->pivot->quantity}}</th>  
                                                                    <th>
                                                                        <a class="btn red" data-toggle="modal" href="#deletModal{{$item->id}}"><i class="fa fa-trash"></i> Delete</a>
                                                                        
                                                                        {{-- <a class="btn blue"  data-toggle="modal" href="#deletproductModal{{$item->pivot->id}}"><i class="fa fa-edit"></i> Delete</a> --}}
                                                                    </th>
                                                                </tr>
                                                                <div id="deletModal{{$item->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                                                    {{csrf_field()}}
                                                                    <input type="hidden" value="" id="delete_id">
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
                                                                                    <form action="{{route('supply-list-item.destroy',[$item->id])}}" method="POST">
                                                                                        @method('DELETE')
                                                                                        @csrf
                                                                                        <button class="btn red" id="delete"><i class="fa fa-trash"></i>Delete</button>               
                                                                                    </form>
                                                                                </div>
                                                                                <!-- <a type="submit" href="{{route('pack.destroy',$data->id)}}" class="btn red" id="delete"><i class="fa fa-trash"></i> Delete</a> -->
                                                                            </div>
                                                                            
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td>{{$data->remark}}</td>
                                                <td style="text-align: center">
                                                    <a class="btn green"  href={{route('supply.list.show', $data->id)}}><i class="fa fa-arrow-circle-right"></i>Add Supply</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection





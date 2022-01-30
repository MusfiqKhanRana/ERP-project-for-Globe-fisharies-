@extends('backend.master')
@section('site-title')
   Party List
@endsection 
@section('main-content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <h3 class="page-title" class="portlet box dark">Party List
            </h3>
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
                                        <th style="text-align: center;">Serial</th>
                                        <th style="text-align: center"> Code</th>
                                        <th style="text-align: center"> Name</th>
                                        <th style="text-align: center"> Phone</th>
                                        <th style="text-align: center"> Address</th>
                                        <th style="text-align: center"> Enlisted Product</th>
                                        <th style="text-align: center"> Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($parties as $key=> $data)
                                            <tr id="row1">
                                                <td>{{$data->id}}</td>
                                                <td class="text-align: center;"> {{$data->party_code}}</td>
                                                <td class="text-align: center;"> {{$data->party_name}}</td>
                                                <td class="text-align: center;"> {{$data->phone}}</td>
                                                <td class="text-align: center;"> {{$data->address}}</td>
                                                <td>
                                                    <table class="table table-striped table-bordered table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>Sl.</th>
                                                                <th>Name</th>
                                                                {{-- <th>Purchase Price</th> --}}
                                                                <th>Party Price</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($data->product_parties as $key2=> $item)
                                                                <tr>
                                                                    <th>{{++$key2}}</th>
                                                                    <th>{{$item->product_name}}</th>
                                                                    {{-- <th>{{$item->buying_price}}</th> --}}
                                                                    <th>{{$item->pivot->price}}</th>  
                                                                    <th>
                                                                        <a class="btn red" data-toggle="modal" href="#deletproductModal{{$item->pivot->id}}"><i class="fa fa-trash"></i> Delete</a>
                                                                        {{-- <form action="{{route('party-product.destroy',$item->pivot->id)}}" method="POST">
                                                                            @method('DELETE')
                                                                            @csrf
                                                                            <button type="submit" class="btn red"><i class="fa fa-trash"></i> Delete</button>
                                                                        </form><br> --}}
                                                                        <a class="btn blue"  data-toggle="modal" href="#edit_product_Modal{{$item->pivot->id}}"><i class="fa fa-edit"></i> Edit</a>
                                                                    </th>
                                                                </tr>
                                                                <div id="edit_product_Modal{{$item->pivot->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                                                <h4 class="modal-title">Update Party ({{$item->product_name}}) </h4>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <form class="form-horizontal" role="form" method="post" action="{{route('party-product.update', $item->pivot->id)}}">
                                                                                    {{csrf_field()}}
                                                                                    {{method_field('put')}}
                                                                                    {{--<div class="col-md-12">
                                                                                        <div class="form-group">
                                                                                            <label for="inputEmail1" class="col-md-2 control-label">Product Name</label>
                                                                                            <div class="col-md-8">
                                                                                                <input type="text" class="form-control" value="{{$item->product_name}}" required name="Product Name">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div> --}}
                                                                                    <div class="col-md-12">
                                                                                        <div class="form-group">
                                                                                            <label for="inputEmail1" class="col-md-2 control-label">Selling Price</label>
                                                                                            <div class="col-md-10">
                                                                                                <input type="text" class="form-control" value="{{$item->pivot->price}}" required name="price">
                                                                                                <input type="hidden" value="{{$item->pivot->id}}">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div><br><br><br>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                                                        <button type="submit" class="btn red-flamingo"><i class="fa fa-floppy-o"></i> Update</button>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div id="deletproductModal{{$item->pivot->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
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
                                                                                    <form action="{{route('party-product.destroy',[$item->pivot->id])}}" method="POST">
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
                                                <td style="text-align: center">
                                                    <a class="btn blue"  data-toggle="modal" href="{{route('party.edit',$data->id)}}"><i class="fa fa-edit"></i> Edit</a>
                                                    <a class="btn red" data-toggle="modal" href="#deletepartyModal{{$data->id}}"><i class="fa fa-trash"></i> Delete</a>
                                                </td>
                                            </tr>
                                            <div id="deletepartyModal{{$data->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
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
                                                                <form action="{{route('party.destroy',[$data->id])}}" method="POST">
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
                                            <div id="edit_partyModal{{$data->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                            <h4 class="modal-title">Update Party</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form class="form-horizontal" role="form" method="post" action="{{route('party.update', $data->id)}}">
                                                                {{csrf_field()}}
                                                                {{method_field('put')}}

                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="inputEmail1" class="col-md-2 control-label">Party Code</label>
                                                                        <div class="col-md-8">
                                                                            <input type="text" class="form-control" value="{{$data->party_code}}" required name="party_code">
                                                                        </div>
                                                                    </div>
                                                                </div><br><br>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="inputEmail1" class="col-md-2 control-label">Party Name</label>
                                                                        <div class="col-md-8">
                                                                            <input type="text" class="form-control" value="{{$data->party_name}}" required name="party_name">
                                                                        </div>
                                                                    </div>
                                                                </div><br><br>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="inputEmail1" class="col-md-2 control-label">Phone</label>
                                                                        <div class="col-md-8">
                                                                            <input type="text" class="form-control" value="{{$data->phone}}" required name="phone">
                                                                        </div>
                                                                    </div>
                                                                </div><br><br>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="inputEmail1" class="col-md-2 control-label">Party Type</label>
                                                                        <div class="col-md-8">
                                                                            <input type="text" class="form-control" value="{{$data->party_type}}" required name="party_type">
                                                                        </div>
                                                                    </div>
                                                                </div><br><br>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="inputEmail1" class="col-md-2 control-label">Party Short Name</label>
                                                                        <div class="col-md-8">
                                                                            <input type="text" class="form-control" value="{{$data->party_short_name}}" required name="party_short_name">
                                                                        </div>
                                                                    </div>
                                                                </div><br><br>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="inputEmail1" class="col-md-2 control-label"> Address</label>
                                                                        <div class="col-md-8">
                                                                            <input type="text" class="form-control" value="{{$data->address}}" required name="address">
                                                                        </div>
                                                                    </div>
                                                                </div><br><br>
                                                                <div class="modal-footer">
                                                                    <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                                    <button type="submit" class="btn red-flamingo"><i class="fa fa-floppy-o"></i> Update</button>
                                                                </div><br><br><br><br>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="row">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


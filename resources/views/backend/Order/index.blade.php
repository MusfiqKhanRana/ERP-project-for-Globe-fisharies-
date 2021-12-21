@extends('backend.master')
@section('site-title')
    Order History
@endsection
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
            <h3 class="page-title bold">Order History</h3>

            <div class="row">
                <div class="col-md-12">
                    <div class="portlet box grey-salt">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-clipboard"></i>History List
                            </div>
                        </div>

                        <div class="portlet-body">


                            <table class="table table-striped table-bordered table-hover" id="notices">
                                <thead>
                                <tr>
                                    {{-- <th> Date </th> --}}
                                    <th> ID </th>
                                    <th> Customer Type </th> 
                                    <th> Status </th>
                                    <th> Remark</th>
                                    <th style="text-align: center"> Product</th>
                                    <th style="text-align: center"> Action </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($order as $key=>$data)
                                    @php
                                        $color = '';
                                        $textcolor = '';
                                        if ($data->status == 'Confirm') {
                                            $color = '#c9e3c1';
                                            $textcolor = "black";
                                        }
                                    @endphp
                                    <tr style="background-color: {{$color}}; color:{{$textcolor}}">
                                        {{-- <td>{{$data->created_at}}</td> --}}
                                        <td>{{$data->id}}</td>
                                        <td>{{$data->customer->customer_type}}</td>
                                        <td>{{$data->status }}</td>
                                        <td>{{$data->remark}}</td>
                                        <td>
                                            <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>s.l</th>
                                                    <th>Category</th>
                                                    <th>Name</th>
                                                    <th>Quantity</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($data->products as $key2=> $item)
                                                    <tr>
                                                        <th>{{++$key2}}</th>
                                                        <th>{{$item->category->name}}</th>
                                                        <th>{{$item->product_name}}</th>
                                                        <th>{{$item->pivot->quantity}}</th>
                                                        <th>
                                                            <form action="{{route('orderproduct.destroy',$item->pivot->id)}}" method="POST">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button type="submit" class="btn red"><i class="fa fa-trash"></i> Delete</button>
                                                            </form>
                                                        </th>
                                                    </tr>
                                               @endforeach
                                            </tbody>
                                        </table>
                                        </td>
                                        <td style="text-align: center">
                                            @if($data->status == 'Pending')
                                                <a class="btn purple" href="{{route('order.confirm',$data->id)}}"><i class="fa fa-check-circle-o"></i> confirm</a>
                                            @endif
                                            <a class="btn blue-chambray"  data-toggle="modal" href=""><i class="fa fa-edit"></i> Edit</a>
                                            <a class="btn red" data-toggle="modal" href="#deleteModal{{$data->id}}"><i class="fa fa-trash"></i> Delete</a>
                                        </td>
                                    </tr>
                                    {{-- <div id="editModal{{$data->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h4 class="modal-title">Update User</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="form-horizontal" role="form" method="post" action="{{route('user-type.update', $data->id)}}">
                                                        {{csrf_field()}}
                                                        {{method_field('put')}}
                                                        <div class="form-group">
                                                            <label for="inputEmail1" class="col-md-2 control-label">User Name</label>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" value="{{$data->name}}" required name="name">
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
                                    </div> --}}
                                    <div id="deleteModal{{$data->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                        {{csrf_field()}}
                                        <input type="hidden" value="" id="delete_id">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h2 class="modal-title" style="color: red;">Are you sure?</h2>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                    <br>
                                                    <form action="{{route('order-history.destroy',[$data->id])}}" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="btn red" id="delete"><i class="fa fa-trash"></i>Delete</button>               
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div id="deleteproductModal{{$item->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                        {{csrf_field()}}
                                        <input type="hidden" value="" id="delete_id">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h2 class="modal-title" style="color: red;">Are you sure?</h2>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                    <br>
                                                    <form action="{{route('order.destroy',[$item->id])}}" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="btn red" id="delete"><i class="fa fa-trash"></i>Delete</button>               
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

@endsection

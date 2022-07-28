@extends('backend.master')
@section('site-title')
    Supply Items
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
                        // swal("{{Session::get('msg')}}","", "success");
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: "{{Session::get('msg')}}",
                            showConfirmButton: false,
                            timer: 1500
                        })
                    });
                </script>
            @endif
            <h3 class="page-title bold form-inline">Items
                <small> Supply-Items </small>
                {{-- <div class="form-group" style="margin-left: 10%">
                    <i class="fa fa-search" aria-hidden="true"></i>
                </div> --}}
                <a class="btn blue-ebonyclay pull-right" data-toggle="modal" href="#basic">
                    Add Item
                    <i class="fa fa-plus"></i>
                </a>
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
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet box blue-chambray">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-briefcase"></i>Items List
                            </div>
                            <div class="tools">
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="table-scrollable">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>
                                            Sl.
                                        </th>
                                        <th>
                                            Item Name
                                        </th>
                                        <th>
                                            Category
                                        </th>
                                        <th>
                                            Market Name
                                        </th>
                                        <th>
                                            Grade Name
                                        </th>
                                        <th>
                                            Remark
                                        </th>
                                        <th style="text-align: center">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($items as $key=>$item)
                                        <tr>
                                            <td>{{++$key}}</td>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->category}}</td>
                                            <td>{{$item->market_name}}</td>
                                            <td>{{$item->grade->name}}</td>
                                            <td>{{$item->details}}</td>
                                            <td style="text-align: center">
                                                <a class="btn btn-info"  data-toggle="modal" href="#editareaModal{{$item->id}}"><i class="fa fa-edit"></i> Edit</a>
                                                <a class="btn red" data-toggle="modal" href="#deleteareaModal{{$item->id}}"><i class="fa fa-trash"></i> Delete</a>
                                            </td>
                                        </tr>
                                        <div id="deleteareaModal{{$item->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
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
                                                            <form action="{{route('supply-item.destroy',[$item])}}" method="POST">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button class="btn red" id="delete"><i class="fa fa-trash"></i>Delete</button>               
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="editareaModal{{$item->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                        <h4 class="modal-title">Update Area</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class="form-horizontal" role="form" method="post" action="{{route('supply-item.update', $item)}}">
                                                            {{csrf_field()}}
                                                            {{method_field('put')}}
                                                            <div class="form-group">
                                                                <label for="inputEmail1" class="col-md-2 control-label">Item Name</label>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" value="{{$item->name}}"  name="name">
                                                                </div>
                                                                <br><br>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="inputEmail1" class="col-md-2 control-label">Category</label>
                                                                <div class="col-md-8">
                                                                    <select name="category" class="form-control" id="">
                                                                        <option value="">--Select--</option>
                                                                        <option value="Fish" {{ $item->category == "Fish" ? 'selected' : '' }}>Fish</option>
                                                                        <option value="Vegetable/Fruit" {{ $item->category == "Vegetable/Fruit" ? 'selected' : '' }}>Vegetable/Fruit</option>
                                                                        <option value="Sweet Desert" {{ $item->category == "Sweet Desert" ? 'selected' : '' }}>Sweet Desert</option>
                                                                        <option value="Dry Fish" {{ $item->category == "Dry Fish" ? 'selected' : '' }}>Dry Fish</option>
                                                                    </select>
                                                                </div><br><br>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="inputEmail1" class="col-md-2 control-label">Market Name</label>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" value="{{$item->market_name}}"  name="market_name">
                                                                </div>
                                                                <br><br>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="inputEmail1" class="col-md-2 control-label">Remark</label>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" value="{{$item->details}}"  name="details">
                                                                </div>
                                                                <br><br>
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
                                    @endforeach
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
            </div>
            <!-- END PAGE CONTENT-->
            <div id="basic" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">Add New Item</h4>
                        </div>
                        <br>
                        <form class="form-horizontal" role="form" method="post" action="{{route('supply-item.store')}}">
                            {{csrf_field()}}

                            <div class="form-group">
                                <label for="inputEmail1" class="col-md-2 control-label">Item Name</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" placeholder="Item Name" required name="name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail1" class="col-md-2 control-label">Category</label>
                                <div class="col-md-8">
                                    <select name="category" class="form-control" id="">
                                        <option value="">--Select--</option>
                                        <option value="Fish">Fish</option>
                                        <option value="Vegetable/Fruit">Vegetable/Fruit</option>
                                        <option value="Sweet Desert">Sweet Desert</option>
                                        <option value="Dry Fish">Dry Fish</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail1" class="col-md-2 control-label">Market Name</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" placeholder="Market Name" required name="market_name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail1" class="col-md-2 control-label">Grades</label>
                                <div class="col-md-8">
                                    <select name="grade_id" class="form-control" id="">
                                        <option value="">--Select--</option>
                                            @foreach ($grades as $item)
                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail1" class="col-md-7 control-label">Suggestions or topics you would like to be included:</label>
                                <div class="col-md-8">
                                    <div class="col-md-12 ">
                                        <input type="text" class="form-control" placeholder="Remark (Not Required)" name="details">
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                <button type="submit" class="btn blue-ebonyclay"><i class="fa fa-floppy-o"></i> Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    @section('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        $(document).ready(function () {
           
            
        });
    </script>

@endsection



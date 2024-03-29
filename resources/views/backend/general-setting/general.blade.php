@extends('backend.master')
@section('site-title')
    General Setting
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
            <h3 class="page-title bold">General Management
                <small> </small>
            </h3>
            <!-- END PAGE TITLE-->
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

            <!-- BEGIN PAGE CONTENT-->
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet box grey-mint">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-cogs"></i>Edit Settings
                            </div>
                            <div class="tools">
                            </div>
                        </div>

                        <div class="portlet-body form">

                            <!------------------------ BEGIN FORM---------------------->
                            <form method="POST" action="{{route('general.update', $general->id)}}" class="form-horizontal form-bordered" enctype="multipart/form-data">
                                {{csrf_field()}}
                                {{method_field('put')}}
                                <div class="form-body">

                                    <div class="form-group">
                                        <label class="control-label col-md-2">Website Logo</label>
                                        <div class="col-md-6">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
                                                    <img src="{{asset('assets/images/logo/'. $general->image)}}">
                                                </div>
                                                       <span class="btn default btn-file">
                                                       <span class="fileinput-new">
                                                       Change image </span>
                                                       <span class="fileinput-exists">
                                                       Change </span>
                                                       <input type="file" name="image">
                                                       </span>
                                                    <a href="#" class="btn red fileinput-exists" data-dismiss="fileinput">
                                                        Remove </a>
                                            </div>
                                            <div class="clearfix margin-top-10">
                                                        <span class="label label-danger">
                                                        NOTE! </span> Image Size must be 117px x 30px

                                            </div>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Website: <span class="required">
                                        * </span>
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="title" placeholder="Website Title" value="{{$general->title}}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Email: <span class="required">
                                            * </span>
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="email" placeholder="Email" value="{{$admin}}" >
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Mobile: <span class="required">
                                            * </span>
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="mobile" placeholder="Mobile" value="{{$general->mobile}}" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Name: <span class="required">  * </span></label>

                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="name" placeholder="Name" value="{{$general->name}}">
                                        </div>
                                    </div>



                                    {{-- <div class="form-group">
                                        <label class="control-label col-md-2">Currency</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="currency" placeholder="Currency" value="{{$general->currency}}">
                                        </div>
                                    </div> --}}

                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button type="submit" data-loading-text="Updating..." class="demo-loading-btn btn grey-mint col-md-12"><i class="fa fa-check"></i> Update</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
            </div><hr>     
            <div class="portlet-body form">
                <h3 class="page-title bold">Bank List
                    <small> Office-managment </small>
                    <a class="btn blue pull-right" data-toggle="modal" href="#basic">
                        Add New Bank Account
                        <i class="fa fa-plus"></i>
                    </a>
                </h3>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet box blue">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-briefcase"></i>Bank List
                                </div>
                                <div class="tools">
                                </div>
                            </div>
                            <div class="portlet-body">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>
                                            ID
                                        </th>
                                        <th>
                                            Bank Name
                                        </th>
                                        <th>
                                            Account Number
                                        </th>
                                        <th>
                                            Branch Name
                                        </th>
                                        <th>
                                            Branch Address
                                        </th>
                                        <th>
                                            Swift Code
                                        </th>
                                        <th>
                                            Action
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($bank as $key=> $data)
                                    <tr id="row1">
                                        <td>{{$key+1}}</td>
                                        <td> {{$data->bank_name}}</td>
                                        <td> {{$data->account_number}}</td>
                                        <td> {{$data->branch_name}}</td>
                                        <td> {{$data->branch_address}}</td>
                                        <td> {{$data->swift_code}}</td>
                                        <td>
                                            <a class="btn blue"  data-toggle="modal" href="{{route('edit.bank.account',$data->id)}}"><i class="fa fa-edit"></i> Edit</a>
                                            <a class="btn red" data-toggle="modal" href="#deleteModal{{$data->id}}"><i class="fa fa-trash"></i> Delete</a>
                                        </td>
                                    </tr>

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
                                                    <a type="submit" href="{{route('bank.acount.delete', $data->id)}}" class="btn red" id="delete"><i class="fa fa-trash"></i> Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    </tbody>
                                </table>
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
                                <h4 class="modal-title">Add New Bank Account</h4>
                            </div><br>
                            <form class="form-horizontal" role="form" method="post" action="{{route('bank.account.store')}}">
                                {{csrf_field()}}
    
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-md-2 control-label">Bank Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" placeholder="bank_name" required name="bank_name">
                                    </div>
                                </div>
    
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-md-2 control-label">Account Number</label>
                                    <div class="col-md-9">
                                        <input type="number" class="form-control" placeholder="account_number" required name="account_number">
                                    </div>
                                </div>
    
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-md-2 control-label">Branch Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" placeholder="branch_name" required name="branch_name">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail1" class="col-md-2 control-label">Branch Address</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" placeholder="branch_address" required name="branch_address">
                                    </div>
                                </div>
    
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-md-2 control-label">Swift Code</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" placeholder="swift_code" required name="swift_code">
                                    </div>
                                </div>
    
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                    <button type="submit" class="btn blue"><i class="fa fa-floppy-o"></i> Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
    </div>
@endsection

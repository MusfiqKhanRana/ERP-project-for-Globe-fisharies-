
@extends('backend.master')
@section('site-title')
Bonus Records
@endsection
@section('style')
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
@endsection
@section('main-content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <h3 class="page-title" class="portlet box dark">Employee Bonus Records
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
            <div class="portlet box blue-chambray">
                <div class="portlet-title">
                <div class="caption">
                <i class="fa fa-briefcase"></i>Employee Bonus List
                </div>
                    <div class="caption pull-right">
                        <a class="btn green-meadow pull-right" data-toggle="modal" href="#addModal">
                            Add New Records
                        <i class="fa fa-plus"></i> </a>
                    </div>
                    <div class="tools">
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-scrollable">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Serial</th>
                                <th>Bonus Id</th>
                                <th>Date</th>
                                <th>Department</th>
                                <th>Designation</th>
                                <th>Name</th>
                                <th>Amount</th>
                                <th>Bonus Category</th>
                                <th>Status</th>
                                <th>Remark</th>
                                <th style="text-align: center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($bonus as $key=> $data)
                                    <tr id="row1">
                                        @if ($data->status == "Approve" || $data->status == "Initial")
                                            <td>{{$loop->iteration}}</td>
                                            <td class="text-align: center;"> {{$data->bonus_code}}</td>
                                            <td class="text-align: center;"> {{$data->date}}</td>
                                            <td>{{$data->user->department->name}}</td>
                                            <td>{{$data->user->designation->deg_name}}</td>
                                            <td class="text-align: center;"> {{$data->user->name}}</td>
                                            <td class="text-align: center;"> {{$data->amount}}</td>
                                            <td class="text-align: center;"> {{$data->bonus_category}}</td>
                                            <td class="text-align: center;"> {{$data->status}}</td>
                                            <td class="text-align: center;"> {{$data->remark}}</td>
                                            <td style="text-align: center">
                                                @if ($data->status == "Initial")
                                                    {{-- <a class="btn btn-info editModal"  data-toggle="modal" data-id="{{$data->id}}" data-bonus_code="{{$data->bonus_code}}" data-date="{{$data->date}}" data-user_name="{{$data->user->name}}" data-amount="{{$data->amount}}" data-category="{{$data->bonus_category}}" data-remark="{{$data->remark}}" href="#editModal"><i class="fa fa-edit"></i> Edit</a> --}}
                                                    <a class="btn red" data-toggle="modal" href="#deleteModal{{$data->id}}"><i class="fa fa-trash"></i> Delete</a>
                                                    <a class="btn btn-success"  data-toggle="modal" href="#approve{{$data->id}}"><i class="fa fa-check"></i> Approve</a>
                                                    <a class="btn yellow" data-toggle="modal" href="#reject{{$data->id}}"><i class="fa fa-ban"></i> Reject</a>
                                                @endif
                                            </td>
                                        @endif
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
                                                <div class="modal-footer " >
                                                    <div class="d-flex justify-content-between">
                                                        <button type="button"data-dismiss="modal"  class="btn default">Cancel</button>
                                                    </div>
                                                    <div class="caption pull-right">
                                                        <form action="{{route('bonus.destroy',[$data->id])}}" method="POST">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button class="btn red" id="delete"><i class="fa fa-trash"></i>Delete</button>               
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div id="reject{{$data->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h4 class="modal-title" style="color: red"><b>Do you want to reject it?</b></h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="form-horizontal" role="form" method="post" action="{{route('bonus.reject', $data->id)}}">
                                                        {{csrf_field()}}
                                                        {{method_field('get')}}
                                                        <input type="hidden" value="" name="reject">
                                                        {{-- <div class="form-group">
                                                            <textarea style="margin-left: 10%" name="reject_message" id="" cols="40" rows="5" placeholder="Give a Reject Massage(Optional)"></textarea>
                                                        </div> --}}
                                                        <div class="modal-footer">
                                                            <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                            <button type="submit" class="btn red-flamingo"><i class="fa fa-check" aria-hidden="true"></i> Confirm</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="approve{{$data->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h4 class="modal-title" style="color: red"><b>Do you want to Approve it?</b></h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="form-horizontal" role="form" method="post" action="{{route('bonus.approve', $data->id)}}">
                                                        {{csrf_field()}}
                                                        {{method_field('get')}}
                                                        <input type="hidden" value="" name="approve">
                                                        {{-- <div class="form-group">
                                                            <textarea style="margin-left: 10%" name="single_cancel_massage" id="" cols="40" rows="5" placeholder="give a cancel Massage(Optional)"></textarea>
                                                        </div> --}}
                                                        <div class="modal-footer">
                                                            <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                            <button type="submit" class="btn red-flamingo"><i class="fa fa-check" aria-hidden="true"></i> Confirm</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- <div id="editModal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                        <h4 class="modal-title">Update Bonus</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-horizontal" role="form" method="post" action="{{route('bonus.update', $data->id)}}">
                                            {{csrf_field()}}
                                            {{method_field('put')}}
                                            <input type="hidden" id="edit" name="" value="">
                                            <div class="row">
                                                
                                                <div class="col-md-12">
                                                    <label for="inputEmail1" class="col-md-2 control-label">Date</label>
                                                    <input type="date" class="form-control" value="{{$data->date}}" required name="date">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="inputEmail1" class="col-md-2 control-label">Name</label>
                                                    <select class="form-control" name="user_id" required>
                                                        @foreach($users as $user)
                                                            <option value="{{$user->id}}" {{ $data->user->id == $user->id ? 'selected' : '' }}>{{$user->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="inputEmail1" class="col-md-2 control-label">Amount</label>
                                                    <input type="text" class="form-control" value="{{$data->amount}}" required name="amount" >
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="inputEmail1" class="col-md-2 control-label">Bonus Category</label>
                                                    <select class="form-control" name="bonus_category" required>
                                                        <option value="{{$data->bonus_category}}">{{$data->bonus_category}}</option>
                                                        <option value="Festival" >Festival</option>
                                                        <option value="Performance" >Performance</option>
                                                        <option value="Donation">Donation</option>
                                                        <option value="Other" >Other</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="inputEmail1" class="col-md-2 control-label">Remark</label>
                                                    <input type="text" class="form-control" value="{{$data->remark}}" name="remark">
                                                </div>
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
                    </div>
                </div>
                <div id="addModal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h4 class="modal-title">Add New Bonus Record</h4>
                            </div><br>
                            <form class="form-horizontal" role="form" method="post" action="{{route('bonus.store')}}">
                                {{csrf_field()}}
            
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-md-3 control-label">Disburse Date<span class="required">* </span></label>
                                    <div class="col-md-8">
                                        <input type="date" class="form-control" name="date" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Name<span class="required">* </span></label>
                                    <div class="col-md-8">
                                        <select class="form-control selectpicker" data-live-search="true" name="user_id" required>
                                            <option value="" selected>--select--</option>
                                            @foreach($users as $user)
                                                <option value="{{$user->id}}" >{{$user->name}} || {{$user->department->name}} || {{$user->designation->deg_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-md-3 control-label">Amount<span class="required">* </span></label>
                                    <div class="col-md-8">
                                        <input type="number" class="form-control" name="amount" placeholder="" required  >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-md-3 control-label">Bonus Category<span class="required">* </span></label>
                                    <div class="col-md-8">
                                        <select class="form-control" name="bonus_category" required>
                                            <option value="" selected>-- Select Bonus Category --</option>
                                            <option value="Festival" >Festival</option>
                                            <option value="Performance" >Performance</option>
                                            <option value="Donation">Donation</option>
                                            <option value="Other" >Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-md-3 control-label">Remark</label>
                                    <div class="col-md-8">
                                        <textarea type="text" class="form-control" name="remark" placeholder="Type Remark" ></textarea>
                                    </div>
                                </div>
                                    <input type="hidden" class="form-control" name="bonus_code">
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
    </div>
@endsection
@section('script')
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/i18n/defaults-*.min.js"></script>

<script type="text/javascript">
$(document).ready(function () {
    var category,bonus_code,date,user_name,amount,remark;
    $(".editModal").click(function(){
        
       $("#edit").val($(this).data('id'));
       category = $(this).val();
       bonus_code = $(this).val();
       date = $(this).val();
       user_name = $(this).val();
       remark = $(this).val();
       console.log($(this).data('user_name'));
    });
});
</script>

@endsection

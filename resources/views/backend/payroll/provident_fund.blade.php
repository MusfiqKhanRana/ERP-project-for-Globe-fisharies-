@extends('backend.master')
@section('site-title')
Provident Fund
@endsection
@section('style')
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
@endsection
@section('main-content')

<div class="page-content-wrapper">

    <div class="page-content">
        @if(Session::has('msg'))
        <script>
            $(document).ready(function(){
                swal("{{Session::get('msg')}}","", "success");
            });
        </script>
        @endif
        <h3 class="page-title">HR Management  <sub>  Payroll</sub>
            <div class="pull-right"><a class="btn grey-mint" data-toggle="modal" href="#addModal">
                    Add Provident Fund
                    <i class="fa fa-plus"></i> </a>
            </div>
        </h3>
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
        <hr>
        <div class="portlet box">
            <div class="portlet-body">
                <div class="portlet-body">
                    <div class="table-scrollable">
                        <table class="table table-striped table-bordered table-hover" id="order_table">
                            <thead>
                            <tr>
                                <th>S.l</th>
                                <th scope="col"> Package Name </th>
                                <th scope="col"> Amount (%) </th>
                                <th scope="col"> Duration (Months)</th>
                                <th scope="col"> Detention Duration (Months)</th>
                                <th scope="col"> Detention Amount (%)</th>
                                <th scope="col"> Fund Bonus (%) </th>
                                <th scope="col" style="text-align: center"> Action </th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($provi_fund as $key=> $item)
                                <tr>
                                    <td>{{++ $key}}</td>
                                    <td style="text-align: center">{{$item->package}}</td>
                                    <td style="text-align: center">{{$item->amount}}</td>
                                    <td style="text-align: center">{{$item->fund_duration}}</td>
                                    <td style="text-align: center">{{$item->fund_detention}}</td>
                                    <td style="text-align: center">{{$item->detention_amount}}</td>
                                    <td style="text-align: center">{{$item->completion_bonus}}</td>
                                    <td style="text-align: center">
                                        <a class="btn btn-info" data-toggle="modal" href="#EditModal{{$item->id}}">Edit</a>
                                        <a class="btn btn-info" href="{{route('provident-fund.show',\Crypt::encrypt($item->id))}}">View</a>
                                        <a class="btn btn-info enlist_employee" data-id="{{$item->id}}" data-instalment="{{$item->fund_duration}}" data-toggle="modal" href="#addUser">Enlist Employee</a>
                                        <a class="btn btn-danger" data-toggle="modal" href="#DeleteModal{{$item->id}}">Delete</a>
                                    </td>
                                </tr>
                                <div id="DeleteModal{{$item->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
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
                                                    <form action="{{route('provident-fund.destroy',[$item->id])}}" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="btn red"><i class="fa fa-trash"></i>Delete</button>               
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="EditModal{{$item->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                <h4 class="modal-title">Update Provident Fund</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form-horizontal" role="form" method="post" action="{{route('provident-fund.update', $item->id)}}">
                                                    {{csrf_field()}}
                                                    {{method_field('put')}}
                                                    
                                                    <div class="row" style="margin-left: 2%">
                                                        <div class="col-md-6">
                                                            <label for="">Package Name</label>
                                                            <input class="form-control" type="text" name="package" value="{{$item->package}}">
                                                        </div>
                                                        <div class="col-md-5">
                                                            <label for="">Fund Amount ( % )</label>
                                                            <input class="form-control" type="number" step="any" name="amount" value="{{$item->amount}}">
                                                        </div>
                                                    </div><br>
                                                    <div class="row" style="margin-left: 3%">
                                                        <div class="col-md-6">
                                                            <label for="">Fund Duration (Months)</label>
                                                            <input class="form-control" type="number" step="any" name="fund_duration" value="{{$item->fund_duration}}">
                                                        </div>
                                                        <div class="col-md-5">
                                                            <label for="">Fund Detention (Months)</label>
                                                            <input class="form-control" type="number" step="any" name="fund_detention" value="{{$item->fund_detention}}">
                                                        </div>
                                                    </div><br>
                                                    <div class="row" style="margin-left: 2%">
                                                        <div class="col-md-6">
                                                            <label for="">Detention Amount ( % )</label>
                                                            <input class="form-control" type="number" step="any" name="detention_amount" value="{{$item->detention_amount}}">
                                                        </div>
                                                        <div class="col-md-5">
                                                            <label for="">Fund Completion Bonus ( % )</label>
                                                            <input class="form-control" type="number" step="any" name="completion_bonus" value="{{$item->completion_bonus}}">
                                                        </div>
                                                    </div><br>
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
                <div id="addModal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h4 class="modal-title">Add Provident Fund</h4>
                            </div><br>
                            <form class="form-horizontal" role="form" method="post" action="{{route('provident-fund.store')}}">
                                {{csrf_field()}}
                                <div class="row" style="margin-left: 2%">
                                    <div class="col-md-6">
                                        <label class="control-label" for="">Package Name<span class="required">
                                            * </span></label>
                                        <input class="form-control" type="text" name="package" placeholder="Type Name of your package" required>
                                    </div>
                                    <div class="col-md-5">
                                        <label class="control-label" for="">Fund Amount ( % )<span class="required">
                                            * </span></label>
                                        <input class="form-control" type="number"  step="any" name="amount" placeholder="Type Provident Fund" required>
                                    </div>
                                </div><br>
                                <div class="row" style="margin-left: 3%">
                                    <div class="col-md-6">
                                        <label class="control-label" for="">Fund Duration (Months)<span class="required">
                                            * </span></label>
                                        <input class="form-control" type="number" step="any" name="fund_duration" placeholder="Type number of months" required>
                                    </div>
                                    <div class="col-md-5">
                                        <label class="control-label" for="">Fund Detention (Months)<span class="required">
                                            * </span></label>
                                        <input class="form-control" type="number" step="any" name="fund_detention" placeholder="Type Number of months" required>
                                    </div>
                                </div><br>
                                <div class="row" style="margin-left: 2%">
                                    <div class="col-md-6">
                                        <label class="control-label" for="">Detention Amount ( % )<span class="required">
                                            * </span></label>
                                        <input class="form-control" type="number" step="any" name="detention_amount" placeholder="Type Provident Detention Amount" required>
                                    </div>
                                    <div class="col-md-5">
                                        <label class="control-label" for="">Fund Completion Bonus ( % )<span class="required">
                                            * </span></label>
                                        <input class="form-control" type="number" step="any" name="completion_bonus" placeholder="Type Provident Bonus Amount" required>
                                    </div>
                                </div><br>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                    <button type="submit" class="btn btn-info"><i class="fa fa-floppy-o"></i> Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div id="addUser" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h4 class="modal-title">Enlist Employee</h4>
                            </div><br>
                            <form class="form-horizontal" role="form" method="post" action="{{route('provident-fund-user.store')}}">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Name<span class="required">* </span></label>
                                    <div class="col-md-8">
                                        <select class="form-control selectpicker" data-live-search="true" name="user_id" required>
                                            <option value="" selected>--select--</option>
                                            @foreach($users as $user)
                                                <option value="{{$user->id}}" >{{$user->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-md-3 control-label">Applied Month<span class="required">* </span></label>
                                    <div class="col-md-8">
                                        <input type="hidden" name="provident_fund_id" id="provident_fund_id" value="">
                                        <input type="hidden" name="instalment" id="instalment" value="">
                                        <div class="input-group input-medium date date-picker"  data-date-format="yyyy-mm" data-date-viewmode="years">
                                            <input type="text" class="form-control" name="applied_month" id="period_field"  readonly >
                                            <span class="input-group-btn">
                                                <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-md-3 control-label">Remark</label>
                                    <div class="col-md-8">
                                        <textarea type="text" class="form-control" name="remark" placeholder="Type Remark" ></textarea>
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
    </div>
</div>
@endsection
@section('script')
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/i18n/defaults-*.min.js"></script> --}}
<script>
    $(function() {
        $('.enlist_employee').click(function(){
            $('#provident_fund_id').val($(this).data('id'));
            $('#instalment').val($(this).data('instalment'));
        })
    });
</script>
@endsection

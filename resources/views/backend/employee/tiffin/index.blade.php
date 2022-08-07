@extends('backend.master')
@section('site-title')
   Employee Bill
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
            <h3 class="page-title bold form-inline">HR Management
                <small> Employee Bill </small>
                {{-- <div class="form-group" style="margin-left: 10%">
                    <i class="fa fa-search" aria-hidden="true"></i>
                </div> --}}
                <a class="btn blue-ebonyclay pull-right" data-toggle="modal" href="#basic">
                    Add New Bill
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
                                <i class="fa fa-briefcase"></i>Employee Bill
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
                                            sl
                                        </th>
                                        <th>
                                           Month
                                        </th>
                                        <th>
                                          Name
                                        </th>
                                        <th>
                                            Employee ID
                                        </th>
                                        <th>
                                          Designation
                                        </th>
                                        <th>
                                            Category
                                        </th>
                                        <th>
                                            Days
                                        </th>
                                        <th>
                                            Rate
                                        </th>
                                        <th>
                                            Taka
                                        </th>
                                        <th>
                                            Status
                                        </th>
                                        <th>
                                            Paid Date
                                        </th>
                                        <th>Remark</th>
                                        <th style="text-align: center">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($items as $key=>$item)
                                        <tr>
                                            <td>{{++$key}}</td>
                                            <td>{{$item->date}}</td>
                                            <td>{{$item->user->name}}</td>
                                            <td>{{$item->user->employee_id}}</td>
                                            <td>
                                                @if (isset($item->user->designation->deg_name))
                                                    {{$item->user->designation->deg_name}}
                                                @else
                                                    N/A
                                                @endif
                                            </td>
                                            <td>{{$item->category}}</td>
                                            <td>
                                                @if($item->days == 0)
                                                    <p class="label label-sm label-info">N/A</p>
                                                @else
                                                    <span class="label label-sm label-success">{{$item->days}}</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($item->rate == 0)
                                                    <p class="label label-sm label-info">N/A</p>
                                                @else
                                                    <span class="label label-sm label-success">{{$item->rate}}</span>
                                                @endif
                                            </td>
                                            <td>
                                            {{-- @php
                                                $x = $item->days; 
                                                $y = $item->rate; 
                                                $z=$x*$y; 
                                                echo $z,"  Tk";
                                            @endphp --}}
                                            {{$item->total}} TK
                                            </td>
                                            <td>
                                                @if($item->is_paid == 0)
                                                    <p class="label label-sm label-danger">Pending</p>
                                                @else
                                                    <span class="label label-sm label-success">Paid</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($item->paid_date == 0)
                                                    <p class="label label-sm label-primary">N/A</p>
                                                @else
                                                    <span class="label label-sm label-success">{{$item->paid_date}}</span>
                                                @endif</td>
                                            <td>{{$item->remark}}</td>
                                            <td style="text-align: center">
                                                @if($item->is_paid == 1)
                                                <p class="label label-sm label-info" disable></p>
                                                @else
                                                <a class="btn btn-success paid" data-id="{{$item->id}}"  data-toggle="modal" href="#paidModal"><i class="fa fa-trash"></i> Paid</a>
                                                @endif
                                                
                                                <a class="btn btn-info editbill" data-id="{{$item->id}}" data-category_edit="{{$item->category}}" data-remark="{{$item->remark}}" data-toggle="modal" href="{{route('bill.edit',$item->id)}}"><i class="fa fa-edit"></i> Edit</a>
                                                <a class="btn red" data-toggle="modal" href="#deleteModal{{$item->id}}"><i class="fa fa-trash"></i> Delete</a>
                                            </td>
                                        </tr>
                                        <div id="deleteModal{{$item->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
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
                                                            <form action="{{route('tiffin-bill.destroy',[$item])}}" method="POST">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button class="btn red"><i class="fa fa-trash"></i>Delete</button>               
                                                            </form>
                                                        </div>
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
                            <h4 class="modal-title">Add New Bill</h4>
                        </div>
                        <br>
                        <form class="form-horizontal" role="form" method="post" action="{{route('tiffin-bill.store')}}">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="inputEmail1" class="col-md-2 control-label">Disburse Date<span class="required">* </span></label>
                                <div class="col-md-9">
                                    <div class="input-group input-5 date date-picker" id="datepicker" data-date-format="MM-yyyy">
                                        <input  type="text" class="form-control" readonly="readonly" name="date" >    
                                        <span class="input-group-btn">
                                            <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                                        </span>      
                                    </div> 
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label"> Department<span class="required">* </span></label>
                                <div class="col-md-9">
                                    <select class="form-control " id="department" name="department_id">
                                        <option value="">--Select--</option>
                                        @foreach ($departments as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label"> Designation<span class="required">* </span></label>
                                <div class="col-md-9">
                                    <select  class="form-control" name="designation_id" id="designation">
                                        <option value="">--Select--</option>
                                        @foreach ($departments as $department)
                                            @foreach ($department->designation as $designation)
                                                <option value="{{$designation->id}}" class="{{$department->id}}">{{$designation->deg_name}}</option>
                                            @endforeach    
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label"> Name<span class="required">* </span></label>
                                <div class="col-md-9">
                                    <select  class="form-control" name="employee_id" id="name">
                                        <option value="null">--Select--</option>
                                        @foreach ($departments as $department)
                                            @foreach ($department->designation as $designation)
                                                @foreach ($designation->employee as $employee)
                                                    <option value="{{$employee->id}}" class="{{$designation->id}}">{{$employee->name}}</option>
                                                @endforeach
                                            @endforeach    
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail1" class="col-md-2 control-label">Category<span class="required">* </span></label>
                                <div class="col-md-9">
                                    <select class="form-control" id="categorychange" name="category">
                                        <option value="">--Select--</option>
                                        <option value="Tiffin">Tiffin Bill</option>
                                        <option value="Mobile">Mobile Bill</option>
                                        <option value="Transport">Transport Bill</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group day">
                                <label for="inputEmail1" class="col-md-2 control-label">Days</label>
                                <div class="col-md-9">
                                    <input type="number" class="form-control" id="tdays" name="days">
                                </div>
                            </div>
                            <div class="form-group price">
                                <label for="inputEmail1" class="col-md-2 control-label">Rate</label>
                                <div class="col-md-9">
                                    <input type="number" class="form-control" id="ratetk" name="rate">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail1" class="col-md-2 control-label">Taka<span class="required">* </span></label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control"  name="total" id="totaltk">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail1" class="col-md-2 control-label">Remark</label>
                                <div class="col-md-9">
                                    <textarea type="text" class="form-control"  name="remark"></textarea>
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
            <div id="paidModal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">Make Paid</h4>
                        </div><br>
                        <form class="form-horizontal" role="form" method="post" action="{{route('bill.paid')}}">
                            {{csrf_field()}}
                            {{method_field('put')}}
                            <input type="hidden" id="paid" name="id" value="">
                            {{-- <input type="hidden" name="is_paid" value=""> --}}
                            <div class="form-group">
                                <label for="inputEmail1" class="col-md-2 control-label">Date</label>
                                <div class="col-md-8">
                                    <input type="date" class="form-control date" name="paid_date" required>
                                </div>
                            </div><br><br>
                            <div class="modal-footer">
                                <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                <button type="submit" class="btn blue-ebonyclay confirm_btn"><i class="fa fa-floppy-o"></i> Save</button>
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-chained/1.0.1/jquery.chained.min.js" integrity="sha512-rcWQG55udn0NOSHKgu3DO5jb34nLcwC+iL1Qq6sq04Sj7uW27vmYENyvWm8I9oqtLoAE01KzcUO6THujRpi/Kg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $(".editbill").click(function(){
                $("#id").val($(this).data('id'));
                $("#category_edit").val($(this).data('category_edit'));
               
                    console.log($(this).data('id'));
                    $("#remark").val($(this).data('remark'));
                    $("#remark").html(remark);
                });
               
                $("#categorychange").change(function()
                    {
                        //console.log('category');
                    if($(this).val() == "Tiffin")
                    {
                    $(".price").show();
                    $(".day").show();
                    }
                    else
                    {
                    $(".price").hide();
                    $(".day").hide();
                    }
                    });

                $(".price").hide();
                $(".day").hide();

                    
                $(".paid").click(function(){
                $("#paid").val($(this).data('id'));
                    //console.log($(this).data('id'));
                });
                $("#designation").chained("#department");
                $("#name").chained("#designation");
                // var date = new Date();
                // var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
                // var end = new Date(date.getFullYear(), date.getMonth(), date.getDate());

                // $('#datepicker1').datepicker({
                // format: "dd/mm/yyyy",
                // todayHighlight: true,
                // startDate: today,
                // // endDate: end,
                // // autoclose: true
                // });
                // $('#datepicker1').val(moment(moment().toDate()).format('MM/DD/YYYY'));
                // });
                $("#datepicker").datepicker({
                    viewMode: 'years',
                    format: 'MM-yyyy'
                });
                $("#ratetk").keyup(function() {
                    // console.log();
                    $('#totaltk').val($(this).val()*$('#tdays').val());
                });
                console.log("this is ready");
            });
                                    
        </script>
@endsection
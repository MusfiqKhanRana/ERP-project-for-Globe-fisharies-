@extends('backend.master')
@section('site-title')
   Tiffin Bill
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
                <small> Employee Tiffin Bill </small>
                {{-- <div class="form-group" style="margin-left: 10%">
                    <i class="fa fa-search" aria-hidden="true"></i>
                </div> --}}
                <a class="btn blue-ebonyclay pull-right" data-toggle="modal" href="#basic">
                    Add New Tiffin Bill
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
                            <form class="form-horizontal" role="form" method="post" action="{{--route('tiffin-bill.update', $item->id)--}}">
                                {{csrf_field()}}
                                {{method_field('put')}}
                                {{-- <input type="hidden" id="id" name="id" value="">
                                <input type="hidden" id="category_edit" name="category" value="">
                                <input type="hidden" id="remark" name="remark" value=""> --}}
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-md-2 control-label">Date</label>
                                    <div class="col-md-9">
                                        <div class="input-group input-5 date date-picker" id="datepicker" data-date-format="MM-yyyy">
                                            <input  type="text" class="form-control" value="{{--$item->date--}}" readonly="readonly" name="date" >    
                                            <span class="input-group-btn">
                                                <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                                            </span>      
                                        </div> 
                                    </div><br><br>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label"> Name</label>
                                    <div class="col-md-9">
                                        <select class="form-control " id="employee_id" name="employee_id">
                                            <option value="{{--$item->user->id--}}">{{--$item->user->name--}}</option>
                                            
                                        </select>
                                    </div><br><br>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-md-2 control-label">Category</label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="category" id="category_edit" value=""><option value="">--Select--</option>
                                            <option value="Tiffin Bill"  >Tiffin Bill</option>
                                            <option value="Mobile Bill" >Mobile Bill</option>
                                            <option value="Transport Bill">Transport Bill</option>
                                        </select>
                                    </div><br><br>
                                </div>
                                <div class="form-group day">
                                    <label for="inputEmail1" class="col-md-2 control-label">Days</label>
                                    <div class="col-md-9">
                                        <input type="number" class="form-control" value="{{--$item->days--}}"  name="days">
                                    </div><br><br>
                                </div>
                                <div class="form-group price">
                                    <label for="inputEmail1" class="col-md-2 control-label">Rate</label>
                                    <div class="col-md-9">
                                        <input type="number" class="form-control" value="{{--$item->rate--}}"  name="rate">
                                    </div><br><br>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-md-2 control-label">Taka</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" value="{{--$item->total--}}" name="total" id="total">
                                    </div><br><br>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-md-2 control-label">Remark</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" value="{{$bill_edit->remark}}" name="remark"><span  id="remark"></span>
                                    </div><br><br>
                                </div><br>
                                <div class="modal-footer">
                                    <a type="button" data-dismiss="modal" href="{{route('tiffin-bill.index')}}" class="btn blue-chambray">Back</a>
                                    <button type="submit" class="btn red-flamingo"><i class="fa fa-floppy-o"></i> Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
            </div>
            <!-- END PAGE CONTENT-->
            
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
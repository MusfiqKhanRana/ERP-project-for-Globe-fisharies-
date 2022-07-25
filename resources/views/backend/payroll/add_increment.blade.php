@extends('backend.master')
@section('site-title')
Add Increment/Decrement
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
        <h3 class="page-title">HR Management  <sub>  Add Increment/Decrement</sub>
            <div class="pull-right"><a class="btn grey-mint" data-toggle="modal" href="#addModal">
                    Add Increment/Decrement
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
                                <th scope="col"> Employee Name </th>
                                <th scope="col"> Departmant </th>
                                <th scope="col"> Designation</th>
                                <th scope="col"> Increment/Decrement </th>
                                <th scope="col"> Amount </th>
                                <th scope="col" style="text-align: center"> Action </th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($increments as $key=> $item)
                                <tr>
                                    {{-- @php
                                        dd($item);
                                    @endphp --}}
                                    <td>{{++ $key}}</td>
                                    <td>{{$item->user->name}}</td>
                                    <td>{{$item->department->name}}</td>
                                    <td>{{$item->designation->deg_name}}</td>
                                    <td>{{$item->type}}</td>
                                    <td>{{$item->increment_amount}}</td>
                                    <td>
                                        <a class="btn btn-info" data-toggle="modal" href="#EditModal{{$item->id}}">Edit</a>
                                        <a class="btn btn-danger" data-toggle="modal" href="DeleteModal{{$item->id}}">Delete</a>
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
                                                    <form action="{{route('increment.destroy',[$item->id])}}" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="btn red" id="delete"><i class="fa fa-trash"></i>Delete</button>               
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
                                                <h4 class="modal-title">Update Increment/Decrement</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form-horizontal" role="form" method="post" action="{{route('increment.update', $item->id)}}">
                                                    {{csrf_field()}}
                                                    {{method_field('put')}}
                                                    {{-- <div class="form-group">
                                                        <label for="inputEmail1" class="col-md-2 control-label">Name</label>
                                                        <div class="col-md-10">
                                                            <input type="text" class="form-control" value="{{$item->user->name}}" required name="user_id">
                                                        </div><br><br>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail1" class="col-md-2 control-label">Departmant</label>
                                                        <div class="col-md-10">
                                                            <input type="text" class="form-control" value="{{$item->department->name}}" required name="department_id">
                                                        </div><br><br>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail1" class="col-md-2 control-label">Designation</label>
                                                        <div class="col-md-10">
                                                            <input type="text" class="form-control" value="{{$item->designation->deg_name}}" required name="designation_id">
                                                        </div><br><br>
                                                    </div> --}}
                                                    <div class="form-group">
                                                        <label for="inputEmail1" class="col-md-2 control-label">Type</label>
                                                        <div class="col-md-10">
                                                            <select name="type" id="" class="form-control">
                                                                <option value="Increment" >Increment</option>
                                                                <option value="Decrement">Decrement</option>
                                                            </select>
                                                            
                                                            {{-- <label for="increnment">Incerment <input type="radio" name="type" value="increment"></label>
                                                            
                                                            <label for="decrement">Decrement <input type="radio" name="type" value="decrement"></label><br> --}}
                                                        </div>
                                                    </div><br><br>
                                                    <div class="form-group">
                                                        <label for="inputEmail1" class="col-md-2 control-label">Amount</label>
                                                        <div class="col-md-10">
                                                            <input type="text" class="form-control" value="{{$item->increment_amount}}" required name="increment_amount">
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
                                <h4 class="modal-title">Add Increment/Decrement</h4>
                            </div><br>
                            <form class="form-horizontal" role="form" method="post" action="{{route('increment.store')}}">
                                {{csrf_field()}}
                                <div class="row" style="margin-left: 2%">
                                    <div class="col-md-4" >
                                        <label class="col-md-1 control-label">Department<span class="required">* </span></label>
                                        <select class="form-control " id="department" name="department_id" required>
                                            <option value="">--Select--</option>
                                            @foreach ($departments as $item)
                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-md-1 control-label">Designation<span class="required">* </span></label>
                                        <select  class="form-control" name="designation_id" id="designation" required>
                                            <option value="">--Select--</option>
                                            @foreach ($departments as $department)
                                                @foreach ($department->designation as $designation)
                                                    <option value="{{$designation->id}}" class="{{$department->id}}">{{$designation->deg_name}}</option>
                                                @endforeach    
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="col-md-1 control-label">Name<span class="required">* </span></label>
                                        <select  class="form-control user_salary" name="user_id" id="user_id" required>
                                            <option value="">--Select--</option>
                                            
                                            @foreach ($departments as $department)
                                                @foreach ($department->designation as $designation)
                                                    @foreach ($designation->employee as $employee)
                                                    @php
                                                        $increment_amount=0;
                                                      foreach ($employee->increments as $key => $value) {
                                                        $increment_amount+= $value->amount;
                                                      }
                                                    @endphp
                                                        <option value="{{$employee->id}}" class="{{$designation->id}}" data-salary="{{$employee->basic + $employee->medical_allowance + $employee->house_rent +$increment_amount}}">{{$employee->name}}</option>
                                                    @endforeach
                                                @endforeach    
                                            @endforeach
                                        </select>
                                    </div>
                                </div><br>
                                <div class="row" style="margin-left: 3%">
                                    <div class="col-md-4">
                                        <label class="col-md-10 control-label" for="">Applied From<span class="required">* </span></label>
                                        <input class="form-control" type="date" name="date" required>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="col-md-1 control-label" for="">Type<span class="required">* </span></label><br>
                                        <label>
                                            <input type="radio" class="form-control increment" name="type" value="Increment" checked > Incerment
                                        </label>
                                        <label>
                                            <input type="radio" class="form-control decrement" name="type" value="Decrement" > Decrement
                                        </label>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-md-1 control-label" for=""> Amount<span class="required">* </span></label>
                                        <input class="form-control amount" type="number" value="" name="increment_amount" required>
                                    </div>
                                    
                                </div><br>
                                <div class="row" style="margin-left: 2%">
                                    <div class="col-md-4">
                                        <label for=""><b>Previous Salary: <span id="salary"></span> </b></label>
                                    </div>
                                    <div class="col-md-4">
                                        <label for=""><b>Total Salary: <span id="total_amount" value=></span></b></label>
                                    </div>
                                    {{-- <div class="col-md-4">
                                        <Button class="btn btn-success">Submit</Button>
                                    </div> --}}
                                </div><br>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-chained/1.0.1/jquery.chained.min.js" integrity="sha512-rcWQG55udn0NOSHKgu3DO5jb34nLcwC+iL1Qq6sq04Sj7uW27vmYENyvWm8I9oqtLoAE01KzcUO6THujRpi/Kg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $(function() {
        $("#designation").chained("#department");
        $("#user_id").chained("#designation");
    });
    var salary = 0;
    var type = $('.increment').val();
    $(".user_salary").change(function() {
        salary= parseInt($(this).find(':selected').attr('data-salary'));
        $("#salary").html(salary);
            
    });
    $('input[type=radio][name=type]').change(function() {
        if (this.value == 'Increment') {
            type = "Increment"
            total = parseInt(salary) + parseInt($(".amount").val());
            $("#total_amount").html(total);  
        }
        else if (this.value == 'Decrement') {
            type = "Decrement"
            total = parseInt(salary) - parseInt($(".amount").val());
            $("#total_amount").html(total);
        }
    });
   
    $('.amount').on("keyup , change",function() {
        //var amount = parseInt($(this).val());
        var amount = $(this).val();
        var total = '';
        if (type=="Increment") {
            total = parseInt(salary) + parseInt(amount);
        }else{
            total = parseInt(salary) - parseInt(amount);
        }
        $("#total_amount").html(total);
    });

    // if ($('input[name=type]:checked', '.decrement'))
    // $('.amount').on("keyup , change",function() {
    //     //var amount = parseInt($(this).val());
    //     var amount = $(this).val();
    //     var total = parseInt(salary) - parseInt(amount);
    //     console.log(total);
    //     $("#total_amount").html(total);
    // });
    // $('#amount').on("keyup",function() {
    //         var amount = parseInt($(this).val());
    //         if (type == increment) {
               
    //         }
    //         if (type == decrement) {
            
    //         }
           
    //     });
</script>
      
@endsection

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
                                        <label>Department</label>
                                                <select class="form-control " id="department" name="department_id">
                                                    <option value="">--Select--</option>
                                                    @foreach ($departments as $item)
                                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                                    @endforeach
                                                </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Designation</label>
                                            <select  class="form-control" name="designation_id" id="designation">
                                                <option value="">--Select--</option>
                                                @foreach ($departments as $department)
                                                    @foreach ($department->designation as $designation)
                                                        <option value="{{$designation->id}}" class="{{$department->id}}">{{$designation->deg_name}}</option>
                                                    @endforeach    
                                                @endforeach
                                            </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="col-md-1 control-label">Name</label>
                                        <select  class="form-control " name="user_id" id="user_id">
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
                                </div><br>
                                <div class="row" style="margin-left: 3%">
                                    <div class="col-md-4">
                                        <label for="">Applied From</label>
                                        <input class="form-control" type="date" name="date">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Increment Amount</label>
                                        <input class="form-control" type="number" name="increment_amount">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Type</label><br>
                                        <label>
                                            <input type="radio" class="form-control" name="type" value="Increment" checked> Incerment
                                        </label>
                                        <label>
                                            <input type="radio" class="form-control" name="type" value="Decrement"> Decrement
                                        </label>
                                    </div>
                                </div><br>
                                <div class="row" style="margin-left: 2%">
                                    <div class="col-md-4">
                                        <label for=""><b>Previous Salary:</b></label>
                                    </div>
                                    <div class="col-md-4">
                                        <label for=""><b>Total Salary:</b></label>
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
    function myFunction() {
      var coffee = document.forms[0];
      var txt = "";
      var i;
      for (i = 0; i < coffee.length; i++) {
        if (coffee[i].checked) {
          txt = txt + coffee[i].value + " ";
        }
      }
      document.getElementById("order").value = "You ordered a coffee with: " + txt;
    }
    </script>
    <script>
        $(function() {
            $("#designation").chained("#department");
            $("#user_id").chained("#designation");
        });
      </script>
      <script>
          $(".user_salary").change(function() {
            alert( this.value );
                // var id = $(this).val();
                // $.ajax({
                //     type:"POST",
                //     url:"{{route('order.addproduct.pass')}}",
                //     data:{
                //         'id' : id,
                //         '_token' : $('input[name=_token]').val()
                //     },
                //     success:function(data){
                //         // console.log(data);
                //         $('.add_product').html("");
                //         $('.add_product').append(data.output);
                //     }
                // });
            });
      </script>
      
@endsection

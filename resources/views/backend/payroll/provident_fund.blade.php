@extends('backend.master')
@section('site-title')
Provident Fund
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
                                <th scope="col"> Duration</th>
                                <th scope="col"> Detention Duration</th>
                                <th scope="col"> Detention Amount </th>
                                <th scope="col"> Fund Bonus </th>
                                <th scope="col" style="text-align: center"> Action </th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($provi_fund as $key=> $item)
                                <tr>
                                    {{-- @php
                                        dd($item);
                                    @endphp --}}
                                    <td>{{++ $key}}</td>
                                    <td>{{$item->package}}</td>
                                    <td>{{$item->amount}}</td>
                                    <td>{{$item->fund_duration}}</td>
                                    <td>{{$item->fund_detention}}</td>
                                    <td>{{$item->detention_amount}}</td>
                                    <td>{{$item->completion_bonus}}</td>
                                    <td>
                                        <a class="btn btn-info" data-toggle="modal" href="#EditModal{{$item->id}}">Edit</a>
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
                                                <h4 class="modal-title">Update Provident Fund</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form-horizontal" role="form" method="post" action="{{route('provident-fund.update', $item->id)}}">
                                                    {{csrf_field()}}
                                                    {{method_field('put')}}
                                                    
                                                    <div class="row" style="margin-left: 2%">
                                                        <div class="col-md-6">
                                                            <label for="">Provident Fund Package</label>
                                                            <input class="form-control" type="text" name="package" value="{{$item->package}}">
                                                        </div>
                                                        <div class="col-md-5">
                                                            <label for="">Provident Fund Amount ( % )</label>
                                                            <input class="form-control" type="number" step="any" name="amount" value="{{$item->amount}}">
                                                        </div>
                                                    </div><br>
                                                    <div class="row" style="margin-left: 3%">
                                                        <div class="col-md-6">
                                                            <label for="">Provident Fund Duration</label>
                                                            <input class="form-control" type="number" step="any" name="fund_duration" value="{{$item->fund_duration}}">
                                                        </div>
                                                        <div class="col-md-5">
                                                            <label for="">Provident Fund Detention </label>
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
                                        <label for="">Provident Fund Package</label>
                                        <input class="form-control" type="text" name="package" placeholder="Type Name of your package" required>
                                    </div>
                                    <div class="col-md-5">
                                        <label for="">Provident Fund Amount ( % )</label>
                                        <input class="form-control" type="number"  step="any" name="amount" placeholder="Type Provident Fund" required>
                                    </div>
                                </div><br>
                                <div class="row" style="margin-left: 3%">
                                    <div class="col-md-6">
                                        <label for="">Provident Fund Duration</label>
                                        <input class="form-control" type="number" step="any" name="fund_duration" placeholder="Type number of months" required>
                                    </div>
                                    <div class="col-md-5">
                                        <label for="">Provident Fund Detention </label>
                                        <input class="form-control" type="number" step="any" name="fund_detention" placeholder="Type Number of months" required>
                                    </div>
                                </div><br>
                                <div class="row" style="margin-left: 2%">
                                    <div class="col-md-6">
                                        <label for="">Detention Amount ( % )</label>
                                        <input class="form-control" type="number" step="any" name="detention_amount" placeholder="Type Provident Detention Amount" required>
                                    </div>
                                    <div class="col-md-5">
                                        <label for="">Fund Completion Bonus ( % )</label>
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

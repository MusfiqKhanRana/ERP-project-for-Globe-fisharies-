@extends('backend.master')
@section('site-title')
    Customer
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
            <h3 class="page-title bold form-inline">Customer
                <small> Customer-managment </small>
                <div class="form-group" style="margin-left: 10%">
                    <i class="fa fa-search" aria-hidden="true"></i>
                    <input type="text" name="search" id="search" class="form-control" placeholder="Search for Customer" />
                </div>
                <a class="btn blue-ebonyclay pull-right" data-toggle="modal" href="#basic">
                    Add Customer
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
                                            <i class="fa fa-briefcase"></i>Customer List
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
                                                    ID
                                                </th>
                                                <th>
                                                    Full Name
                                                </th>
                                                <th>
                                                    Contact
                                                </th>
                                                <th>
                                                    Email
                                                </th>
                                                <th>
                                                    Location
                                                </th>
                                                <th>
                                                    Detail
                                                </th>
                                                <th>
                                                    Action
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            {{-- @foreach($customer as $key=> $data)
                                            <tr id="row1">
                                                <td>{{$key+1}}</td>
                                                <td> {{$data->full_name}}</td>
                                                <td> {{$data->phone}}</td>
                                                <td> {{$data->email}}</td>
                                                <td> {{$data->address}}</td>
                                                <td>{{$data->include_word}}</td>
                                                <td>
                                                    <a class="btn blue-chambray"  data-toggle="modal" href="{{route('customer.detail.edit',$data->id)}}"><i class="fa fa-edit"></i> Edit</a>
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
                                                            <a type="submit" href="{{route('customer.delete', $data->id)}}" class="btn red" id="delete"><i class="fa fa-trash"></i> Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach --}}
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
                            <h4 class="modal-title">Add New Customer</h4>
                        </div>
                        <form class="form-horizontal" role="form" method="post" action="{{route('customer.detail.store')}}">
                            {{csrf_field()}}

                            <div class="form-group">
                                <label for="inputEmail1" class="col-md-2 control-label">Full Name</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" placeholder="Customer Name" required name="full_name">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail1" class="col-md-2 control-label">Designation</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" placeholder="Customer Name" name="designation">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail1" class="col-md-2 control-label">Phone</label>
                                <div class="col-md-8">
                                    <input type="number" class="form-control" placeholder="Customer Phone" required name="phone">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail1" class="col-md-2 control-label">Email</label>
                                <div class="col-md-8">
                                    <input type="email" class="form-control" placeholder="Customer Email" required name="email">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail1" class="col-md-2 control-label">Address</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" placeholder="Customer Address" name="address">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail1" class="col-md-2 control-label">Area ID</label>
                                <div class="col-md-8">
                                        <select class="custom-select form-control mr-sm-2" name="area_id" id="inlineFormCustomSelect">
                                          <option selected>Choose...</option>
                                          @foreach ($area as $item)
                                          <option value="{{$item->id}}">{{$item->name}}</option>    
                                          @endforeach
                                        </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail1" class="col-md-2 control-label">Customer Type</label>
                                <div class="col-md-8">
                                    <div class="form-check form-check-inline">
                                        <label class="radio-inline">
                                            <input type="radio" value="inhouse" name="customer_type" checked>Inhouse
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" value="online" name="customer_type">Online
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" value="modern_trade" name="customer_type">Modern Trade
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" value="sample" name="customer_type">Sample
                                        </label>
                                      </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail1" class="col-md-7 control-label">Suggestions or topics you would like to be included:</label>
                                <div class="col-md-12">
                                    <div class="col-md-12 ">
                                        <input type="text" class="form-control" placeholder="Your Text (Not Required)" name="include_word">
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
           
            fetch_customer_data();
            
            function fetch_customer_data(query = '')
            {
                $.ajax({
                    url:"{{ route('customer.search') }}",
                    method:'GET',
                    data:{query:query},
                    dataType:'json',
                    success:function(data)
                    {
                        $('tbody').html(data.table_data);
                        $('#total_records').text(data.total_data);
                    }
                })
            }

            $(document).on('keyup', '#search', function(){
                var query = $(this).val();
                fetch_customer_data(query);
            });
            $(document).on('click','.test_id',function(){
                var id = $(this).attr("data-id");
                Swal.fire({
                    title: 'Warning!',
                    text: 'Do you want to delete?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, send me there!'
                }).then(function(result) {
                    if (result.value){
                        $.ajax({
                            url: "/admin/customer/delete/"+id,
                            method: "get",
                            success: function (response) {
                                // window.location.reload();
                                fetch_customer_data()
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Your data deleted',
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                            }
                        });
                    }
                    else{
                        console.log('no');
                    }
                });
            })
        });
    </script>

@endsection



@extends('backend.master')
@section('site-title')
  Export Management
@endsection 
@section('main-content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <h3 class="page-title bold form-inline" class="portlet box dark">Export Management  <small>Sale Contract List</small>
            {{-- <button type="button" class="btn dark pull-right " >Create Report <i class= 'fa fa-plus'> </i> </button> --}}
           
        </h3>
            <hr>
                @if(Session::has('msg'))
                    <script>
                        $(document).ready(function(){
                            swal("{{Session::get('msg')}}","", "success");
                        });
                    </script>
                @endif
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
                <a class="btn btn-danger" href=""><i class="fa fa-spinner"></i> Pending List </a>
                <a class="btn btn-success" href=""><i class="fa fa-check"></i> Approve List</a><br><br>
                <!-- END PAGE TITLE-->
                <div class="portlet box blue">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-globe"></i>Sale Contract List</div>
                        <div class="tools"> </div>
                    </div>
                        <div class="portlet-body">
                            <div class="table-scrollable">
                                <table class="table table-bordered " style="overflow: scroll;">
                                    <thead>
                                        <tr>
                                            <th>Sl.</th>
                                            <th>Buyer Details</th>
                                            <th>Shipment Details</th>
                                            <th>Order Details</th>
                                            <th>Payment Details</th>
                                            <th style="text-align: center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <tr>
                                            <td>1</td>
                                            <td>Lorem, ipsum dolor sit amet <br> consectetur adipisicing elit. Sunt, dolores?</td>
                                            <td>Lorem ipsum, dolor sit amet <br>consectetur adipisicing elit. Esse, adipisci.</td>
                                            <td>
                                                <table class="table table-bordered " style="overflow: scroll;">
                                                    <thead>
                                                        <tr>
                                                            <th>Sl.</th>
                                                            <th>HS Code</th>
                                                            <th style="text-align: center">Type</th>
                                                            <th>Item</th>
                                                            <th>Variant</th>
                                                            <th>Grade</th>
                                                            <th>Scientific Name</th>
                                                            <th>Quantity / Master Carton</th>
                                                            <th>Pack Size</th>
                                                            <th>Rate Per KG CFR (USD $)</th>
                                                            <th>Rate per Master Carton CRF(USD $)</th>
                                                            <th>Total Amount (USD $)</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>111222</td>
                                                            <td>IQF</td>
                                                            <td>Pangus</td>
                                                            <td>Gutted Clean</td>
                                                            <td>1 KG Up</td>
                                                            <td>Pangasius Hypophtalmus</td>
                                                            <td>650</td>
                                                            <td>20 KG x 1</td>
                                                            <td>1.00</td>
                                                            <td>20.00</td>
                                                            <td>13000.00</td>
                                                            <td>
                                                                <button class="btn btn-info"  data-toggle="modal" href="#editkModal">Edit</button>
                                                                <button class="btn btn-danger"  data-toggle="modal" href="#deleteModal">Delete</button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td>Lorem ipsum dolor sit amet <br>consectetur adipisicing elit. Delectus, et.</td>
                                            <td>
                                                <button class="btn btn-success" data-toggle="modal" href="#ApproveModal">Approve</button>
                                                <button class="btn btn-info" data-toggle="modal" href="#editSaleContractModal">Edit</button>
                                                <a class="btn red-flamingo" href="{{route('print_sale_contract')}}">print</a>
                                                <button class="btn blue" data-toggle="modal" href="#AddItemModal">+  Add Item</button>
                                                <button class="btn btn-danger"  data-toggle="modal" href="#deleteallModal">Delete</button>
                                            </td>
                                       </tr>
                                    </tbody>
                                </table>
                                <div id="deleteallModal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
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
                                                    <form action="{{--route('',[$data->id])--}}" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="btn red" id="delete"><i class="fa fa-trash"></i>Delete</button>               
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="deleteModal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
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
                                                    <form action="{{--route('',[$data->id])--}}" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="btn red" id="delete"><i class="fa fa-trash"></i>Delete</button>               
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="editkModal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                <h4 class="modal-title">Update Order Details</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form-horizontal" role="form" method="post" action="">
                                                    {{csrf_field()}}
                                                    {{method_field('put')}}
                                                    <div class="form-group">
                                                        <label for="inputEmail1" class="col-md-2 control-label">HS Code</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" value="" required name="name">
                                                        </div><br><br>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail1" class="col-md-2 control-label">Description of Good</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" value="" required name="test">
                                                        </div><br><br>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail1" class="col-md-2 control-label">Scientific Name</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" value="" required name="name">
                                                        </div><br><br>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail1" class="col-md-2 control-label">Quantity/Master Carton</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" value="" required name="test">
                                                        </div><br><br>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail1" class="col-md-2 control-label">Rate Per KG CRF(USD $)</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" value="" required name="name">
                                                        </div><br><br>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail1" class="col-md-2 control-label">Rate per Master Carton CRF(USD $)</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" value="" required name="test">
                                                        </div><br><br>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail1" class="col-md-2 control-label">Total Amount(USD $)</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" value="" required name="name">
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
                                <div id="ApproveModal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                <h4 class="modal-title">Doyou want to approve it?</h4>
                                            </div>
                                            <div >
                                                <form class="form-horizontal" role="form" method="post" action="#">
                                                    {{csrf_field()}}
                                                    <div class="modal-footer">
                                                        <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                        <button type="submit" class="btn red-flamingo"><i class="fa fa-floppy-o"></i> Approve</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="ApproveModal1" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                    {{csrf_field()}}
                                    <input type="hidden" value="" id="">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                <h2 class="modal-title" style="color: rgb(15, 17, 17);">Are you Want to Approve it?</h2>
                                            </div>
                                            <div class="modal-footer " >
                                                <div class="d-flex justify-content-between">
                                                    <button type="button"data-dismiss="modal"  class="btn default">Cancel</button>
                                                </div>
                                                <div class="caption pull-right">
                                                    <form action="{{--route('',[$data->id])--}}" method="POST">
                                                        @method('PUT')
                                                        @csrf
                                                        <button class="btn btn-success" id="approve"><i class="fa fa-check"></i>Approve</button>               
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="AddItemModal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                <h4 class="modal-title">Update Order Details</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form-horizontal" role="form" method="post" action="">
                                                    {{csrf_field()}}
                                                    {{method_field('put')}}
                                                    <div class="form-group">
                                                        <label for="inputEmail1" class="col-md-2 control-label">HS Code</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" value="" required name="name">
                                                        </div><br><br>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail1" class="col-md-2 control-label">Description of Good</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" value="" required name="test">
                                                        </div><br><br>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail1" class="col-md-2 control-label">Scientific Name</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" value="" required name="name">
                                                        </div><br><br>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail1" class="col-md-2 control-label">Quantity/Master Carton</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" value="" required name="test">
                                                        </div><br><br>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail1" class="col-md-2 control-label">Rate Per KG CRF(USD $)</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" value="" required name="name">
                                                        </div><br><br>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail1" class="col-md-2 control-label">Rate per Master Carton CRF(USD $)</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" value="" required name="test">
                                                        </div><br><br>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail1" class="col-md-2 control-label">Total Amount(USD $)</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" value="" required name="name">
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
                                <div id="editSaleContractModal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                <h4 class="modal-title">Update Sale Contract List</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form-horizontal" role="form" method="post" action="">
                                                    {{csrf_field()}}
                                                    {{method_field('put')}}
                                                    <div class="form-group">
                                                        <label for="inputEmail1" class="col-md-2 control-label">Buyer Details	</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" value="" required name="name">
                                                        </div><br><br>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail1" class="col-md-2 control-label">Shipment Details	</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" value="" required name="test">
                                                        </div><br><br>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail1" class="col-md-2 control-label">Payment Details</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" value="" required name="name">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')

<script src="https://cdn.tiny.cloud/1/uzb665mrkwi59olq2qu3cwqqyebsil4hznmwc45qu4exf7lt/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>	

 <script type="text/javascript">
    $(function () {
      
        var table = $('.yajra-datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('medical.report.list') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},
                {data: 'date', name: 'date'},
                {data: 'name', name: 'user.name'},
                {data: 'b_date', name: 'user.b_date', orderable: false, searchable: false},
                // {data: 'designation', name: 'designation'},
                
                {data: 'complain', name: 'complain'},
                {data: 'dressing', name: 'dressing'},
                {data: 'medicine_details', name: 'medicine_details', orderable: false, searchable: false },
                {
                    data: 'action', 
                    name: 'action', 
                    orderable: true, 
                    searchable: true
                },
            ]
        });
        
    $('.yajra-datatable').on('click', '.edit_report', function(){
            x = $(this).attr("data-medical_report");
            $("#complain").val($(this).attr("data-complain"));
            $("#dressing").val($(this).attr("data-dressing"));
            $("#medicine_details").val($(this).attr("data-medicine_details"));
            $("#medical_report").val(x);
            $("#medical_id").val($(this).attr("data-id"));
        });
        $('.yajra-datatable').on('click', '.delete_report', function(){

            $("#del_report").val($(this).attr("data-id"));
        });
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(".btn_submit").click(function(e){
                var id =  $("#medical_id").val();
                console.log(id);
                $.ajax({
                    type:'POST',
                    url:"/admin/medical_report/"+id,
                    data:jQuery('#frm').serialize(),
                    success:function(data){
                        // console.log(data);
                        $('#editModal').modal('hide');
                        Swal.fire({
                                    position: 'center',
                                    icon: 'success',
                                    title: data,
                                    showConfirmButton: false,
                                    timer: 1500
                        })
                        table.draw();
                    }
                });

            });
            $(".confirm_delete").click(function(e){
                var id =  $("#del_report").val();
                // console.log(id);
                $.ajax({
                    type:'POST',
                    url:"/admin/medical_report/"+id,
                    data:{"_method":"DELETE","id":id},
                    success:function(data){
                        // alert(data.success);
                        $('#deleteModal').modal('hide');
                        Swal.fire({
                                    position: 'center',
                                    icon: 'success',
                                    title: data,
                                    showConfirmButton: false,
                                    timer: 1500
                        })
                        table.draw();
                    }
                });

            });
    });
</script>
<script type="text/javascript">
    $(function() {
        tinymce.init({
            var myContent = tinymce.get("textarea").getContent({ format: "text" });
            selector: 'textarea',
            // init_instance_callback : function(editor) {
            //     var freeTiny = document.querySelector('.tox .tox-notification--in');
            //     freeTiny.style.display = 'none';
            // }
            
        });
    });
    
  </script>
    
@endsection

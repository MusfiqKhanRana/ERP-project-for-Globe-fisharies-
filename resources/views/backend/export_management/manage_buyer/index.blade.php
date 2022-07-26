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
            <h3 class="page-title bold form-inline" class="portlet box dark">Export Management
            {{-- <button type="button" class="btn dark pull-right " >Create Report <i class= 'fa fa-plus'> </i> </button> --}}
            <a class="btn btn-primary pull-right" href="{{route('export-buyer.create')}}">
                Add New Buyer
                <i class="fa fa-plus"></i>
            </a>
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
                <!-- END PAGE TITLE-->
                <div class="portlet box blue">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-globe"></i>Manage Buyer</div>
                        <div class="tools"> </div>
                    </div>
                        <div class="portlet-body">
                            <div class="table-scrollable">
                                <table class="table table-bordered " style="overflow: scroll;">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center">Bayer Details</th>
                                            <th style="text-align: center">Consignee Details</th>
                                            <th style="text-align: center">Notify Party Details</th>
                                            <th style="text-align: center">Importer Bank Details</th>
                                            <th style="text-align: center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($export_details as $export_detail)
                                            <tr>
                                                <td><ul><li>Buyer Code: {{$export_detail->buyer_code}}</li><li>Buyer name: {{$export_detail->buyer_name}}</li><li>Address: {{$export_detail->buyer_address}}</li><li>Contact Number: {{$export_detail->buyer_contact_number}}</li><li>Email: {{$export_detail->buyer_email}}</li><li>Country: {{$export_detail->buyer_country}}</li></ul></td>
                                                <td><ul><li>Name: {{$export_detail->consignee_name}}</li><li>Address: {{$export_detail->consignee_address}}</li><li>Contact Number: {{$export_detail->consignee_contact_number}}</li><li>Email: {{$export_detail->consignee_email}}</li><li>Country: {{$export_detail->consignee_country}}</li></ul></td>
                                                <td><ul><li>Party Name: {{$export_detail->notify_party_name}}</li><li>Address: {{$export_detail->notify_party_address}}</li><li>Contact Number: {{$export_detail->notify_party_contact}}</li><li>Email: {{$export_detail->notify_party_email}}</li><li>Country: {{$export_detail->notify_party_country}}</li></ul></td>
                                                <td>
                                                    <table class="table table-bordered " style="overflow: scroll;">
                                                        <thead>
                                                            <tr>
                                                                <th>S.l</th>
                                                                <th>Bank Name</th>
                                                                <th>Account Name</th>
                                                                <th>Account no.</th>
                                                                <th>Branch</th>
                                                                <th>Country</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($export_detail->bank_details as $key=>$bank_detail)
                                                                <tr>
                                                                    <td>{{++$key}}</td>
                                                                    <td>{{$bank_detail->bank_name}}</td>
                                                                    <td>{{$bank_detail->a_c_name}}</td>
                                                                    <td>{{$bank_detail->a_C_no}}</td>
                                                                    <td>{{$bank_detail->branch}}</td>
                                                                    <td>{{$bank_detail->bank_country}}</td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td>
                                                    <a class="btn btn-info" href="{{--route('edit_buyer')--}}">Edit</a>
                                                    <button class="btn btn-danger" data-toggle="modal" href="#deleteModal">Detele</button>
                                                </td>
                                            </tr>
                                       @endforeach
                                    </tbody>
                                </table>
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
                                                    <form action="{{route('export-buyer.destroy',[$export_detail->id])}}" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="btn red" id="delete"><i class="fa fa-trash"></i>Delete</button>               
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

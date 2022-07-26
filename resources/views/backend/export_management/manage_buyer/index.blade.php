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
                                            <th style="text-align: center">H S Code</th>
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
                                                    <table class="table table-bordered " style="overflow: scroll;">
                                                        <thead>
                                                            <tr>
                                                                <th>S.l</th>
                                                                <th>Consignment Type</th>
                                                                <th>H S Code</th>
                                                                {{-- <th>Action</th> --}}
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($export_detail->assign_hs_code as $key=>$hs_code)
                                                                <tr>
                                                                    <td>{{++$key}}</td>
                                                                    <td>{{$hs_code->consignment_type}}</td>
                                                                    <td>{{$hs_code->hs_code}}</td>
                                                                    {{-- <td>
                                                                        <button class="btn btn-info" data-toggle="modal" href="#edit_hs_code">Edit</button>
                                                                        <button class="btn btn-danger" data-toggle="modal" href="#delete_hs_code{{$hs_code->id}}">Delete</button>
                                                                    </td> --}}
                                                                </tr>
                                                                {{-- <div id="delete_hs_code{{$hs_code->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
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
                                                                </div> --}}
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td>
                                                    <a class="btn btn-info" href="{{--route('edit_buyer')--}}">Edit</a>
                                                    <button class="btn btn-danger delete" data-toggle="modal" href="#deleteModal" data-id={{$export_detail->id}} data-route="{{route('export-buyer.destroy',$export_detail->id)}}">Detele</button>
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
                                                    <form action="" id="delete_buyer" method="POST">
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
    <script>
        $(document).ready(function () {
            
            $(".delete").click(function(){
                $("#delete_id").val($(this).data('id'));
                $('#delete_buyer').attr('action', $(this).data('route'));
                
                console.log($(this).data('route'));
                //console.log($(this).data('id'));
            });
        });
    </script>
@endsection


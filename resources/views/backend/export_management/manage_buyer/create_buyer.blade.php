
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
            <h3 class="page-title bold form-inline">Export Management
                <small> Create Buyer </small>
                {{-- <div class="form-group" style="margin-left: 10%">
                    <i class="fa fa-search" aria-hidden="true"></i>
                </div> --}}
                {{-- <a class="btn blue-ebonyclay pull-right" data-toggle="modal" href="#basic">
                    Metal Detector List
                    <i class="fa fa-plus"></i>
                </a> --}}
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
            <form class="form-horizontal" role="form" method="post" action="{{route('export-buyer.store')}}">
                {{csrf_field()}}
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet box blue">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-briefcase"></i>Create Buyer
                            </div>
                            <div class="tools">
                            </div>
                        </div>
                        <div class="portlet-body" style="height: auto;">
                                {{-- <input type="hidden" name="production_processing_unit_id" value="{{$production_processing_unit_id}}"> --}}
                                <div class="row" style="margin-top:2%">
                                    <form class="form-horizontal" role="form" method="post" action="{{route('increment.store')}}">
                                        {{csrf_field()}}
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 style="text-align: center; background-color: rgb(208, 208, 241);"><b>Buyer Info</b></h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label class="control-label">Buyer Code <span class="required">* </span></label>
                                                        <input type="text" class="form-control" name="buyer_code" placeholder="Buyer Code" required>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="control-label">Buyer Name <span class="required">* </span></label>
                                                        <input type="text" class="form-control" name="buyer_name" placeholder="Buyer Name" required>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="control-label">Buyer Address <span class="required">* </span></label>
                                                        <input type="text" class="form-control" name="buyer_address" placeholder="Buyer Address" required>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label class="control-label">Contact Number <span class="required">* </span></label>
                                                        <input type="text" class="form-control" name="buyer_contact_number">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="control-label">Email <span class="required">* </span></label>
                                                        <input type="text" class="form-control" name="buyer_email" placeholder="Email" required>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="control-label" >Buyer Country <span class="required">* </span></label>
                                                        <select class="form-control country" name="buyer_country" id="country">
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><hr>
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 style="text-align: center; background-color: rgb(208, 208, 241);"><b>Consignee Info</b></h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label class="control-label">Name <span class="required">* </span></label>
                                                        <input type="text" class="form-control" name="consignee_name" placeholder="Name" required>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="control-label">Address <span class="required">* </span></label>
                                                        <input type="text" class="form-control" name="consignee_address" placeholder="Address" required>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="control-label">Contact Number <span class="required">* </span></label>
                                                        <input type="number" class="form-control" name="consignee_contact_number" placeholder="Contact Number" required>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label class="control-label" >Email <span class="required">* </span></label>
                                                        <input type="text" class="form-control" name="consignee_email" placeholder="Email" required>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="control-label" >Country <span class="required">* </span></label>
                                                        <select class="form-control country" name="consignee_country" id="country">
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 style="text-align: center; background-color: rgb(208, 208, 241);"><b>Notify Party Info</b></h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label class="control-label">Name <span class="required">* </span></label>
                                                        <input type="text" class="form-control" name="notify_party_name" placeholder="Name" required>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="control-label">Address <span class="required">* </span></label>
                                                        <input type="text" class="form-control" name="notify_party_address">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="control-label">Contact Number <span class="required">* </span></label>
                                                        <input type="number" class="form-control" name="notify_party_contact" placeholder="Contact Number" required>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label class="control-label">Email <span class="required">* </span></label>
                                                        <input type="text" class="form-control" name="notify_party_email" placeholder="Email" required>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="control-label js-data-example-ajax">Country <span class="required">* </span></label>
                                                        {{-- <input type="text" class="form-control" name="" placeholder="Country" required> --}}
                                                        <select class="form-control country" name="notify_party_country" id="country">
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h4 style="text-align: center; background-color: rgb(208, 208, 241);"><b>Bank Details</b></h4>
                                    </div>
                                    <input type="hidden" value="" id="provided_item" name="provided_item">
                                    <div class="form-group" style="padding:2%; width:100%;">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="control-label" for="bank_name">Bank Name <span class="required">* </span></label>
                                                <input type="text" class="form-control" placeholder="Bank Name" id="bank_name" name="bank_name">
                                            </div>
                                            <div class="col-md-2">
                                                <label class="control-label" for="a_c_name">A/C Name <span class="required">* </span></label>
                                                <input type="text" class="form-control" placeholder="A/C Name" id="a_c_name" name="a_c_name">
                                            </div>
                                            <div class="col-md-2">
                                                <label class="control-label" for="a_C_no">A/C No. <span class="required">* </span></label>
                                                <input type="number" class="form-control" placeholder="A/C No." id="a_C_no" name="a_C_no">
                                            </div>
                                            <div class="col-md-2">
                                                <label class="control-label" for="branch">Branch <span class="required">* </span></label>
                                                <input type="text" class="form-control" placeholder="Branch" id="branch" name="branch">
                                            </div>
                                            <div class="col-md-2">
                                                <label class="control-label"for="country">Country <span class="required">* </span></label>
                                                <select class="form-control country" name="bank_country" id="bank_country">
                                                </select>
                                            </div> 
                                            <div class="col-md-1">
                                                <label ></label>
                                                <button type="button"  class="btn btn-success" id="add_items">+  Add </button>
                                            </div>                               
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <table  class="table table-striped table-bordered table-hover" id="mytable">
                                                <tr>
                                                    <th>Bank Name</th>
                                                    <th>A/C Name</th>
                                                    <th>A/C No.</th>
                                                    <th>Branch</th>
                                                    <th>Country</th>
                                                    <th>Action</th>
                                                </tr>
                                                <tr>
    
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h4 style="text-align: center; background-color: rgb(208, 208, 241);"><b>Assign HS Code</b></h4>
                                    </div>
                                    <input type="hidden" value="" id="hs_item" name="hs_item">
                                    <div class="form-group" style="padding:2%; width:100%">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="control-label" for="bank_name">Consignment Type <span class="required">* </span></label>
                                                <select class="form-control" name="consignment_type" id="consignment_type">
                                                    <option value="">--Select--</option>
                                                    <option value="Fish">Fish</option>
                                                    <option value="Vegetable/Fruit">Vegetable/Fruit</option>
                                                    <option value="Sweet Desert">Sweet Desert</option>
                                                    <option value="Dry Fish">Dry Fish</option>
                                                </select>

                                            </div>
                                            <div class="col-md-4">
                                                <label class="control-label" for="a_c_name">H S Code <span class="required">* </span></label>
                                                <input type="text" style="text-align: center" class="form-control" placeholder="Type HS Code" id="hs_code" name="hs_code">
                                            </div>
                                            <div class="col-md-2">
                                                <button type="button"  class="btn btn-success" id="add_hs" style="margin-top: 15%">+  Add </button>
                                            </div>                               
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <table  class="table table-striped table-bordered table-hover" id="hsTable">
                                                <tr>
                                                    <th style="text-align: center">Consignee Type</th>
                                                    <th style="text-align: center">HS Code</th>
                                                    <th style="text-align: center">Action</th>
                                                </tr>
                                                <tr>
    
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="submit" data-loading-text="Submitting..." class="col-md-12 btn btn btn-info">
                                                <i class="fa fa-plus"></i>	Submit </button>
                                        </div>
                                    </div>
                                </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </form>
        </div>
    </div>
@endsection
@section('script')

  <script type="text/javascript">
    $(document).ready(function () {
        
        $.ajax({
                type:"GET",
                url:"https://restcountries.com/v3.1/all",
                success:function(data){
                    console.log(data);
                    $(".country").empty();
                    $.each( data, function( key, country ) {
                        $('.country').append($('<option>', {
                            value: country.id,
                            text: country.name.common
                        }));
                    });
                }
        });
                
    var items_array = [];
    function nullbank(){
        $("#bank_name").val(null);
        $("#a_c_name").val(null);
        $("#a_C_no").val(null);
        $("#branch").val(null);
        $("#bank_country").val(null);
    }
    $("#add_items").click(function(){
        console.log($("#product").val());
            items_array.push({"bank_name":$("#bank_name").val(),"a_c_name":$("#a_c_name").val(),"a_C_no":$("#a_C_no").val(),"bank_country":$("#bank_country").val(),"branch":$("#branch").val(),"status":"stay"});
            $("#provided_item").val('');
            $("#provided_item").val(JSON.stringify(items_array));
            $.each( items_array, function( key, item ) {
                // console.log(item);
                if (item.status == "stay") {
                    if(items_array.length-1 == key){
                        $("table#mytable tr").last().before("<tr id='"+key+"'><td>"+item.bank_name+"</td><td>"+item.a_c_name+"</td><td>"+item.a_C_no+"</td><td>"+item.branch+"</td><td>"+item.bank_country+"</td><td><button class='btn btn-danger delete_item' data-id='"+key+"'>Delete</button></td></tr>");
                    }
                }
            });
            $(".delete_item").click(function(){
                items_array[$(this).data("id")].status="delete";
                // console.log(product_array,$(this).data("id"));
                $("#provided_item").val('');
                $("#provided_item").val(JSON.stringify(items_array));
                $("#"+$(this).data("id")).remove();
            });
            nullbank ();
    });
    var hs_array = [];
    function nullmaking(){
            $("#consignment_type").val(null);
            $("#hs_code").val(null);
        }
    $("#add_hs").click(function(){
        console.log($("#product").val());
        hs_array.push({"consignment_type":$("#consignment_type").val(),"hs_code":$("#hs_code").val(),"status":"stay"});
            $("#hs_item").val('');
            $("#hs_item").val(JSON.stringify(hs_array));
            $.each( hs_array, function( key, item ) {
                // console.log(item);
                if (item.status == "stay") {
                    if(hs_array.length-1 == key){
                        $("table#hsTable tr").last().before("<tr id='"+key+"'><td>"+item.consignment_type+"</td><td>"+item.hs_code+"</td><td><button class='btn btn-danger hs_delete_item' data-id='"+key+"'>Delete</button></td></tr>");
                    }
                }
            });
            $(".hs_delete_item").click(function(){
                hs_array[$(this).data("id")].status="delete";
                // console.log(product_array,$(this).data("id"));
                $("#hs_item").val('');
                $("#hs_item").val(JSON.stringify(hs_array));
                $("#"+$(this).data("id")).remove();
            });
            nullmaking();
    });
    $('.select2Ajax').select2({
            ajax: {
                url: "https://restcountries.com/v3.1/all",
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                    return {
                        results:  $.map(data, function (item) {
                            return {
                                text: item.name.common,
                               
                            }
                        })
                    };
                },
                cache: true
            }
        });
        
    });
</script>


@endsection




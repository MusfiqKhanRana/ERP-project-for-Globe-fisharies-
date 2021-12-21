
@extends('backend.master')
@section('site-title')
   Create Party
@endsection
@section('main-content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <h3 class="page-title" class="portlet box dark">Create Party
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
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet-body" style="height: auto;">
                    <form method="post" action="{{route('party.store')}}" class="form-horizontal">
                        {{csrf_field()}}
                        <div class="col-md-12 ">
                            <div class="portlet-body">
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Party Code</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="party_code" placeholder="Party Code" value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Party Name</span></label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="party_name" placeholder="Party Name" value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Phone</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="phone" placeholder="Phone" value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Party Type</label>
                                        <div class="col-md-9">
                                            <select class="form-control select2me" id="party_type" name="party_type">
                                                <option value="">--Select--</option>
                                                <option value="Online & Inhouse">Online & Inhouse</option>
                                                <option value="Inhouse">Inhouse</option>
                                                <option value="Modern Trade">Modern Trade</option>
                                                <option value="Sample">Sample</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Party Short Name</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="party_short_name" placeholder="Party Short Name" value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Party Select Products</label>
                                        <div class="col-md-9">
                                            <select id="party_products" class="multiselect text-center" style="width: 100%" name="party_products[]" multiple="multiple">
                                                @foreach ($products as $item)
                                                <option class="text-center" value="{{$item->id}}">{{$item->product_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Address</label>
                                        <div class="col-md-9">
                                            <textarea class="form-control" name="address" rows="3"></textarea>
                                        </div>
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
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script src="{{asset('assets/backend/js/parsley.min.js')}}"></script>
<script>
    $(document).ready(function(){
        $('#party_products').multiselect({
            enableFiltering: true,
            enableCaseInsensitiveFiltering:true,
        });
        $( "#party_products" ).change(function() {
            // alert( $(this).val() );
            console.log($(this).val());
            var id = $(this).val();
                    $.ajax({
                        type:"POST",
                        url:"{{route('party.products.pass')}}",
                        data:{
                            'id' : id,
                            '_token' : $('input[name=_token]').val()
                        },
                        success:function(data){
                            $('.product_id'+max).empty();
                            $('.product_id'+max).append($('<option>', { 
                                value: '',
                                text : "--select--"
                            }));
                            $.each(data, function (i, item) {
                                var name_quantity = item.product_name;
                                $('.product_id'+max).append($('<option>', { 
                                    value: item.id,
                                    text : name_quantity
                                }));
                            });
                        }
                    });
        });
        // $('::option').css({"width": "100%"});
    });
</script>
    
@endsection


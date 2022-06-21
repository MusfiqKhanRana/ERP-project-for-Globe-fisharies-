
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
                                        <label class="col-md-3 control-label">Party Code<span class="required">* </span></label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="party_code" placeholder="Type Party Code" value="" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Party Name<span class="required">* </span></span></label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="party_name" placeholder="Type Party Name" value="" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Party Phone<span class="required">* </span></label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="phone" placeholder="Type Phone Number" value="" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Party Address<span class="required">* </span></label>
                                        <div class="col-md-9">
                                            <textarea class="form-control" name="address" placeholder="Type Party Address" rows="3" required></textarea>
                                        </div>
                                    </div>
                                    {{-- <div class="form-group">
                                        <label class="col-md-3 control-label"> Type</label>
                                        <div class="col-md-9">
                                            <select class="form-control select2me" id="party_type" name="party_type">
                                                <option value="">--Select--</option>
                                                <option value="Online & Inhouse">Online & Inhouse</option>
                                                <option value="Inhouse">Inhouse</option>
                                                <option value="Modern Trade">Modern Trade</option>
                                            </select>
                                        </div>
                                    </div> --}}
                                    {{-- <div class="form-group">
                                        <label class="col-md-3 control-label">Party Short Name</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="party_short_name" placeholder="Type Party Short Name" value="">
                                        </div>
                                    </div> --}}
                                    <div class="form-group">
                                        <label class="col-md-3 control-label"></label>
                                        <div class="col-md-9" id="product_field">
                                            
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label"> Select Products<span class="required">* </span></label>
                                        <div class="col-md-9">
                                            <select id="party_products" class="multiselect text-center" style="width: 100% !important" name="party_products[]" multiple="multiple" required>
                                                @foreach ($products as $item)
                                                    @if ($item->supplyitem->market_name == null) {
                                                        <option class="text-right" style="padding-left: 5% !important" value="{{$item->id}}">{{$item->supplyitem->name}}({{$item->pack->name}})</option>
                                                    }
                                                    @else {
                                                        <option class="text-right" style="padding-left: 5% !important" value="{{$item->id}}">{{$item->supplyitem->market_name}}({{$item->pack->name}})</option>
                                                    }
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" data-loading-text="Submitting..." class="col-md-12 btn btn btn-info">
                                        <i class="fa fa-plus"></i>	Create Party </button>
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
            var ids = $(this).val();
                    $.ajax({
                        type:"POST",
                        url:"{{route('party.products.info')}}",
                        data:{
                            'id' : ids,
                            '_token' : $('input[name=_token]').val()
                        },
                        success:function(data){
                            console.log(data);
                            $(".user-div").remove();
                            var $productDiv = $('#product_field').append('<div class="user-div row" style="background-color:gray;color:white;padding:2%;"></div>')
                            $.each(data, function (i, item) {
                                 $("<div class='col-md-6'>Name :"+item.supplyitem.name+"</div><div class='col-md-6'> <input type='text' style='color:black' name='party_price[]' placeholder='Set price for party'></div><br>").appendTo( ".user-div");
                               
                        });
                        }
                    });
        });
        // $('::option').css({"width": "100%"});
    });
</script>
    
@endsection


@extends('backend.master')
@section('site-title')
   CS List
@endsection
@section('style')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/i18n/defaults-*.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@endsection
@section('main-content')
    <!-- BEGIN CONTENT -->
    <!-- BEGIN PAGE TITLE-->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
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
            @if(Session::has('msg'))
                <script>
                    $(document).ready(function(){
                        swal("{{Session::get('msg')}}","", "success");
                    });
                </script>
            @endif
            <h3 class="page-title bold">Purchase Management
            </h3>
            <div class="portlet box blue-chambray">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-briefcase"></i>CS List
                    </div>
                    <div class="tools">
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-scrollable">
                        <form class="form-horizontal" role="form" method="post" action="{{--route('production/purchase/quotation')--}}">
                            {{csrf_field()}}
                            <div class="row" style="margin: 3%" >
                                <p ><b>Item name:</b> {{$cs_item->item_name}}</p>
                                <p ><b>Department:</b> {{$cs_item->production_purchase_requisition->departments->name}}</p>
                                <p ><b>Request By:</b> {{$cs_item->production_purchase_requisition->users->name}}</p>
                                <p ><b>Demand Date:</b> {{$cs_item->demand_date}}</p>
                            </div>
                            <hr>
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>
                                            S.l
                                        </th>
                                        <th>Supplier Name</th>
                                        <th>Price</th>
                                        <th>Speciality</th>
                                        <th>Negotiable Price</th>
                                        <th>Remark</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cs_item->production_general_purchase_quotation as $key=> $data)
                                    <tr>
                                        <td>
                                            {{++ $key}}
                                        </td>
                                        <td>{{$data->supplier->name}}</td>
                                        <td>{{$data->price}}</td>
                                        <td>{{$data->speciality}}</td>
                                        <td>
                                            <input type="text" class="price" placeholder="Price" name="negotiable_price" id="negotiable_price">
                                        </td>
                                        <td>
                                            <textarea type="text" class="remark" placeholder="Remark" name="cs_remark" id="cd_remark"></textarea>
                                        </td>
                                        
                                        <td>
                                            <a class="btn btn-danger" data-toggle="modal" href="#rejectModal" >Reject</a>
                                            <a class="btn btn-info" data-toggle="modal" href="#ConfirmModal">Confirm</a>
                                        </td>
                                    </tr>
                                    <div id="rejectModal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Reject Note</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="form-horizontal" role="form" method="post" action="{{route('production.quotation.reject',$data->id)}}">
                                                        {{csrf_field()}}
                                                        <div class="form-group">
                                                            <p>Are You Sure You Want to Remove?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                            <a href="{{route('production.quotation.reject',$data->id)}}" class="btn red-flamingo"><i class="fa fa-floppy-o"></i> Confirm</a>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="ConfirmModal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h4 class="modal-title">Want to Confirm it?</h4>
                                                </div>
                                                <br>
                                                <div class="modal-footer"><br>
                                                    <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                    <a href="{{route('production.quotation.confirm',$data->id)}}" class="btn blue-ebonyclay"><i class="fa fa-floppy-o"></i> Confirm</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </tbody>
                            </table>
                            <div>
                                <button type="submit" class="col-md-12 btn btn-info submitButton" ><i class="fa fa-floppy-o"></i> Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-chained/1.0.1/jquery.chained.min.js" integrity="sha512-rcWQG55udn0NOSHKgu3DO5jb34nLcwC+iL1Qq6sq04Sj7uW27vmYENyvWm8I9oqtLoAE01KzcUO6THujRpi/Kg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            var pivot_item = null;
            var all_item = null;
            var supplier_id,name,requisition_id,requisition_item_id,price,speciality = null;
            $('.addquation').click(function(){
                 console.log($(this).data('all')); 
                // console.log($(this).data('pivot')); 
                //console.log($(this).data('pivot').users.name);
                pivot_item = $(this).data('pivot');
                all_item = $(this).data('all');
                $('#item_name').html(pivot_item.item_name);
                $('#department').html(all_item.departments.name);
                $('#request_by').html(all_item.users.name);
                $('#demand_date').html(pivot_item.demand_date);
                $('#requisition_id').val(all_item.id)
                $('#requisition_item_id').val(pivot_item.id)
            })
          
        var items_array = [];
        function nullmaking(){
                $("#supplier_id").val(null);
                $("#price").val(null);
                $("#speciality").val(null);
            }
        $(".add_quotation").click(function() {
            // console.log($(this).attr("data-requisition_id"));
            var id = $(this).attr("data-requisition_id");
            $.ajax({
                    type:"POST",
                    url:"{{route('production.purchase.quotation.data_pass')}}",
                    data:{
                        'id' : id,
                        '_token' : $('input[name=_token]').val()
                    },
                    success:function(data){
                        console.log(data);
                    }
                });

        });
        // $(".supplier_name").change(function(){
        //    //console.log($(this).attr("name"));
        //    name = $(this).attr("name");
        
        // });
        $('.supplier_name').change(function(){
            supplier_id = $(this).val();
            // console.log($(this).find(':selected').data("name"));
            name = $(this).find(':selected').data("supplier_name");
            //console.log(name);
                
            });
        $(".ItemAdd").click(function(){
            console.log($(".supplier_name").val());
                items_array.push({"supplier_id":supplier_id,"name":name,"price":$("#price").val(),"speciality":$("#speciality").val(),"status":"stay"});
                $("#provided_item").val('');
                $("#provided_item").val(JSON.stringify(items_array));
                $.each( items_array, function( key, item ) {
                    // console.log(item);
                    
                        if(items_array.length-1 == key){
                            $("table.itemsTable tr").last().before("<tr id='"+key+"'><td ><input name='supplier_id' type='hidden' value='"+item.supplier_id+"'> <span>"+item.name+"</span></td><td ><input name='price' type='hidden' value='"+item.price+"'> <span>"+item.price+"</span></td><td ><input name='speciality'type='hidden' value='"+item.speciality+"'> <span>"+item.speciality+"</span></td><td><button class='btn btn-danger delete_item' data-id='"+key+"'>Delete</button></td></tr>");
                        }
                    
                });
                $(".delete_item").click(function(){
                    items_array[$(this).data("id")].status="delete";
                    // console.log(product_array,$(this).data("id"));
                    $("#provided_item").val('');
                    $("#provided_item").val(JSON.stringify(items_array));
                    $("#"+$(this).data("id")).remove();
                });
                nullmaking();
        });
            
        });
    </script>
<script>
    $(document).ready(function(){
        $('.submitButton').hide();
        $('.price').keyup(function()
        {
            ($(this).is(':input')) 
                $('.submitButton').show();

        });
        
    });
</script>
@endsection

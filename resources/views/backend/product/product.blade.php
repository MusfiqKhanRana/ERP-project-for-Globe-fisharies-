@extends('backend.master')
@section('site-title')
    Product
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
            <!-- BEGIN PAGE TITLE-->
        
            <h3 class="page-title bold form-inline">Product List
                <small> Office-managment </small>
                <div class="form-group" style="margin-left: 10%">
                    <i class="fa fa-search" aria-hidden="true"></i>
                    <input type="text" name="search" id="search" class="form-control" placeholder="Search for Products" />
                </div>
                <a class="btn blue-ebonyclay pull-right" data-toggle="modal" href="#basic">
                    Add Product
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
                                <i class="fa fa-briefcase"></i>Product List
                            </div>
                            <div class="tools">
                            </div>
                        </div>
                        <div class="portlet-body" style="overflow:scroll; display:block;">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th> Image</th>
                                    <th> Name</th>
                                    <th> Product Code </th>
                                    <th> Category</th>
                                    <th>Variant</th> 
                                    <th>Online Selling Price</th>
                                    <th>In House Selling Price</th>
                                    <th>Pack Size</th>
                                    <th>Safety Stock</th>
                                    <th>Available Stock</th>
                                    <th style="text-align: center;"> Action </th>
                                </tr>
                                </thead>
                                <tbody>
                                 {{-- @foreach($product as $key => $data)
                                    <tr id="table_tr_{{$data->id}}">
                                        <td>{{$key+1}}</td>
                                        <td>{{$data->image}}</td>
                                        <td>{{$data->supplyitem->name}}</td>
                                        <td>{{$data->product_id}}</td>
                                        <td>{{$data->category->name }}</td>
                                        <td>{{$data->online_selling_price}} {{$general->currency}}</td>
                                        <td>{{$data->inhouse_selling_price}} {{$general->currency}}</td>
                                        <td>{{$data->safety_stock}} </td>
                                        <td>
                                            <a class="btn blue-chambray" href="{{route('product.edit', $data->id)}}"><i class="fa fa-edit"></i>Edit</a>
                                            <a class="btn red" data-status="{{$data->id}}" data-toggle="modal" class="deleteModal" href="#deleteModal{{$data->id}}"><i class="fa fa-trash"></i> Delete</a>
                                            <a class="btn green" href="{{route('product.sale', $data->id)}}"><i class="fa fa-tag" aria-hidden="true"></i>Add Sale</a>
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
                                                    <a type="submit" href="{{route('product.delete', $data->id)}}" class="btn red" id="delete"><i class="fa fa-trash"></i> Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach --}}
                                </tbody>
                            </table>
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
                            <h4 class="modal-title">Add New Product</h4>
                        </div>
                        <form class="form-horizontal" role="form" method="post" action="{{route('product.store')}}" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <label class="control-label">Select Category<span class="required">* </span></label>
                                        <select class="form-control type" name="processing_name" required>
                                            
                                                    <option value="">--Select--</option>
                                                    <option value="iqf">IQF</option>
                                                    <option value="block_frozen">Block Frozen</option>
                                                    <option value="raw_bf_shrimp">Raw BF(Shrimp)</option>
                                                    <option value="raw_iqf_shrimp">Raw IQF(Shrimp)</option>
                                                    <option value="semi_iqf">Semi IQF</option>
                                                    <option value="cooked_iqf_shrimp">Cooked IQF(Shrimp)</option>
                                                    <option value="blanched_iqf_shrimp">Balanched IQF(Shrimp)</option>
                                               
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" id="dead_input">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <label class="control-label">Select Variant<span class="required">* </span></label>
                                        <select class="form-control varient" name="variant" required>
                                            
                                                    <option class="iqf" value="fillet">Fillet</option>
                                                    <option class="iqf" value="whole">Whole</option>
                                                    <option class="iqf" value="whole_gutted">Whole Gutted</option>
                                                    <option class="iqf" value="cleaned">Cleaned</option>
                                                    <option class="iqf" value="sliced_fmly_cut">Sliced(Family Cut)</option>
                                                    <option class="iqf" value="sliced_chinese_cut">Sliced(Chinese Cut)</option>
                                                    <option class="iqf" value="butter_fly">Butter Fly</option>
                                                    <option class="iqf" value="hgto">HGTO</option>
                                                    <option class="block_frozen" value="whole">Whole</option>
                                                    <option class="block_frozen" value="clean">Clean</option>
                                                    <option class="block_frozen" value="slice">Slice</option>
                                                    <option class="raw_bf_shrimp" value="hlso">HLSO</option>
                                                    <option class="raw_bf_shrimp" value="pud">PUD</option>
                                                    <option class="raw_bf_shrimp" value="p_n_d">P & D</option>
                                                    <option class="raw_bf_shrimp" value="pdto">PDTO</option>
                                                    <option class="raw_bf_shrimp" value="pto">PTO</option>
                                                    <option class="raw_iqf_shrimp" value="hlso">HLSO</option>
                                                    <option class="raw_iqf_shrimp" value="pud">PUD</option>
                                                    <option class="raw_iqf_shrimp" value="p_n_d_tail_on">P&D Tail On</option>
                                                    <option class="raw_iqf_shrimp" value="p_n_d_tail_off">P&D Tail Off</option>
                                                    <option class="raw_iqf_shrimp" value="special_cut_p_n_d">Special Cut P&D</option>
                                                    <option class="raw_iqf_shrimp" value="hlso_easy_pell">HLSO Easy Pell</option>
                                                    <option class="raw_iqf_shrimp" value="butterfly_pud_skewer">Butterfly/PUD Skewer</option>
                                                    <option class="raw_iqf_shrimp" value="pud_pull_vein">PUD Pull Vein</option>
                                                    <option class="semi_iqf" value="hoso">HOSO</option>
                                                    <option class="semi_iqf" value="hoto">HOTO</option>
                                                    <option class="cooked_iqf_shrimp" value="hoso">HOSO</option>
                                                    <option class="cooked_iqf_shrimp" value="pud">PUD</option>
                                                    <option class="cooked_iqf_shrimp" value="p_n_d_tail_on">P&D Tail On</option>
                                                    <option class="cooked_iqf_shrimp" value="p_n_d_tail_off">P&D Tail Off</option>
                                                    <option class="blanched_iqf_shrimp" value="hoso">HOSO</option>
                                                    <option class="blanched_iqf_shrimp" value="pud">PUD</option>
                                                    <option class="blanched_iqf_shrimp" value="p_n_d_tail_on">P&D Tail On</option>
                                                    <option class="blanched_iqf_shrimp" value="p_n_d_tail_off">P&D Tail Off</option>
                                                
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <label class="control-label">Product Name<span class="required">* </span></label>
                                        <select class="form-control" name="supply_item_id" required>
                                            <option value="">--Select--</option>
                                            @foreach($product_items as $a)
                                                @if ($a->market_name == null) {
                                                    <option value="{{$a->id}}" >{{$a->name}}</option>
                                                    }
                                                @else
                                                    {
                                                    <option value="{{$a->id}}" >{{$a->market_name}}</option>
                                                    }
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="form-group">
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <label class="control-label">Buying Price </label>
                                        <input class="form-control text-capitalize" placeholder="Buying Price" type="number" required name="buying_price">
                                    </div>
                                </div>
                            </div> --}}

                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <label class="control-label">Online Selling Price <span class="required">* </span></label>
                                        <input type="hidden" name="online_selling_price" value="0">
                                        <input class="form-control text-capitalize" placeholder="Online Selling Price" type="number" required name="online_selling_price"><br>
                                        <label class="control-label">In House Selling Price <span class="required">* </span></label>
                                        <input class="form-control text-capitalize" placeholder="In House Selling Price" type="number" required name="inhouse_selling_price"><br>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="form-group">
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <label class="control-label">Select Selling Price Types</label>
                                            <select class="form-control" name="selling_types">
                                                    <option value="Online Selling Price" >Online Selling Price</option>
                                                    <option value="In House Selling Price" >In House Selling Price</option>
                                                    <option value="Retail Selling Price" >Retail Selling Price</option>
                                            </select>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <label class="control-label">Pack Size<span class="required">* </span></label>
                                        <select name="pack_id" id="subCategory" class="form-control" required>
                                            <option value="0">-- Select Pack Size --</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <label class="control-label">Safety Stock<span class="required">* </span></label>
                                        <input class="form-control text-capitalize" placeholder="safety_stock" type="text" required name="safety_stock">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <label class="control-label">Product Image<span class="required">* </span></label>
                                        <input class="form-control text-capitalize" placeholder="" type="file" required name="image">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                <button type="submit" class="btn blue-chambray"><i class="fa fa-floppy-o"></i> Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    @section('script')
    <script type="text/JavaScript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-chained/1.0.1/jquery.chained.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $(".varient").chained(".type");
           
            $('#subCategory').find('option').not(':first').remove();
        
            $.ajax({
            url:"{{route('packsize')}}",
            type:'get',
            dataType:'json',
            success:function (response) {
                var len = 0;
                if (response.data != null) {
                    len = response.data.length;
                }

                if (len>0) {
                    for (var i = 0; i<len; i++) {
                            var id = response.data[i].id;
                            var name = response.data[i].name;

                            var option = "<option value='"+id+"'>"+name+"</option>"; 

                            $("#subCategory").append(option);
                    }
                }
            }
            })
            fetch_customer_data();
            
            function fetch_customer_data(query = '')
            {
                $.ajax({
                    url:"{{ route('product.search') }}",
                    method:'GET',
                    data:{query:query},
                    dataType:'json',
                    success:function(data)
                    {
                        console.log(data);
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
                var product_id = $(this).attr("data-id");
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
                            url: "/admin/product/delete/"+product_id,
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
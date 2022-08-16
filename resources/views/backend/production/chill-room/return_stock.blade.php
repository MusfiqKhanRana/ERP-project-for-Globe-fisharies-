@extends('backend.master')
@section('site-title')
   Chill Room
@endsection 
@section('main-content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <h3 class="page-title bold form-inline" class="portlet box dark">Production Management <small>Chill Room</small>
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
                            <i class="fa fa-globe"></i>Chill Room - Return Stock</div>
                        <div class="tools"> </div>
                    </div>
                        <div class="portlet-body">
                            {{-- <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item active">
                                  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#totalstock" role="tab" aria-controls="home" aria-selected="true">Total Stock</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#stockdetails" role="tab" aria-controls="profile" aria-selected="false">Stock Details</a>
                                </li>
                              </ul> --}}
                              <div class="tab-content" id="myTabContent">
                                {{-- <div class="tab-pane fade show active" id="totalstock" role="tabpanel" aria-labelledby="home-tab"> --}}
                                
                                </div>
                                {{-- <div class="tab-pane fade" id="stockdetails" role="tabpanel" aria-labelledby="profile-tab"> --}}
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>
                                                    Item Name
                                                </th>
                                                <th>
                                                    Category
                                                </th>
                                                <th>
                                                    Grade
                                                </th>
                                                <th>
                                                    Total Quantity
                                                </th>
                                                <th>
                                                    Action
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($return_item as  $key=>$items)
                                            @php
                                             $array=(explode("#",$key));
                                             $grade =  $array[1];
                                               $total_quantity=0;
                                               $item_details = null;
                                            //    dd($grade);
                                            @endphp
                                            @foreach ($items as $item)
                                                @if ($item->isReturn == '0')
                                                    @php
                                                        $total_quantity += $item->return_quantity;
                                                        $item_details=$item->production_processing_item;
                                                    @endphp
                                                @endif
                                            @endforeach
                                                <tr>
                                                    <td>
                                                        {{$item_details->name}}
                                                    </td>
                                                    <td>
                                                        {{$item_details->category}}
                                                    </td>
                                                    <td>
                                                        {{$grade}}
                                                    </td>
                                                    <td>
                                                        {{$total_quantity}}
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-success process_modal" data-toggle="modal" data-requisition_batch_code="{{$key}}" data-item_name="{{$item_details->name}}" data-item_id="{{$item->item_id}}" data-category="{{$item_details->category}}" data-total_quantity="{{$total_quantity}}" data-grade="{{$grade}}"  href="#processModal">Process</button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            <div class="modal fade" id="processModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header" style="text-align: center">
                                                    <h3 class="modal-title" id="exampleModalLabel"><b>Transfer Stock To Processing Unit</b></h3>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    </div>
                                                    <form class="form-horizontal" role="form" method="post" action="{{route('production.chill_room.process')}}">
                                                        {{csrf_field()}}
                                                        <div class="modal-body">
                                                            <input type="hidden" class="item_id" name="item_id">
                                                            <input type="hidden" name="requisition_batch_code" class="requisition_batch_code">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <p>Item Name:&nbsp;&nbsp;<b><span class="item_name"></span></b></p>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <p>Total Quantity:&nbsp;&nbsp;<b><span class="total_quantity"></span></b></p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <p>Category:&nbsp;&nbsp;<b><span class="item_category"></span></b></p>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <p>Size:&nbsp;&nbsp;<b><span class="item_grade_name"></span></b></p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <p><b>Processing Type :</b></p>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <select class="form-control type" name="processing_name" id="">
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
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <p><b>Processing Variant :</b></p>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <select class="form-control varient" name="processing_variant" id="">
                                                                        <option value="">--Select--</option>
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
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <p><b>Production Quantity :</b></p>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label for="">Quantity(kg)</label>
                                                                    <input type="number" placeholder="qty" class="form-control total_qty" name="total_qty">
                                                                </div>
                                                            </div>
                                                            <div class="row warning" style="margin-top:3%">
                                                                <div class="col-md-12" style="text-align: center">
                                                                    <p style="color: red"><b>**Given quantity ain't available**</b></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary confirm_btn">Confirm</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                </div>
                                            </div>
                                        </tbody>
                                    </table>
                                    <div class="row">
                                        {{-- <div class="col-md-12 text-center">{{ $employee->links() }}</div> --}}
                                        {{-- {{ $requisitions->links('vendor.pagination.custom') }} --}}
                                        {{-- {{ $requisitions->links() }} --}}
                                        {{-- {!! $requisitions->render() !!} --}}
                                    </div>
                                </div>
                              </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection
@section('script')
<script type="text/JavaScript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-chained/1.0.1/jquery.chained.min.js"></script>
    <script>
    //     $(window).on('hashchange', function() {
    //     if (window.location.hash) {
    //         var page = window.location.hash.replace('#', '');
    //         if (page == Number.NaN || page <= 0) {
    //             return false;
    //         }else{
    //             getData(page);
    //         }
    //     }
    // });
    
    // $(".series").chained(".mark");

    $(document).ready(function()
    {
        var id,item_id,pivot_id = 0;
        $(".varient").chained(".type");
        $('.type').on("change",function(){
            var typex = $(this).val();
            $('.varient').on("change",function(){
                var varientx = $(this).val();
                if (typex == "iqf" && varientx == "fillet") {
                    $('.dead_input').hide();
                }
                if (typex == "iqf" && varientx != "fillet") {
                    $('.dead_input').show();
                }
             });
        });
        $('.process_modal').click(function(){
             id = $(this).attr("data-id");
             item_id = $(this).attr("data-item_id");
             pivot_id = $(this).attr("data-pivot_id");
             $('.requisition_id').val(null);
             $('.requisition_code').val(null);
             $('.item_id').val(null);
             $('.item_name').html(null);
             $('.item_grade_name').html(null);
             $('.alive_stock').html(null);
             $('.dead_stock').html(null);
             $('.total_weight').html(null);
        });
        $('.warning').hide();
        $('.alive_quantity').on("keyup change",function() {
            var a = $(this).val();
            var b = $('.alive_stock').html();
            if (a>parseInt(b)) {
                $('.warning').show();
                $('.confirm_btn').prop("disabled",true);
            }
            if (a<parseInt(b)) {
                $('.warning').hide();
                $('.confirm_btn').prop("disabled",false); 
            }
            console.log(a);
            console.log(parseInt(b));
        });
        $('.dead_quantity').on("keyup change",function(){
            var a = $(this).val();
            var b = $('.dead_stock').html();
            if (a>parseInt(b)) {
                $('.warning').show();
                $('.confirm_btn').prop("disabled",true);
            }
            if (a<parseInt(b)) {
                $('.warning').hide();
                $('.confirm_btn').prop("disabled",false); 
            }
        });
        // $(document).on('click', '.paginate',function(event)
        // {
        //     console.log('good');
        //     event.preventDefault();
  
        //     // $('li').removeClass('active');
        //     // $(this).parent('li').addClass('active');
  
        //     // var myurl = $(this).attr('href');
        //     // var page=$(this).attr('href').split('page=')[1];
  
        //     // getData(page);
        // });
  
    });
  
    // function getData(page){
    //     $.ajax(
    //     {
    //         url: 'admin/production/chill-room?page=' + page,
    //         type: "get",
    //         datatype: "html"
    //     }).done(function(data){
    //         $("#tag_container").empty().html(data);
    //         location.hash = page;
    //     }).fail(function(jqXHR, ajaxOptions, thrownError){
    //           alert('No response from server');
    //     });
    // }
    </script>
@endsection

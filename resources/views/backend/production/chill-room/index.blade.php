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
            <h3 class="page-title bold form-inline" class="portlet box dark">Production Management
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
                            <i class="fa fa-globe"></i>Chill Room</div>
                        <div class="tools"> </div>
                    </div>
                        <div class="portlet-body">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item active">
                                  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#totalstock" role="tab" aria-controls="home" aria-selected="true">Total Stock</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#stockdetails" role="tab" aria-controls="profile" aria-selected="false">Stock Details</a>
                                </li>
                              </ul>
                              <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="totalstock" role="tabpanel" aria-labelledby="home-tab">
                                
                                </div>
                                <div class="tab-pane fade" id="stockdetails" role="tabpanel" aria-labelledby="profile-tab">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>
                                                    Invoice No.
                                                </th>
                                                <th>
                                                    Added In Chill Room
                                                </th>
                                                <th>
                                                    Items
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($requisitions as $requisition)
                                                <tr>
                                                    <td>
                                                        {{$requisition->invoice_code}}
                                                    </td>
                                                    <td>
                                                        {{$requisition->receive_date}}
                                                    </td>
                                                    <td>
                                                        <table class="table table-striped table-bordered table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th>
                                                                        Item Name
                                                                    </th>
                                                                    <th>
                                                                        Grade
                                                                    </th>
                                                                    <th>
                                                                        Current Stock Alive(kg)
                                                                    </th>
                                                                    <th>
                                                                        Current Stock Dead(kg)
                                                                    </th>
                                                                    <th>
                                                                        Remark
                                                                    </th>
                                                                    <th>
                                                                        Action
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @php
                                                                    $processing_info = null;
                                                                    $alive_on_process = [];
                                                                    $alive_on_process_total = null;
                                                                    $dead_on_process_total = null;
                                                                    $dead_on_process = [];
                                                                    $alive = 0;
                                                                    $dead = 0;
                                                                    $t_check=0;
                                                                    // dd($requisition->production_processing_unit->toArray())
                                                                @endphp
                                                                @foreach ($requisition->production_requisition_items as $item)
                                                                    @foreach ($requisition->production_processing_unit as $processing_data)
                                                                        @php
                                                                            // dd($a);
                                                                            if($processing_data->item_id==$item->id){
                                                                                // $a = $item->id;
                                                                                // dd($a);
                                                                                $alive_on_process_total+= $processing_data->alive_quantity;
                                                                                $dead_on_process_total += $processing_data->dead_quantity;
                                                                                // $processing_info = $processing_data;
                                                                                // $alive_on_process[$a] = $alive_on_process[$a] + $processing_data->alive_quantity;
                                                                                // dd($alive_on_process);
                                                                                // $dead_on_process[$a] += $processing_data->dead_quantity;
                                                                            }
                                                                        @endphp
                                                                    @endforeach
                                                                    @php
                                                                        array_push($alive_on_process,["id"=>$item->id,"alive_quantity_total"=>$alive_on_process_total]);
                                                                        array_push($dead_on_process,["id"=>$item->id,"dead_on_process_total"=>$dead_on_process_total]);
                                                                        // dd($alive_on_process);
                                                                        // foreach ($alive_on_process as $key => $value) {
                                                                        //     // dd($value['id']);
                                                                        // }
                                                                        $alive_on_process_total = null;
                                                                        $dead_on_process_total = null;
                                                                    @endphp
                                                                    {{-- dd($alive_on_process); --}}
                                                                @endforeach
                                                            @foreach ($requisition->production_requisition_items as $item)
                                                                @if ($requisition->production_processing_unit->isEmpty())
                                                                    <tr>
                                                                        <td>
                                                                            {{$item->name}}
                                                                        </td>
                                                                        <td>
                                                                            {{$item->grade->name}}
                                                                        </td>
                                                                        <td>
                                                                            {{$item->pivot->alive_quantity}}
                                                                        </td>
                                                                        <td>
                                                                            {{$item->pivot->dead_quantity}}
                                                                        </td> 
                                                                        <td>
                                                                            {{$item->pivot->alive_quantity}}
                                                                        </td>
                                                                        <td>
                                                                            {{$item->pivot->dead_quantity}}
                                                                        </td>
                                                                        <td>
                                                                            {{$item->pivot->received_remark}}
                                                                        </td>
                                                                        <td>
                                                                            <button class="btn btn-success process_modal" data-toggle="modal" data-id="{{$requisition->id}}" data-item_id="{{$item->id}}" data-pivot_id="{{$item->pivot->id}}" href="#processModal">Process</button>
                                                                        </td>
                                                                    </tr>
                                                                @else
                                                                   
                                                                    @php
                                                                    $alive = 0;
                                                                    $dead = 0;
                                                                    $t_check =0;
                                                                        // dd($alive_on_process);
                                                                        foreach ($alive_on_process as $key => $value) {
                                                                            
                                                                            if ($value['id']==$item->id) {
                                                                                $alive = $value['alive_quantity_total'];
                                                                            }
                                                                        }
                                                                        foreach ($dead_on_process as $key => $value) {
                                                                            
                                                                            if ($value['id']==$item->id) {
                                                                                $dead = $value['dead_on_process_total'];
                                                                            }
                                                                        }
                                                                        $t_check =(($item->pivot->alive_quantity)-($alive))+(($item->pivot->dead_quantity)-($dead));
                                                                        // dd($t_check);
                                                                    @endphp
                                                                    @if ($t_check>0)
                                                                    <tr>
                                                                        <td>
                                                                            {{$item->name}}
                                                                        </td>
                                                                        <td>
                                                                            {{$item->grade->name}}
                                                                        </td>
                                                                        <td>
                                                                            {{($item->pivot->alive_quantity)-($alive)}}
                                                                        </td>
                                                                        <td>
                                                                            {{($item->pivot->dead_quantity)-($dead)}}
                                                                        </td>
                                                                        <td>
                                                                            {{$item->pivot->received_remark}}
                                                                        </td>
                                                                        <td>
                                                                            <button class="btn btn-success process_modal" data-toggle="modal" data-id="{{$requisition->id}}" data-item_id="{{$item->id}}" data-pivot_id="{{$item->pivot->id}}" href="#processModal">Process</button>
                                                                        </td>
                                                                    </tr>
                                                                    @endif
                                                                @endif
                                                            @endforeach
                                                            </tbody>
                                                        </table>
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
                                                            <input type="hidden" class="requisition_id" name="requisition_id">
                                                            <input type="hidden" class="requisition_code" name="requisition_code">
                                                            <input type="hidden" class="item_id" name="item_id">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <p>Item Name:&nbsp;&nbsp;<b><span class="item_name"></span></b></p>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <p>Alive Stock:&nbsp;&nbsp;<b><span class="alive_stock"></span></b></p>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <p>Dead Stock:&nbsp;&nbsp;<b><span class="dead_stock"></span></b></p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <p>Current Stock:&nbsp;&nbsp;<b><span class="total_weight"></span></b></p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
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
                                                                    <label for="">Alive Quantity</label>
                                                                    <input type="number" placeholder="alive qty" class="form-control alive_quantity" name="alive_quantity">
                                                                </div>
                                                                <div class="col-md-3 dead_input">
                                                                    <label for="">Dead Quantity</label>
                                                                    <input type="number" placeholder="dead qty" class="form-control dead_quantity" name="dead_quantity">
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
                                        {{ $requisitions->links('vendor.pagination.custom') }}
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
             $.ajax({
                    type:"POST",
                    url:"{{route('production.chill_room.data_pass')}}",
                    data:{
                        'pivot_id' : pivot_id,
                        'item_id' : item_id,
                        'id' : id,
                        '_token' : $('input[name=_token]').val()
                    },
                    success:function(data){
                        console.log(data);
                        $('.requisition_id').val(data.requisition_id);
                        $('.requisition_code').val(data.requisition_code);
                        $('.item_name').html(data.item_name);
                        $('.item_grade_name').html(data.item_grade_name);
                        $('.alive_stock').html(data.alive_quantity);
                        $('.dead_stock').html(data.dead_quantity);
                        $('.total_weight').html(data.total_weight);
                        $('.item_id').val(data.item_id);
                    }
                });
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

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
                            <i class="fa fa-globe"></i>Chill Room - Total Stock</div>
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

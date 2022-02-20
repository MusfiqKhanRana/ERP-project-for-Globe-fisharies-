
@extends('backend.master')
@section('site-title')
    Metal Detector
@endsection

@section('main-content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <h3 class="page-title bold form-inline">Production
                <small> Metal Detector </small>
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
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet box blue-chambray">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-briefcase"></i>Create Metal Detector
                            </div>
                            <div class="tools">
                            </div>
                        </div>
                        <div class="portlet-body" style="height: auto;">
                            <form class="form-horizontal" role="form" method="post" action="{{route('metal-detector.store')}}">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-md-2 control-label">Date</label>
                                    <div class="col-md-9">
                                        <div class="input-group input-9 date date-picker" data-date-format="dd/mm/yyyy" data-date-viewmode="years">
                                            <input type="text" class="form-control" name="date" id="datepicker1" readonly>
                                            <span class="input-group-btn">
                                                <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-md-2 control-label">Shift</label>
                                    <div class="col-md-9">
                                        <select class="form-control"  name="shift">
                                            <option value="">--Select--</option>
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="C">C</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-md-2 control-label">Section</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" placeholder="Section" id="section" name="section">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-md-2 control-label">Metal Detector</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" placeholder="Metal Detector" id="metal_detector" name="metal_detector">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-md-2 control-label">Time of Testing</label>
                                    <div class="col-md-9">
                                        <input type="time" class="form-control" id="time" name="time">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-md-2 control-label">Ferrous 3.0 mm</label>
                                    <div class="col-md-9">
                                        <select class="form-control"  name="ferrous">
                                            <option value="">--Select--</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-md-2 control-label">Non Ferrous 4.0 mm</label>
                                    <div class="col-md-9">
                                        <select class="form-control"  name="nonferrous">
                                            <option value="">--Select--</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-md-2 control-label">Stqainless Steel 4.0 mm</label>
                                    <div class="col-md-9">
                                        <select class="form-control"  name="stainless_steel">
                                            <option value="">--Select--</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                                {{-- <div class="form-group">
                                    <label for="inputEmail1" class="col-md-2 control-label">Poly Bags</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="poly_bag" name="poly_bag">
                                    </div>
                                </div> --}}
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-md-2 control-label">Monitoring Person</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" placeholder="Monitoring Person" id="monitoring_person" name="monitoring_person">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-md-2 control-label">QC Supervisor</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" placeholder="QC Supervisor" id="qc_supervisor" name="qc_supervisor">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-md-2 control-label">Verifying Person</label>
                                    <div class="col-md-9">
                                        @php
                                             $verify = Auth::User()->name;
                                        @endphp
                                       
                                        <input type="text" class="form-control" value="{{$verify}}" id="verifying_person" name="verifying_person" readonly>
                                    </div>
                                </div>
                                <hr>
                                <input type="hidden" value="" id="provided_item" name="provided_item">
                                <div class="form-group" style="padding:2%">
                                    <label for="inputEmail1" class="col-md-2 control-label">Poly Bags / Inner Box Passerd</label>  
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="product">Prtoduct Name</label>
                                            <input type="text" class="form-control" placeholder="Product Name" id="product" name="product">
                                        </div>
                                        <div class="col-md-2">
                                            <label for="size">Size</label>
                                            <input type="text" class="form-control" placeholder="Size" id="size" name="size">
                                        </div>
                                        <div class="col-md-2">
                                            <label for="brand">Brand</label>
                                            <input type="text" class="form-control" placeholder="Brand" id="brand" name="brand">
                                        </div>
                                        <div class="col-md-2">
                                            <label for="total_ctnc">Total Ctns</label>
                                            <input type="text" class="form-control" placeholder="Total Ctnc" id="total_ctnc" name="total_ctnc">
                                        </div> 
                                        <div class="col-md-1">
                                            <label ></label>
                                            <button type="button"  class="btn btn-success" id="add_items">+  Add </button>
                                        </div>                               
                                    </div>
                                </div>
                                {{-- <div class="form-group" style="padding:2%">
                                    <label for="inputEmail1" class="col-md-2 control-label"></label>  
                                    <div class="row">
                                        <div class="col-md-5">
                                            <input type="number" class="form-control" placeholder="Quantity" id="quantity" name="quantity">
                                        </div>
                                        <div class="col-md-4">
                                            <button type="button" class="btn btn-success" id="add_items">+  Add Performance Info</button>
                                        </div>
                                    </div>                                
                                </div> --}}
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-md-2 control-label">Item</label>
                                    <div class="col-md-9">
                                        <table  class="table table-striped table-bordered table-hover" id="mytable">
                                            <tr>
                                                <th>Prtoduct Name</th>
                                                <th>Size</th>
                                                <th>Brand</th>
                                                <th>Total Ctns</th>
                                                <th>Action</th>
                                            </tr>
                                            <tr>

                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-md-2 control-label">Remark</label>
                                    <div class="col-md-9">
                                        <textarea type="text" class="form-control"  name="remark"></textarea>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <div class="col-md-2 pull-right">
                                        <button type="submit" data-loading-text="Submitting..." class="col-md-12 btn btn btn-info">
                                        <i class="fa fa-plus"></i>  Submit</button>
                                    </div>
                                    <div class="row"><div class=" pull-right ">
                                        <a class="col-md-12 btn btn dark" href="{{route("metal-detector.index")}}">
                                        <i class="fa fa-backward"></i>  Back</a>
                                    </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script src="https://cdn.tiny.cloud/1/uzb665mrkwi59olq2qu3cwqqyebsil4hznmwc45qu4exf7lt/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    $(function() {
        tinymce.init({
            selector: 'textarea',
            // init_instance_callback : function(editor) {
            //     var freeTiny = document.querySelector('.tox .tox-notification--in');
            //     freeTiny.style.display = 'none';
            // }
        });
    });
    
  </script>
  <script type="text/javascript">
    $(document).ready(function () {
    //    var time,c_temp,f_m_r = null;
    var items_array = [];
    function nullmaking(){
            $("#product").val(null);
            $("#size").val(null);
            $("#brand").val(null);
            $("#total_ctnc").val(null);
        }
    $("#add_items").click(function(){
        console.log($("#product").val());
            items_array.push({"product":$("#product").val(),"size":$("#size").val(),"brand":$("#brand").val(),"total_ctnc":$("#total_ctnc").val(),"status":"stay"});
            $("#provided_item").val('');
            $("#provided_item").val(JSON.stringify(items_array));
            $.each( items_array, function( key, item ) {
                // console.log(item);
                if (item.status == "stay") {
                    if(items_array.length-1 == key){
                        $("table#mytable tr").last().before("<tr id='"+key+"'><td>"+item.product+"</td><td>"+item.size+"</td><td>"+item.brand+"</td><td>"+item.total_ctnc+"</td><td><button class='btn btn-danger delete_item' data-id='"+key+"'>Delete</button></td></tr>");
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
            nullmaking();
    });
        
    });
</script>
<script>
    $(document).ready(function() {
        $('#datepicker1').val(moment(moment().toDate()).format('MM/DD/YYYY'));
        });
</script>

@endsection




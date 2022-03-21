
@extends('backend.master')
@section('site-title')
    Add Supplier
@endsection

@section('main-content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <h3 class="page-title" class="portlet box dark">Production Management
                <small>Add Supplier</small>
            </h3>
            <div class="caption pull-right">
                <a class="btn green-meadow pull-right" data-toggle="modal" href="#addModal">
                    Add New Records
                <i class="fa fa-plus"></i> </a>
            </div>
            <hr>
            <br><br>
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
                        <form method="post" action="{{--route('.store')--}}" class="form-horizontal">
                            {{csrf_field()}}
                            <div class="col-md-12 ">
                                <div class="portlet-body">
                                    <div class="form-body">
                                        <div class="form-group">
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-1 control-label"><h4><b>Items</b></h4></label>
                                            @foreach($lists as $key=> $data)
                                            <tr id="row1">
                                                <td>
                                                    <table class="table table-striped table-bordered table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>Check To All Supplier.</th>
                                                                <th>Item Name</th>
                                                                <th>Grade Name</th>
                                                                <th>Quantity(kg)</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($data->production_supply_list_items as $key2=> $item)
                                                                <tr>
                                                                    <th>
                                                                        <input type="checkbox">
                                                                    </th>
                                                                    <th>{{$item->name}}</th>
                                                                    <th>{{$item->grade->name}}</th>
                                                                    <th>{{$item->pivot->quantity}}</th>  
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <div class="col-md-2 pull-right">
                                        <button type="submit" data-loading-text="Submitting..." class="col-md-12 btn btn btn-info">
                                        <i class="fa fa-plus"></i>  Submit</button>
                                    </div>
                                    {{-- <div class="row"><div class=" pull-right ">
                                        <a class="col-md-12 btn btn dark" href="{{route("medical_report.index")}}">
                                        <i class="fa fa-backward"></i>  Back</a>
                                    </div> --}}
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
<script src="https://cdn.tiny.cloud/1/i2a8bjsghb2egjws1cli2w9fcs5ke9j47f8jhfky1sq28f5q/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    $(function() {
        tinymce.init({
            selector: 'textarea',
            init_instance_callback : function(editor) {
                var freeTiny = document.querySelector('.tox .tox-notification--in');
                freeTiny.style.display = 'none';
            }
        });
    });
    
  </script>
@endsection




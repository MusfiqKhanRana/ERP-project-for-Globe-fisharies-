@extends('backend.master')
@section('site-title')
    inventory store-in
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
                        swal("{{Session::get('msg')}}","", "success");
                    });
                </script>
            @endif
            <!-- BEGIN PAGE TITLE-->
            <h3 class="page-title bold">Requisition
                <small> Requisition-managment </small>
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
            <div class="portlet box blue-chambray">
                <div class="portlet-title">
                <div class="caption">
                <i class="fa fa-briefcase"></i>Store-In List
                </div>
                </div>
                <div class="portlet-body">
                    <div class="table-scrollable">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Item Name</th>
                                <th>Type</th>
                                <th>Varient</th>
                                <th>Grade</th>
                                <th>Quantity(kg)</th>
                                <th style="text-align: center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($ppu as $key=> $data)
                                    <tr id="row1">
                                        <td class="text-align: center;"> {{$data->production_processing_item->name}}</td>
                                        <td class="text-align: center;"> {{$data->processing_name}}</td>
                                        <td class="text-align: center;"> {{$data->processing_variant}}</td>
                                        <td class="text-align: center;"> 
                                            @foreach ($data->production_processing_grades as $item)
                                                @if ($item->block_name != null)
                                                    <li>Block : {{$item->block_name}} KG</li>
                                                    <li>Block Size: {{$item->block_size}}</li>
                                                @endif
                                                @if ($item->grade_id != null)
                                                    <li>Grade Name : {{$item->grade_name}}</li>
                                                @endif
                                                @if ($item->grade_id == null && $item->block_id == null)
                                                    <p style="color: red">Not Selected</p>
                                                @endif
                                            @endforeach
                                        </td>
                                        <td class="text-align: center;"> {{$data->alive_quantity+$data->dead_quantity}}</td>
                                        <td style="text-align: center">
                                            @if ($data->store_in_status=='Initial')
                                                <a class="btn btn-info"  data-toggle="modal" href="{{route('microbiological.test.report.genarate',$data->id)}}"><i class="fa fa-edit"></i>QC Form</a>
                                            @endif
                                            @if ($data->store_in_status=='QC_checked')
                                                <a class="btn btn-success"  data-toggle="modal" href="{{route('metal-detector.show',$data->id)}}"><i class="fa fa-edit"></i>MD Form</a>
                                            @endif
                                            @if ($data->store_in_status=='MD_checked')
                                                <a class="btn green"  data-toggle="modal" href="#move_to_storeModal{{$data->id}}"><i class="fa fa-edit"></i>Move to Store</a>
                                            @endif
                                        </td>
                                    </tr>  
                                    <div id="move_to_storeModal{{$data->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                        {{csrf_field()}}
                                        <input type="hidden" value="" id="delete_id">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h2 class="modal-title" style="color: rgb(75, 65, 65);">Add Products</h2>
                                                </div>
                                                <br>
                                                <div class="modal-body">
                                                    <div class="m-5 row">
                                                        <form action="{{route('requisition-product.store')}}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="requisition_id" value="{{$data->id}}">
                                                            <input type="hidden" class="modalParty" value="{{$data->party->id}}">
                                                            <div class="col-md-3">
                                                                <label for="category">Party</label><br>
                                                                    Party Code : <b>{{$data->party->party_code}}</b>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label for="category">Product</label>
                                                                <select class="form-control select2me productxx" name="product_id"  placeholder="Product" required>                
                                                                </select>
                                                            </div>
                                                            {{-- <div class="col-md-3">
                                                                <label for="">Packet</label>
                                                                <input name="packet" class="form-control" type="number" required placeholder="Packet">
                                                            </div> --}}
                                                            <div class="col-md-3">
                                                                <label for="">Packet</label>
                                                                <input name="quantity" class="form-control qtyx" type="number" required placeholder="Quantity">
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label for="">Weight</label>
                                                                <input class="form-control weightx" type="number" required placeholder="Quantity">
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label><span>&nbsp;</span></label><br>
                                                                <button class="m-10 btn btn-success">Save</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="modal-footer">
                                                    <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                    {{-- <br>
                                                    <form action="{{route('requisition.destroy',[$data])}}" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="btn red" id="delete"><i class="fa fa-trash"></i>Delete</button>               
                                                    </form> --}}
                                                    {{-- <a type="submit" href="{{route('customer.delete', $data)}}" class="btn red" id="delete"><i class="fa fa-trash"></i> Delete</a> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>                     
                                @endforeach
                            </tbody>
                        </table>
                        <div class="row">
                            {{-- <div class="col-md-12 text-center">{{ $employee->links() }}</div> --}}
                            {{ $ppu->links('vendor.pagination.custom') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
     </div>
@endsection
@section('script')

@endsection
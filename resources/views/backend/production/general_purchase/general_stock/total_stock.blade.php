@extends('backend.master')
@section('site-title')
   Disbursement
@endsection 
@section('style')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/i18n/defaults-*.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@endsection
@section('main-content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <span class="page-title" class="portlet box dark"><b>General Stock Total</b>
            </span>
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
            <div class="row">
                <form action="{{route('general.stock.total')}}" class="form-horizontal" method="GET">
                    {{ csrf_field() }}
                    <div class="col-6">
                        <div class="col-md-2">
                            <label for="">Select Date :</label>
                        </div>
                        <div class="col-md-3">
                            <input type="date" name="date" class="form-control">
                        </div>
                        <div class="col-md-1">
                            <button type="submit" class="btn btn-success">Search</button>
                        </div>
                    </div>
                    {{-- @php
                        dd($items->toArray());
                    @endphp --}}
                    {{-- <div class="col-6">
                        <div class="col-md-2">
                            <label for="">Search Item :</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" name="item_name" placeholder="type item name" class="form-control">
                        </div>
                        <div class="col-md-1">
                            <button class="btn btn-success">Search</button>
                        </div>
                    </div> --}}
                </form>
            </div><br><hr>
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet-body" style="height: auto;">
                        <div class="portlet-body">
                            <div class="table-scrollable">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th style="text-align: center"> Serial</th>
                                        <th style="text-align: center;">Item Name</th>
                                        <th style="text-align: center"> Unit</th>
                                        <th style="text-align: center"> Opening Stock</th>
                                        <th style="text-align: center"> Received</th>
                                        <th style="text-align: center"> Total</th>
                                        <th style="text-align: center"> Daily Issue</th>
                                        <th style="text-align: center"> Balance</th>
                                        {{-- <th style="text-align: center"> Remark</th> --}}
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($items as $key=> $data)
                                            <tr id="row1">
                                                @php
                                                    dd($data->toArray());
                                                @endphp
                                                <td>#</td>
                                                <td class="text-align: center;"> {{$key}}</td>
                                                @foreach ($data->requisitions as $item)
                                                    @php
                                                        dd($item);
                                                    @endphp
                                                @endforeach
                                                <td class="text-align: center;"> null</td>
                                                <td class="text-align: center;">Null</td>
                                                <td class="text-align: center;">Null</td>
                                                <td class="text-align: center;"> null</td>
                                                <td class="text-align: center;">Null</td>
                                                <td class="text-align: center;">Null</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                {{-- <div class="col-md-12 text-center">{{ $employee->links() }}</div> --}}
                                {{-- {{ $production_requisition->withQueryString()->links('vendor.pagination.custom') }} --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script>
    
</script>
@endsection
@extends('backend.master')
@section('site-title')
    Edit Loan
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
            <!-- BEGIN PAGE CONTENT-->
            <div class="row">
                <div class="col-md-12">

                    <div class="portlet box blue-ebonyclay">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-edit"></i>Edit Purchase
                            </div>
                            <div class="tools">
                            </div>
                        </div>

                        <div class="portlet-body form">

                            <form method="POST" action="{{route('update.purchase',$purchase->id )}}" accept-charset="UTF-8" class="form-horizontal form-bordered">
                                {{csrf_field()}}
                                {{method_field('put')}}
                                <div class="form-body">

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Amount: <span class="required">
                                            * </span>
                                        </label>
                                        <div class="col-md-6">
                                            <input type="number" class="form-control" required name="amount" value="{{$purchase->amount}}" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-2">Date: </label>
                                        <div class="col-md-6">
                                            <div class="input-group input-medium date date-picker"  data-date-format="yyyy-mm-dd" data-date-viewmode="years">
                                                <input type="text" class="form-control" name="date" value="{{$purchase->date}}" readonly >
                                                <span class="input-group-btn">
                                                    <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Detail: <span class="required">
                                            * </span>
                                        </label>
                                        <div class="col-md-6">
                                            <textarea class="form-control" name="detail" rows="6">{!! $purchase->detail !!}</textarea>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn blue-ebonyclay col-md-12"><i class="fa fa-check"></i>Update Purchase</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
            </div>
            <!-- END PAGE CONTENT-->
        </div>
    </div>
</div>
@endsection
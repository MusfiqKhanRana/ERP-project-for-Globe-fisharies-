@extends('backend.master')
@section('site-title')
Add Increment
@endsection
@section('main-content')

<div class="page-content-wrapper">

    <div class="page-content">
        @if(Session::has('msg'))
        <script>
            $(document).ready(function(){
                swal("{{Session::get('msg')}}","", "success");
            });
        </script>
        @endif


        <h3 class="page-title"><b>HR Management</b><sub>(Add Increment)</sub></h3>

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
        <hr>
        <div class="portlet box">
            <div class="portlet-body">
                <div class="row" style="margin-bottom: 2%">
                    <div class="col-md-4">
                        <label for="">Department</label>
                        <input class="form-control" type="text">
                    </div>
                    <div class="col-md-4">
                        <label for="">Designation</label>
                        <input class="form-control" type="text">
                    </div>
                    <div class="col-md-4">
                        <label for="">Employee Name</label>
                        <input class="form-control" type="text">
                    </div>
                </div>
                <div class="row" style="margin-bottom: 3%">
                    <div class="col-md-4">
                        <label for="">Applied From</label>
                        <input class="form-control" type="text">
                    </div>
                    <div class="col-md-4">
                        <label for="">Increment Amount</label>
                        <input class="form-control" type="text">
                    </div>
                    <div class="col-md-4">
                        <label for="">Type</label>
                        <input class="form-control" type="text">
                    </div>
                </div>
                <div class="row" style="margin-bottom: 2%">
                    <div class="col-md-4">
                        <label for=""><b>Previous Salary:</b></label>
                    </div>
                    <div class="col-md-4">
                        <label for=""><b>Total Salary:</b></label>
                    </div>
                    <div class="col-md-4">
                        <Button class="btn btn-success">Submit</Button>
                    </div>
                </div>
                <hr>
                <div class="portlet-body">
                    <div class="table-scrollable">
                        <table class="table table-striped table-bordered table-hover" id="order_table">
                            <thead>
                            <tr>
                                <th scope="col"> Employee ID </th>
                                <th scope="col"> Employee Name </th>
                                <th scope="col"> DEpartment & Designation</th>
                                <th scope="col"> Increment/Decrement Info </th>
                                <th scope="col"> Total Salary </th>
                                <th scope="col"> Action </th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

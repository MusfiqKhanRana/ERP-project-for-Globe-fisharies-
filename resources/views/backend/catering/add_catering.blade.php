@extends('backend.master')
@section('site-title')
    Add Food To Comapny
@endsection
@section('main-content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        @if(Session::has('msg'))
            <script>
                $(document).ready(function(){
                    swal("{{Session::get('msg')}}","", "success");
                });
            </script>
        @endif
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <h3 class="page-title">Add Catering System
                <small> Office-managment </small>
            </h3>
            <hr>
            <!-- END PAGE TITLE-->

            <div class="row">
                <div class="col-md-12">
                    <form action="{{route('send.food,company')}}" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="invoice_id" value="{{$a = time().rand()}}">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-body">
                                    <div class="form-group clearfix">
                                       
                                        <div class="col-md-6">
                                             <strong class="col-md-12">Company Name</strong>
                                            <select class="form-control" name="comapany_id">
                                                @foreach($company as $data)
                                                    <option value="{{$data->id}}">{{$data->	office_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-6">
                                            <strong class="col-md-12">Package Select</strong>
                                            <select class="form-control" name="package_id">
                                                @foreach($package as $data)
                                                    <option value="{{$data->id}}">{{$data->package_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group clearfix">
                                        <div class="col-md-6">
                                            <strong class="col-md-12">Quantity</strong>
                                            <div class="input-group">
                                                <input type="number" class="form-control" required name="quantity">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
                                                    </span>
                                            </div>
                                        </div>

                                         
                                        <div class="col-md-6">
                                            <strong class="col-md-12">Trasaction Select</strong>
                                            <label class="radio-inline"><input id="due" type="radio" value="0" name="payment">Advance</label>

                                            <input style="display: none" id="due_amount" placeholder="Advance Amount" type="number"  name="due_amount">

                                            <label class="radio-inline"><input type="radio" id="paid" value="1" required name="payment">Paid</label>
                                        </div>
                                    </div>

                                    <div class="form-group clearfix">
                                        <strong class="col-md-12">Description</strong>
                                        <div class="col-md-12">
                                            <textarea class="form-control" name="description" placeholder="Not Required" rows="5"></textarea>
                                        </div>
                                    </div>

                            

                                    <div class="form-group clearfix">
                                        <div class="col-md-12">
                                            <button class="btn btn-info col-md-12" type="submit" ><i class="fa fa-paper-plane" aria-hidden="true"></i>
                                                Order Accept</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $(document).on('click', '#due', function () {
                $("#due_amount").show();
             });
            $(document).on('click', '#paid', function () {
                $("#due_amount").hide();
            });
        });
    </script>
@endsection
@extends('backend.master')
@section('site-title')
    Disburse Salary
@endsection
@section('style')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/i18n/defaults-*.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@endsection
@section('main-content')
    <!-- BEGIN CONTENT -->
    <!-- BEGIN PAGE TITLE-->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
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
            @if(Session::has('msg'))
                <script>
                    $(document).ready(function(){
                        swal("{{Session::get('msg')}}","", "success");
                    });
                </script>
            @endif
            <h3 class="page-title bold">HR Management
            </h3>
            <div class="portlet box blue-chambray">
                <div class="portlet-title">
                <div class="caption">
                <i class="fa fa-briefcase"></i>Disburse Salary List
                </div>
                    <div class="tools">
                    </div>
                </div>
            </div>
            {{-- <a class="btn btn-danger" href="#"><i class="fa fa-user"></i> Executive</a>
            <a class="btn btn-success" href="#"><i class="fa fa-user"></i> Manager </a>
            <a class="btn btn-info" href="#"><i class="fa fa-user"></i> Jr. Executive</a>
            <a class="btn grey-mint" href="#"><i class="fa fa-user"></i> Admin </a> --}}
            
                @foreach ($designation as $item)

                  <small><button class="nav-link btn btn-info" style="margin:3px" href="#" role="tab" aria-controls="home" aria-selected="true">
                      {{$item->deg_name}}
                  </button>
                </small>
                @endforeach

                <div class="portlet-body">
                    <div class="table-scrollable">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th></th>
                                <th>Id</th>
                                <th>Employee Info.</th>
                                <th>Gross Salary</th>
                                <th>Addition</th>
                                <th>Deduction.</th>
                                <th>Net Paybele</th>
                                <th>Attendance Info.</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr id="row1">
                                    <td><input type="checkbox" id="vehicle1" name="vehicle1" value="Bike"></td>
                                    <td style="text-align: center;"> </td>
                                    <td style="text-align: center;"></td>
                                    <td style="text-align: center;"></td>
                                    <td style="text-align: center;"></td>
                                    <td style="text-align: center;"></td>
                                    <td style="text-align: center;"></td>
                                    <td style="text-align: center;"></td>
                                </tr> 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

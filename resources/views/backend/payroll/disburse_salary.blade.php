@extends('backend.master')
@section('site-title')
    Disburse Salary
@endsection
@section('main-content')
    <!-- BEGIN CONTENT -->
    <!-- BEGIN PAGE TITLE-->
    <div class="page-content-wrapper">
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
            <h3 class="page-title bold">HR Management</h3>
            <div class="portlet box blue-chambray">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-briefcase"></i>Disburse Salary List
                    </div>
                    <div class="tools"></div>
                </div>
            </div>
            @foreach ($designation as $item)
                <button class="nav-link btn btn-info degsignation" data-id="{{$item->id}}">
                    {{$item->deg_name}}
                </button>
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
                            {{-- <tr id="row1">
                                <td><input type="checkbox" id="vehicle1" name="vehicle1" value="Bike"></td>
                                <td style="text-align: center;"></td>
                                <td style="text-align: center;"></td>
                                <td style="text-align: center;"></td>
                                <td style="text-align: center;"></td>
                                <td style="text-align: center;"></td>
                                <td style="text-align: center;"></td>
                                <td style="text-align: center;"></td>
                            </tr>  --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            var designations = @json($designation)[0];
            getdata(designations.id)
            $('.degsignation').click(function() {
                getdata($(this).data("id"));
            });
            function getdata(id) {
                $.ajax({
                    url: "disburse-salary/"+id,
                    type: 'GET',
                    success: function(data) {
                        // console.log(data);
                        var employeeTable = $('#tblEmployee tbody');
                        employeeTable.empty();
                        $('#tblEmployee').show();
                    }
                });
            }
        });
    </script>
@endsection
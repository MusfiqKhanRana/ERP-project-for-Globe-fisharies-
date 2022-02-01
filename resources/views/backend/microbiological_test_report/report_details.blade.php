@extends('backend.master')
@section('site-title')
Microbiological Test Report
@endsection
@section('style')
    <style>
        #sample_2_filter label {
            float: right;
        }
        .portlet.box .dataTables_wrapper .dt-buttons {
            margin-top: -48px;
        }
        .dt-button.buttons-pdf.btn.default {
            margin-top: -5px;
            margin-left: 5px;
            margin-right: 5px;
        }
        .dt-button.buttons-print.btn.default {
            margin-top: -5px;
        }
        .dt-button.buttons-pdf.btn.default {
            margin-top: -5px;
        }
        .dt-button.buttons-csv.btn.default {
            margin-top: -5px;
        }
    </style>
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
            <h3 class="page-title">Microbiological Test Reports

            </h3>
            <hr>

            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box">
                {{-- <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-globe">Microbiological Test Reports</i></div>
                    <div class="tools"> </div>
                </div> --}}
                <div class="portlet-body">
                    <div class="col-6">
                        <label for=""> 1. Sample</label>
                        <div class="form-group row" style="margin-left:2%;">
                            <label class="col-md-3 control-label">a. Received From :</span></label>
                            <div class="col-md-3">
                                <p><b>{{$report->coldstorage->name}}</b></p>
                            </div>
                        </div>
                        <div class="form-group row" style="margin-left:2%;">
                            <label class="col-md-3 control-label">b. Species & type :</span></label>
                            <div class="col-md-3">
                                <p><b>{{$report->spacies_type}}</b></p>
                            </div>
                        </div>
                        <div class="form-group row" style="margin-left:2%;">
                            <label class="col-md-3 control-label">c. Size/Count :</span></label>
                            <div class="col-md-3">
                                <p><b>{{$report->size_count}}</b></p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 control-label">2. Date of Production:</span></label>
                            <div class="col-md-3">
                                <p><b>{{$report->date_of_production}}</b></p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 control-label">3. Date of Collection :</span></label>
                            <div class="col-md-3">
                                <p><b>{{$report->date_of_collection}}</b></p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 control-label">4. Date of test inception :</span></label>
                            <div class="col-md-3">
                                <p><b>{{$report->date_of_test_inception}}</b></p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 control-label">5. Date of test Completion :</span></label>
                            <div class="col-md-3">
                                <p><b>{{$report->date_of_test_completion}}</b></p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 control-label">6. Incubation Tempature & time :</span></label>
                            <div class="col-md-3">
                                <p><b>{{$report->party_name}}</b></p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 control-label">7. Microbial Test Result :</span></label>
                        </div>
                    </div>
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th> Serial </th>
                            <th> Test OF MICROBES</th>
                            <th> STANDARD LIMIT </th>
                            <th> TEST RESULT </th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>01.</td>
                                <td>SPC/gm</td>
                                <td>05 x 10<sup>5</sup></td>
                                <td> <p><b>{{$report->spc}}</b></p></td>
                            </tr>
                            <tr>
                                <td>02.</td>
                                <td>Coliform/gm</td>
                                <td>Less than 100</td>
                                <td><p><b>{{$report->coliform}}</b></p></td>
                            </tr>
                            <tr>
                                <td>03.</td>
                                <td>Faecal Coliform/E. coli/gm</td>
                                <td>Less than 05</td>
                                <td><p><b>{{$report->faecal_coliform}}</b></p></td>
                            </tr>
                            <tr>
                                <td>04.</td>
                                <td>Staphylococcus aureus/gm</td>
                                <td>50</td>
                                <td><p><b>{{$report->staphylococcus_aureus}}</b></p></td>
                            </tr>
                            <tr>
                                <td>05.</td>
                                <td>Salmonella/25gm</td>
                                <td>Absent</td>
                                <td><p><b>{{$report->salmonella}}</b></p></td>
                            </tr>
                            <tr>
                                <td>06.</td>
                                <td>Vibrio Cholerae/25 gm</td>
                                <td>Absent</td>
                                <td><p><b>{{$report->vibrio_cholerae}}</b></p></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="form-group row">
                        <label class="col-md-3 control-label">8. Remarks :</span></label>
                        <div class="col-md-6">
                            <p><b>{{$report->remark}}</b></p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 control-label">9.Overall Remarks :</span></label>
                        <div class="col-md-6">
                            <p><b>{{$report->overall_remarks}}</b></p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
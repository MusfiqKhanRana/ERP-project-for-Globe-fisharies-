@extends('backend.master')
@section('site-title')
    Delay/Late Application
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
            <h3 class="page-title bold"> Delay/Late Application
                {{-- <a class="btn grey-salt pull-right" data-toggle="modal" href="{{route('notice.add')}}">
                    Add New Notice
                    <i class="fa fa-plus"></i> </a> --}}
            </h3>
            <!-- END PAGE TITLE-->

            <hr>
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet box grey-salt">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-clipboard"></i>Application Lists
                            </div>
                        </div>

                        <div class="portlet-body">


                            <table class="table table-striped table-bordered table-hover" id="notices">
                                <thead>
                                <tr>
                                    <th> Sl. </th>
                                    <th> Employee Name </th>
                                    <th> Application For </th>
                                    <th> Late/delay Time</th>
                                    <th> Applied Date </th>
                                    <th> Action </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($attendanceShowCases as $key=>$attendanceShowCase)
                                <tr >
                                    <td>{{ $attendanceShowCases->firstItem()+$loop->index }}</td>
                                    <td>{{$attendanceShowCase->employee->name}}</td>
                                    <td>{{$attendanceShowCase->type}}</td>
                                    <td>
                                        <ul>
                                            <li>In Time:{{$attendanceShowCase->attendance->date}}</li>
                                        </ul>
                                    </td>
                                    <td>
                                        {{$attendanceShowCase->created_at}}
                                    </td>
                                    <td>
                                        <a class="btn green view_application" data-toggle="modal" href="#viewApplicationModal" data-application="{{$attendanceShowCase->showcase_note}}">View Application</a>
                                        <a class="btn grey-salt accept_application" data-toggle="modal" href="#acceptApplicationModal" data-status="true" data-application="{{json_encode($attendanceShowCase)}}">Accept Application</a>
                                        <a class="btn red reject_application" data-toggle="modal" href="#rejectApplicationModal" data-status="false" data-application="{{$attendanceShowCase}}">Reject Application</a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div id="acceptApplicationModal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                        <h2 class="modal-title" style="color: red;">Do you want to Accept the Application</h2>
                                    </div>
                                    <div class="modal-body">
                                        <div class="portlet">
                                            <div class="portlet-body">
                                <form action="{{route('attendance.show-cause.change-status')}}" method="POST">
                                    @csrf
                                            <p>If yes,Please Choose the confirm Button</p>
                                            <input type="hidden" name="status" class="status" value="">                
                                            <input type="hidden" name="application" class="application" value="">                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" data-dismiss="modal" class="btn default">Close</button>
                                        <button type="submit" class="btn btn-warning"><i class="fa fa-check"></i>Confirm</button>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                        <div id="rejectApplicationModal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                        <h2 class="modal-title" style="color: red;">Do you want to Reject the Application</h2>
                                    </div>
                                    <div class="modal-body">
                                        <div class="portlet">
                                            <div class="portlet-body">
                                <form action="{{route('attendance.show-cause.change-status')}}" method="POST">
                                    @csrf
                                            <p>If yes,Please Choose the confirm Button</p>
                                            <input type="hidden" name="status" class="status" value="">                
                                            <input type="hidden" name="application" class="application" value="">                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" data-dismiss="modal" class="btn default">Close</button>
                                        <button type="submit" class="btn btn-warning"><i class="fa fa-check"></i>Confirm</button>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                        <div id="viewApplicationModal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                            {{csrf_field()}}
                            <input type="hidden" value="" id="delete_id">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                        <h2 class="modal-title" style="color: red;">Application</h2>
                                    </div>
                                    <div class="modal-body">
                                        <div class="portlet">
                                            <div class="portlet-body">
                                                <div id="application_show">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" data-dismiss="modal" class="btn default">Close</button>
                                        {{-- <button class="btn red"><i class="fa fa-trash"></i>Delete</button>   --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                    {{ $attendanceShowCases->links('vendor.pagination.custom') }}
                </div>
            </div>
            <!-- END PAGE CONTENT-->
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        $(function() {
            $('.view_application').click(function(){
                console.log($(this).data('application'));
                $('#application_show').html($(this).data('application'));
            })
            $('.accept_application').click(function(){
                // console.log($(this).data('application'));
                $('.status').val($(this).data('status'));
                $('.application').val(JSON.stringify($(this).data('application')));
            })
            $('.reject_application').click(function(){
                // console.log($(this).data('application'));
                $('.status').val($(this).data('status'));
                $('.application').val(JSON.stringify($(this).data('application')));
            })
        });
    </script>
@endsection
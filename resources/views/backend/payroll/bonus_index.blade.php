
@extends('backend.master')
@section('site-title')
Bonus Records
@endsection
@section('css')
    <style>
        .searchbox {
    border:1px solid #456879;
    border-radius:6px;
    height: 22px;
    width: 200p;
    margin-top: 5px;
}
    </style>
@endsection
@section('main-content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <h3 class="page-title" class="portlet box dark">Employee Bonus Records
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
                <i class="fa fa-briefcase"></i>Employee Bonus List
                </div>
                    <div class="caption pull-right">
                        <a class="btn green-meadow pull-right" data-toggle="modal" href="#addModal">
                            Add New Records
                        <i class="fa fa-plus"></i> </a>
                    </div>
                    <div class="tools">
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-scrollable">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Serial</th>
                                <th>Bonus Id</th>
                                <th>Date</th>
                                <th>Name</th>
                                <th>Amount</th>
                                <th>Bonus Category</th>
                                <th>Remark</th>
                                <th style="text-align: center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($bonus as $key=> $data)
                                    <tr id="row1">
                                        <td>{{ $data->id }}</td>
                                        <td class="text-align: center;"> {{$data->bonus_code}}</td>
                                        <td class="text-align: center;"> {{$data->date}}</td>
                                        <td class="text-align: center;"> {{$data->user->name}}</td>
                                        <td class="text-align: center;"> {{$data->amount}}</td>
                                        <td class="text-align: center;"> {{$data->bonus_category}}</td>
                                        <td class="text-align: center;"> {{$data->remark}}</td>
                                        <td style="text-align: center">
                                            <a class="btn btn-info"  data-toggle="modal" href="#editModal{{$data->id}}"><i class="fa fa-edit"></i> Edit</a>
                                            <a class="btn red" data-toggle="modal" href="#deleteModal{{$data->id}}"><i class="fa fa-trash"></i> Delete</a>
                                        </td>
                                    </tr>
                                    <div id="deleteModal{{$data->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                        {{csrf_field()}}
                                        <input type="hidden" value="" id="delete_id">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h2 class="modal-title" style="color: red;">Are you sure?</h2>
                                                </div>
                                                <div class="modal-footer " >
                                                    <div class="d-flex justify-content-between">
                                                        <button type="button"data-dismiss="modal"  class="btn default">Cancel</button>
                                                    </div>
                                                    <div class="caption pull-right">
                                                        <form action="{{route('bonus.destroy',[$data->id])}}" method="POST">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button class="btn red" id="delete"><i class="fa fa-trash"></i>Delete</button>               
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="editModal{{$data->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h4 class="modal-title">Update Production Test</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="form-horizontal" role="form" method="post" action="{{route('bonus.update', $data->id)}}">
                                                        {{csrf_field()}}
                                                        {{method_field('put')}}
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <label for="inputEmail1" class="col-md-2 control-label">Date</label>
                                                                <input type="date" class="form-control" value="{{$data->date}}" required name="date">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <label for="inputEmail1" class="col-md-2 control-label">Name</label>
                                                                <select class="form-control" name="user_id" required>
                                                                    @foreach($users as $user)
                                                                        <option value="{{$user->id}}" {{ $data->user->id == $user->id ? 'selected' : '' }}>{{$user->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <label for="inputEmail1" class="col-md-2 control-label">Amount</label>
                                                                <input type="text" class="form-control" value="{{$data->amount}}" required name="amount" >
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <label for="inputEmail1" class="col-md-2 control-label">Bonus Category</label>
                                                                <select class="form-control" name="bonus_category" required>
                                                                    <option value="{{$data->bonus_category}}">{{$data->bonus_category}}</option>
                                                                    <option value="Festival" >Festival</option>
                                                                    <option value="Performance" >Performance</option>
                                                                    <option value="Donation">Donation</option>
                                                                    <option value="Other" >Other</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <label for="inputEmail1" class="col-md-2 control-label">Remark</label>
                                                                <input type="text" class="form-control" value="{{$data->remark}}" name="remark">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                            <button type="submit" class="btn red-flamingo"><i class="fa fa-floppy-o"></i> Update</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div id="addModal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h4 class="modal-title">Add New Bonus Record</h4>
                            </div><br>
                            <form class="form-horizontal" role="form" method="post" action="{{route('bonus.store')}}">
                                {{csrf_field()}}
            
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-md-2 control-label">Date</label>
                                    <div class="col-md-8">
                                        <input type="date" class="form-control" name="date" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Name</label>
                                    <div class="col-md-8">
                                        <select class="form-control" name="user_id" id="listBox1" required>
                                            <option value="" selected>--select--</option>
                                            @foreach($users as $user)
                                                <option value="{{$user->id}}" >{{$user->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-md-2 control-label">Amount</label>
                                    <div class="col-md-8">
                                        <input type="number" class="form-control" name="amount" placeholder="" required  >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-md-2 control-label">Bonus Category</label>
                                    <div class="col-md-8">
                                        <select class="form-control" name="bonus_category" required>
                                            <option value="" selected>-- Select Bonus Category --</option>
                                            <option value="Festival" >Festival</option>
                                            <option value="Performance" >Performance</option>
                                            <option value="Donation">Donation</option>
                                            <option value="Other" >Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-md-2 control-label">Remark</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="remark" placeholder="Type Remark" >
                                    </div>
                                </div>
                                    <input type="hidden" class="form-control" name="bonus_code">
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                    <button type="submit" class="btn blue-ebonyclay"><i class="fa fa-floppy-o"></i> Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
{{-- @section('script')
<script type="text/javascript">
$(document).ready(function ($) {

    $.fn.searchit = function (options) {

        return this.each(function () {

            $.fn.searchit.globals = $.fn.searchit.globals || {
                counter: 0
            }
            $.fn.searchit.globals.counter++;
            var $counter = $.fn.searchit.globals.counter;

            var $t = $(this);
            var opts = $.extend({}, $.fn.searchit.defaults, options);

            // Setup default text field and class
            if (opts.textField == null) {
                $t.before("<input type='textbox' id='__searchit" + $counter + "'><br>");
                opts.textField = $('#__searchit' + $counter);
            }
            if (opts.textField.length > 1) opts.textField = $(opts.textField[0]);

            if (opts.textFieldClass) opts.textField.addClass(opts.textFieldClass);
            //MY CODE-------------------------------------------------------------------
            if (opts.selected) opts.textField.val($(this).find(":selected").val());
            //MY CODE ENDS HERE -------------------------------------------------------
            if (opts.dropDown) {
                $t.css("padding", "5px")
                    .css("margin", "-5px -20px -5px -5px");

                $t.wrap("<div id='__searchitWrapper" + $counter + "' />");
                opts.wrp = $('#__searchitWrapper' + $counter);
                opts.wrp.css("display", "inline-block")
                    .css("vertical-align", "top")
                    .css("overflow", "hidden")
                    .css("border", "solid grey 1px")
                    
                    .hide();
                if (opts.dropDownClass) opts.wrp.addClass(opts.dropDownClass);
            }

            opts.optionsFiltered = [];
            opts.optionsCache = [];

            // Save listbox current content
            $t.find("option").each(function (index) {
                opts.optionsCache.push(this);
            });

            // Save options 
            $t.data('opts', opts);

            // Hook listbox click
            $t.click(function (event) {
                _opts($t).textField.val($(this).find(":selected").text());
                _opts($t).wrp.hide();
                event.stopPropagation();
            });

            // Hook html page click to close dropdown
            $("html").click(function () {
                _opts($t).wrp.hide();
            });

            // Hook the keyboard and we're done
            _opts($t).textField.keyup(function (event) {
                if (event.keyCode == 13) {
                    $(this).val($t.find(":selected").text());
                    _opts($t).wrp.hide();
                    return;
                }
                setTimeout(_findElementsInListBox($t, $(this)), 50);
            })

        })


        function _findElementsInListBox(lb, txt) {

            if (!lb.is(":visible")) {
                _showlb(lb);
            }

            _opts(lb).optionsFiltered = [];
            var count = _opts(lb).optionsCache.length;
            var dropDown = _opts(lb).dropDown;
            var searchText = txt.val().toLowerCase();

            // find match (just the old classic loop, will make the regexp later)
            $.each(_opts(lb).optionsCache, function (index, value) {
                if ($(value).text().toLowerCase().indexOf(searchText) > -1) {
                    // save matching items 
                    _opts(lb).optionsFiltered.push(value);
                }

                // Trigger a listbox reload at the end of cycle    
                if (!--count) {
                    _filterListBox(lb);
                }
            });
        }

        function _opts(lb) {
            return lb.data('opts');
        }

        function _showlb(lb) {
            if (_opts(lb).dropDown) {
                var tf = _opts(lb).textField;
                lb.attr("size", _opts(lb).size);
                _opts(lb).wrp.show().offset({
                    top: tf.offset().top + tf.outerHeight(),
                    left: tf.offset().left
                });
                _opts(lb).wrp.css("width", tf.outerWidth() + "px");
                lb.css("width", (tf.outerWidth() + 25) + "px");
            }
        }

        function _filterListBox(lb) {
            lb.empty();

            if (_opts(lb).optionsFiltered.length == 0) {
                lb.append("<option>" + _opts(lb).noElementText + "</option>");
            } else {
                $.each(_opts(lb).optionsFiltered, function (index, value) {
                    lb.append(value);
                });
                lb[0].selectedIndex = 0;
            }
        }
    }

    $.fn.searchit.defaults = {
        textField: null,
        textFieldClass: null,
        dropDown: true,
        dropDownClass: null,
        size: 5,
        filtered: true,
        noElementText: "No elements found",
        //MY CODE------------------------------------------
        selected: false
        //MY CODE ENDS ------------------------------------
    }

}(jQuery))

 $("select").searchit({
    textFieldClass: 'searchbox',
    selected: true

});
$(".searchbox").val($("#listBox1 :selected").val())
</script>
@endsection --}}

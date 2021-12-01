<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{$cate->invoice_id}}</title>
    <link href="{{asset('assets/backend/invoice.css')}}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
   

</head>
<body>
    <div id="printInvoice">
        <div class="invoice-box" >
            <table cellpadding="0" cellspacing="0">
                <tr class="top">
                    <td colspan="3">
                        <table>
                            <tr>
                                <td class="title">
                                    <img src="{{asset('assets/images/logo/'.$general->image)}}" style="width:100%; max-width:300px;">
                                </td>

                                <td>
                                    Invoice #: {{$cate->invoice_id}}<br>
                                    Created: {{date('Y,M-d', strtotime($cate->date))}}<br>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr class="information">
                    <td colspan="9">
                        <table>
                            <tr>
                                <td>
                                    {{ $general->title }}.<br>
                                    {{ $general->mobile }}<br>
                                    {{ $general->email }}
                                </td>

                                <td>
                                    {{$cate->customer->full_name}}.<br>
                                    {{$cate->customer->phone}}<br>
                                    {{$cate->customer->email}}
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr class="heading">
                    <td>
                        Item PACKAGE:
                    </td>

                    <td>
                        Quantity
                    </td>

                    <td>
                        Price
                    </td>
                </tr>

                <tr class="item">
                    <td>
                        {{$cate->product->product_name}}
                    </td>

                    <td>
                        {{$cate->quantity}}
                    </td>

                    <td>
                        {{$cate->product->selling_price}} {{ $general->currency}}

                    </td>
                </tr>

                <tr class="total">
                    <td></td>
                    <td></td>

                    <td style="">
                        <b>Total: {{$cate->total_amount}} {{ $general->currency }}</b>
                    </td>
                </tr>


            </table>


        </div>
    </div>
        &nbsp;<a href="{{ URL::previous() }}">Go Back</a>
        <button id="printbtn" class="btn btn-primary" >Print</button>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.js" integrity="sha256-tA8y0XqiwnpwmOIl3SGAcFl2RvxHjA8qp0+1uCGmRmg="
            crossorigin="anonymous"></script>
    <script type="text/JavaScript" src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.0/jQuery.print.js"></script>


    <script>
        jQuery(document).ready(function() {
            $("#printbtn").click(function () {
                $("#printInvoice").print();
            });
        });
    </script>
</body>

</html>



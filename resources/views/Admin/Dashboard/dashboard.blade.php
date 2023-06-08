@extends('Admin.layouts.dashboard')
@section('titel')
Debit Create
@endsection
@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row d-flex">

            <div class="col-md-6 col-lg-3 mb-3">
                <div class="widget-small primary coloured-icon d-flex" style=" box-shadow: 5px 5px 5px 5px lightgray;">
                    <div class="d-flex  align-items-center p-4 bg-primary">
                        <i class="icon fa fa-shopping-cart fa-2x"></i>
                    </div>
                    <div class="info px-3 bg-light">
                        <h5 style="margin-top: 0 !important; padding-top: 0!important;">Yesterday</h5>
                        <p style="padding-top: 0 !important; font-size: 12px !important;"><b>Sale: 0.00 TK</b></p>
                        <p style="padding-top: 0 !important; margin-top: -5px !important; font-size: 12px !important;"><b>Purchase: 0.00 TK</b></p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 mb-3">
                <div class="widget-small primary coloured-icon d-flex" style=" box-shadow: 5px 5px 5px 5px lightgray;">
                    <div class="d-flex  align-items-center p-4 bg-primary">
                        <i class="icon fa fa-shopping-cart fa-2x"></i>
                    </div>
                    <div class="info px-3 bg-light" style="padding-top: 5px !important; padding-left: 5px !important;">
                        <h5 style="margin-top: 0 !important; padding-top: 0!important;">Today</h5>
                        <p style="padding-top: 0 !important; font-size: 12px !important;"><b>Sale: 0.00 TK</b></p>
                        <p style="padding-top: 0 !important; margin-top: -5px !important; font-size: 12px !important;"><b>Purchase: 0.00 TK</b></p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 mb-3">
                <div class="widget-small primary coloured-icon d-flex" style=" box-shadow: 5px 5px 5px 5px lightgray;">
                    <div class="d-flex  align-items-center p-4 bg-primary">
                        <i class="icon fa fa-shopping-cart fa-2x"></i>
                    </div>
                    <div class="info px-3 bg-light" style="padding-top: 5px !important; padding-left: 5px !important;">
                        <h5 style="margin-top: 0 !important; padding-top: 0!important;">Today</h5>
                        <p style="padding-top: 0 !important; font-size: 11px !important;"><b>Income: 0.00 TK</b></p>
                        <p style="padding-top: 0 !important; margin-top: -5px !important; font-size: 11px !important;"><b>Expense:0.00 TK</b></p>
                    </div>
                </div>
            </div>


            <div class="col-md-6 col-lg-3 mb-3">
                <div class="widget-small primary coloured-icon d-flex" style=" box-shadow: 5px 5px 5px 5px lightgray;">
                    <div class="d-flex  align-items-center p-4 bg-primary">
                        <i class="icon fa fa-shopping-cart fa-2x"></i>
                    </div>
                    <div class="info px-3 bg-light" style="padding-top: 5px !important; padding-left: 5px !important;">
                        <h5 style="margin-top: 0 !important; padding-top: 0!important;">Monthly</h4>
                            <p style="padding-top: 0 !important; font-size: 11px !important;"><b>Sale: 9,505.00 TK</b></p>
                            <p style="padding-top: 0 !important; margin-top: -5px !important; font-size: 11px !important;"><b>Purchase: 72,750.00 TK</b></p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 mb-3">
                <div class="widget-small primary coloured-icon d-flex" style=" box-shadow: 5px 5px 5px 5px lightgray;">
                    <div class="d-flex  align-items-center p-4 bg-primary">
                        <i class="icon fa fa-shopping-cart fa-2x"></i>
                    </div>
                    <div class="info px-3 bg-light" style="padding-top: 5px !important; padding-left: 5px !important;">
                        <h5 style="margin-top: 0 !important; padding-top: 0!important;">Monthly</h5>
                        <p style="padding-top: 0 !important; font-size: 11px !important;"><b>Income: 10,000.00 TK</b></p>
                        <p style="padding-top: 0 !important; margin-top: -5px !important; font-size: 11px !important;"><b>Expense: 1,900.00 TK</b></p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="widget-small primary coloured-icon d-flex" style=" box-shadow: 5px 5px 5px 5px lightgray;">
                    <div class="d-flex  align-items-center p-4 bg-danger">
                        <i class="icon fa fa-briefcase fa-2x"></i>
                    </div>
                    <div class="info px-3 bg-light" style="padding-top: 5px !important; padding-left: 5px !important;">
                        <h5 style="margin-top: 0 !important; padding-top: 0!important;">Liabilities</h5>
                        <p style="padding-top: 0 !important; font-size: 12px !important;"><b>Payable Due: 309,428.80 TK</b></p>
                        <p style="padding-top: 0 !important; margin-top: -5px !important; font-size: 12px !important;"><b>Receivable Due: 5,561,856.60 TK</b></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container">
    <h4>Monthly Accounting</h4>
    <canvas id="lineChart"></canvas>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    //line
    var ctxL = document.getElementById("lineChart").getContext('2d');
    var myLineChart = new Chart(ctxL, {
        type: 'line',
        data: {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [{
                    label: "Sales",
                    data: [65, 59, 80, 81, 56, 55, 40],
                    backgroundColor: [
                        'rgba(105, 0, 132, .2)',
                    ],
                    borderColor: [
                        'rgba(200, 99, 132, .7)',
                    ],
                    borderWidth: 2
                },
                {
                    label: "Purchase",
                    data: [28, 48, 40, 19, 86, 27, 90],
                    backgroundColor: [
                        'rgba(0, 137, 132, .2)',
                    ],
                    borderColor: [
                        'rgba(0, 10, 130, .7)',
                    ],
                    borderWidth: 2
                }
            ]
        },
        options: {
            responsive: true
        }
    });
</script>


@endsection
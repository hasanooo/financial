@extends('Admin.layouts.dashboard')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Include Highcharts -->
<script src="https://code.highcharts.com/highcharts.js"></script>

@section('content')
<div class="section">
    <div class="container">
        <div class="row mt-3">
            <div class="col-12">
                <span style="font-size:27px; font-weight:23px;">Balance Sheet</span> <small style="color:gray;"> Overall Balance Sheet</small>
            </div>
        </div>
        <div id="chartContainer" style="width: 100vh; height: 400px;">
        </div>

        <div class="container text-center">
            <h5>
            Asssets Should be Equals to Liability plus Shares.
            </h5>
            <h6>Assets: {{ $asset }} | Liability {{ $liability }} | Shares: {{ $share }}</h6>
        </div>

<script>
$(document).ready(function() {
    
    var equityData ={{ json_encode($share) }};
    var assetData = {{ json_encode($asset) }};
    var liabilityData = {{ json_encode($liability) }};

    // Calculate total values for the chart
    var totalLiabilitiesAndEquity = liabilityData + equityData;

    // Create the chart
    Highcharts.chart('chartContainer', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Balance Sheet'
        },
        xAxis: {
            categories: ['Total Assets', 'Total Liabilities & Equity']
        },
        yAxis: {
            title: {
                text: 'Amount'
            }
        },
        series: [{
            name: 'Amount',
            data: [assetData, totalLiabilitiesAndEquity]
        }]
    });
});
</script>
    {{-- <script>
        $(function(){

            var assetData = {{ json_encode($asset) }};
            var liabilityData = {{ json_encode($liability) }};
            // alert(assetData);
            $("#chart").highcharts({
                chart:{

                },
                title:{
                    text:"Total Balance Sheet"
                },
                xAxis:{

                },
                yAxis:{
                    title:{
                        text:"Rate"
                    }
                },
                series:[{
                    name:"Asset",
                    data:assetData
                },{
                    name:"Liability",
                    data:liabilityData
                }]
            });
        });
    </script> --}}
           

@endsection
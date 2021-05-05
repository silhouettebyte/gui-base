@extends('layouts.base')

@section('content')
    <div class="row">
        <div class="col-sm-6">
            <div class="card prod-p-card bg-behance background-pattern-white">
                <div class="card-body">
                    <div class="row align-items-center m-b-0">
                        <div class="col">
                            <h6 class="m-b-5 text-white">Patient Name</h6>
                            <h3 class="m-b-0 text-white">Archimedes A. Valencia II</h3>
                        </div>
                        <div class="col-auto">
                            <i class="material-icons-two-tone text-white">person</i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card prod-p-card bg-primary background-pattern-white">
                <div class="card-body">
                    <div class="row align-items-center m-b-0">
                        <div class="col">
                            <h6 class="m-b-5 text-white">Device Identifier</h6>
                            <h3 class="m-b-0 text-white">00:00:00:00:00</h3>
                        </div>
                        <div class="col-auto">
                            <i class="material-icons-two-tone text-white">vpn_key</i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card prod-p-card bg-primary background-pattern-white">
                <div class="card-body">
                    <div class="row align-items-center m-b-0">
                        <div class="col">
                            <h6 class="m-b-5 text-white">Device Status</h6>
                            <h3 class="m-b-0 text-gray-300">INACTIVE</h3>
                        </div>
                        <div class="col-auto">
                            <i class="material-icons-two-tone text-white">devices_other</i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-9 my-auto">
                            <h5>Pulse Oximeter Telemetry Data</h5>
                        </div>
                        <div class="col-3">
                            <button type="button" class="btn btn-sm btn-outline-primary float-right">Show History</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div id="pox_chart"></div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-9 my-auto">
                            <h5>Temperature Telemetry Data </h5>
                        </div>
                        <div class="col-3">
                            <button type="button" class="btn btn-sm btn-outline-primary float-right">Show History</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div id="temp_chart"></div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('js')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        var pox_options = {
            series: [{
                name: 'Bpm',
                data: [31, 40, 28, 51, 42, 109, 100]
            }, {
                name: 'SpO2',
                data: [11, 32, 45, 32, 34, 52, 41]
            }],
            chart: {
                height: 200,
                type: 'area'
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth'
            },
            xaxis: {
                type: 'datetime',
                categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
            },
            tooltip: {
                x: {
                    format: 'dd/MM/yy HH:mm'
                },
            },
        };

        var temp_options = {
            series: [{
                name: 'Temperature',
                data: [31, 40, 28, 51, 42, 109, 100]
            }],
            chart: {
                height: 200,
                type: 'area'
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth'
            },
            xaxis: {
                type: 'datetime',
                categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
            },
            tooltip: {
                x: {
                    format: 'dd/MM/yy HH:mm'
                },
            },
        };

        var pox_chart = new ApexCharts(document.querySelector("#pox_chart"), pox_options);
        var temp_chart = new ApexCharts(document.querySelector("#temp_chart"), temp_options);
        pox_chart.render();
        temp_chart.render();
    </script>
@endsection

@section('css')

@endsection
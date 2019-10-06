@extends('layouts.admin')
@push('styles')
    <link rel="stylesheet" href="{{asset('css/highcharts.css')}}">
@endpush
@section('title')
    Empleados
@endsection

@push('styles')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
@endpush
@section('content')
    <div class="container mb-10">
        <div class="row">
            <div class="col-12" align="center">
                <input type="text" class="form-control" id="inputEmployeeId" placeholder="Employee id">
                <br>
                <button class="btn btn-info" onclick="loadChart()">Generar</button>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div id="graphic-container3"></div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div id="graphic-container4"></div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')

    <script src="{{asset('js/highcharts.js')}}"></script>
    <script src="{{asset('js/export-data.js')}}"></script>
    <script src="{{asset('js/exporting.js')}}"></script>
    <script src="{{asset('js/series-label.js')}}"></script>
    <script src="{{asset('js/full-screen.js')}}"></script>
    <script src="https://momentjs.com/downloads/moment.min.js"></script>
    <script src="https://momentjs.com/downloads/moment-timezone-with-data.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    {{--<script src="{{asset('js/dashboard.js')}}"></script>--}}
    <script>
        function loadChart() {
            var employeeId = $('#inputEmployeeId').val();

            if (employeeId === '') {
                return;
            }

            $.ajax({
                type: 'GET', //THIS NEEDS TO BE GET
                url: '/api/queries/get-report-of-processes/' + employeeId,
                success: function (data) {
                    if (data.length == 0) {
                        toastr.warning('Este usuario no es un empleado, no se puede proceder')
                    }
                    prepareDashboard3(data)
                },
                error: function () {
                    console.log(data);
                }
            });

            $.ajax({
                type: 'GET', //THIS NEEDS TO BE GET
                url: '/api/queries/get-cognitive-report-of-processes/' + employeeId,
                success: function (data) {
                    if (data.length == 0) {
                        toastr.warning('Este usuario no es un empleado, no se puede proceder')
                    }
                    console.log(data);
                    prepareDashboard4(data)
                },
                error: function () {
                    console.log(data);
                }
            });
        }

        function prepareDashboard3(data) {

            data.forEach(function (element) {
                element[0] = new Date(element[0]).getTime();
            });

            Highcharts.setOptions({
                global: {
                    useUTC: false
                }
            });

            Highcharts.chart('graphic-container3', {

                title: {
                    text: 'Transactions for Agent'
                },

                xAxis: {
                    type: 'datetime'
                },

                yAxis: {
                    title: {
                        text: null
                    }
                },

                tooltip: {
                    crosshairs: true,
                    shared: true
                },

                legend: {},

                series: [{
                    name: 'Punctuations',
                    data: data,
                    zIndex: 1,
                    marker: {
                        fillColor: 'white',
                        lineWidth: 2,
                        lineColor: Highcharts.getOptions().colors[0]
                    }
                }]
            });
        }

        function prepareDashboard4(data) {

            var emotionNames = [];
            var emotionValues = [];


            data.emotions.forEach(function (value) {
                emotionValues.push(value.count);
                emotionNames.push(value.emotion);
            });

            Highcharts.chart('graphic-container4', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Emotions detected'
                },
                xAxis: {
                    categories: emotionNames,
                    crosshair: true
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Intances'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0,
                        colorByPoint: true
                    }
                },
                series: [{
                    name: 'Emotions',
                    typ: 'column',
                    data: emotionValues
                }]
            });
        }

    </script>

@endpush
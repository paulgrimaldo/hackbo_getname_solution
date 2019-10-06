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
                    console.log(data);
                    prepareDashboard3(data)
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

            console.log(data);


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

    </script>

@endpush
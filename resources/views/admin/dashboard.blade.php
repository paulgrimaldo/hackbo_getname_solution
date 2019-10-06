@extends('layouts.admin')
@push('styles')
    <link rel="stylesheet" href="{{asset('css/highcharts.css')}}">
@endpush
@section('title')
    Inicio
@endsection
@section('content')
    <div class="container mb-10">
        <div class="row">
            <div class="col-12" align="center">
                <div id="graphic-container1"></div>
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
    <script src="{{asset('js/dashboard.js')}}"></script>
@endpush
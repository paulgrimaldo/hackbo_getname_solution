@extends('layouts.app')
@section('title')
    Oops..
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12" align="center">
                <h4>{{$errorMessage}}</h4>
            </div>
        </div>
    </div>
@endsection
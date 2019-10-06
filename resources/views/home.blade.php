@extends('layouts.app')
@section('title')
    Dashboard
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <h1>You are logged in!</h1>
            </div>
        </div>
    </div>
@endsection

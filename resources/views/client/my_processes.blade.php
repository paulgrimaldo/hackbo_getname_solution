@extends('layouts.app')
@section('title')
    Mis procesos
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12" align="center">
                <div class="row">
                    @foreach($processes as $process)
                        <div class="col-lg-3 col-md-6 col-sm-12" style="cursor:pointer">
                            <div class="card">
                                <div class="card-title">
                                    #{{$process->id}} <br>
                                    {{$process->ticket_timestamp}}
                                </div>
                                <div class="card-body">
                                    <a href="{{route('procesos.show',$process->id)}}" role="button"
                                       class="btn btn-info">Ver</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
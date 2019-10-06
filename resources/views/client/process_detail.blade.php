@extends('layouts.app')
@section('title')
    Proceso #{{$process->id}}
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h4>Servicios solicitados</h4>
                <ul>
                    @foreach($services as $service)
                        <li>{{$service->name}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        @if($process->process_init_timestamp!=null &&$process->proces_end_timestamp!=null)
            <div class="row">
                <div class="col-12">
                    <p>Te antendierón a las {{\Carbon\Carbon::parse($process->process_init_timestamp)->hour}} hrs
                        con {{\Carbon\Carbon::parse($process->process_init_timestamp)->minute}} minutos</p>
                    <p>
                        Tu turno terminó a las {{\Carbon\Carbon::parse($process->proces_end_timestamp)->hour}} hrs
                        con {{\Carbon\Carbon::parse($process->proces_end_timestamp)->minute}} minutos
                    </p>
                    <h4>
                        En total estuviste alrededor
                        de {{\Carbon\Carbon::parse($process->process_init_timestamp)->diffInMinutes(\Carbon\Carbon::parse($process->proces_end_timestamp))}}
                        minutos
                    </h4>
                </div>
            </div>
        @endif
        <br>
        @if($process->hasSurvey())
            <h3>Resumen general</h3>
            <div class="row">
                <div class="col-12">
                    @if($generalResume)
                        <img src="{{asset('img/success.png')}}">
                        <br>
                        <br>
                        <p>Has tenido una evaluación positiva de la atención recibida</p>
                        <p>Recuerda que participando en las encuestas puedes obtener beneficios como usuario de nuestro
                            servicio</p>
                    @else
                        <p>Lamentamos que hayas tenido una experiencia regular, la información que ingresas ayuda a
                            mejorar el servicio que te brindamos y te trae beneficios como usuario de nuestro
                            servicio</p>
                    @endif
                </div>
            </div>
        @else
            <div class="row">
                <div class="col-12">
                    No has ingresado una evaluación general de la atención recibida en esta ocasión,
                    por favor ingresa tu resumen general, al hacerlo nos ayudas a mejorar el servicio que te brindamos y
                    accedes a
                    beneficios como usuario de nuestro servicio
                </div>
            </div>
        @endif
    </div>
@endsection
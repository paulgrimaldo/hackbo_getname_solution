@extends('layouts.app')
@section('title')
    Encuesta guardada
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12" align="center">
                <img src="{{asset('img/success.png')}}">
                <br>
                <h2>Encuesta guardada con éxito</h2>
                <p>
                    Gracias por llenar la encuesta, la información ingresada ayuda a mejorar nuestro servicio para tí,
                    tambien te trae beneficios como usuario de nuestro servicio
                </p>
            </div>
        </div>
    </div>
@endsection
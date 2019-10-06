@extends('layouts.app')
@section('title')
    FAQ
@endsection
@section('content')

    <!--
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Seccion de preguntas<h1>
            </div>
        </div>
    </div>
    -->

  <main id="main">

    <section id="why-us" class="wow fadeIn">
      <div class="container">
        <header class="section-header">
          <h3>¿Tienes alguna otra duda?</h3>
          <p>Puedes consultar en nuestra seccion de preguntas frecuentes o iniciar una conversacion con nuestro chatbot para poder aclarar las dudas que tengas</p>
        </header>

        <div class="row row-eq-height justify-content-center">

          <div class="col-lg-4 mb-4">
            <div class="card wow bounceInUp">
                <i class="fa fa-diamond"></i>
              <div class="card-body">
                <h5 class="card-title">Requisitos para solicitud de credito</h5>
                <p class="card-text">Conoce mas sobre los requisitos necesarios para poder realizar la solicitu de un credito.</p>
                <a href="#" class="readmore">Leer mas</a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 mb-4">
            <div class="card wow bounceInUp">
                <i class="fa fa-language"></i>
              <div class="card-body">
                <h5 class="card-title">Horarios de atencion</h5>
                <p class="card-text">Conoce mas sobre nuestros sucursales y sus respectivos horarios de atencion.</p>
                <a href="#" class="readmore">Leer mas</a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 mb-4">
            <div class="card wow bounceInUp">
                <i class="fa fa-object-group"></i>
              <div class="card-body">
                <h5 class="card-title">Nuestros servicios</h5>
                <p class="card-text">Enterate de todos los servicios que ofrecemos desde nuestra plataforma. </p>
                <a href="#" class="readmore">Leer mas</a>
              </div>
            </div>
          </div>

          <div class="col-lg-12 mb-12">
            <div class="card wow bounceInUp">
                <i class="fa fa-object-group"></i>
              <div class="card-body">
                <h5 class="card-title">Conversa con nuestro chatbot</h5>
                <p class="card-text">Presiona el siguiente enlace para poder iniciar una conversacion con nuestro chatbot</p>
                <a href="https://m.me/106662320744385" target="_blank" class="readmore">Iniciar conversacion</a>
              </div>
            </div>
          </div>

        </div>
    </section>

  </main>

@endsection

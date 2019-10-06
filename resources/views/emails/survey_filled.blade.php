<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .button {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<header>
    <img src="{{asset('img/logo.png')}}" alt="" class="img-fluid"></a>
</header>
<main>
    <h3>Gracias {{$name}} por usar nuestros servicios, cuentanos como fue tu experiencia con nosotros</h3>
    <p>{!! $scoreMessage!!}</p>
</main>
</body>
</html>
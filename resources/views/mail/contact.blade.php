<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email di Contatto</title>
</head>
<body>
    <h1> L'utente {{$name}} ti ha contattato</h1>
    <p>Ecco il suo messaggio:</p>
    <p>{{$body}}</p>
    <p>il numero d'ordine è : {{$order_number}} </p>
    <p>il suo numero e e email sono: {{$telephone_number}} , {{$email}}</p>
</body>
</html>
<!doctype html>
<html lang=""{{ str_replace('_', '-', app()->getLocale()) }}"">

<head>
    <title>$Nome_Escola$</title>
  <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="css/app.css">

</head>


<body>
    <nav class="nav justify-content-start navbar-light bg-light">
        <a class="nav-link active" href="/" aria-current="page"><h1>$School_Logo$</h1><span class="visually-hidden">(current)</span></a>
    </nav>
  @yield('content')
</body>

</html>
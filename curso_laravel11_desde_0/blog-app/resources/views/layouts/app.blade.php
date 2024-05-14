<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('tittle', 'valor por defecto')</title>
    <script src="https://cdn.tailwindcss.com"></script>

    @stack('css')
</head>
<body>

    <header></header>


   @yield('content')



    <footer></footer>
</body>
</html>
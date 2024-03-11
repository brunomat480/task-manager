<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <script src="https://unpkg.com/@phosphor-icons/web"></script>

  @vite('resources/css/app.css')

  <title>@yield('title')</title>
</head>
<body class="bg-gray-900">
  @yield('content')
</body>
</html>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>UTS - @yield('title', 'Menu')</title>
    <style>
      body{ font-family: Arial, sans-serif; margin: 0; padding: 0; }
      .container{ padding: 20px; }
      a{ text-decoration:none; color: #2a6; }
    </style>
</head>
<body>
    @include('layouts.header')

    <div class="container">
        @yield('content')
    </div>

    @include('layouts.footer')
</body>
</html>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>UTS - @yield('title', 'Menu')</title>
</head>
<body>
    @include('layouts.header')
     <div class="container">
         @yield('content')
     </div>
    @include('layouts.footer')
</body>
</html>
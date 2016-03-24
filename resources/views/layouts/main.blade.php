<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='stylesheet' href="{{ asset('css/bootstrap.min.css') }}" type='text/css'/>
    <link rel='stylesheet' href="{{ asset('css/all.css') }}" type='text/css'/>
</head>
<body>

    @include('partials.header')

    @include('partials.navigation')

    @yield('content')

    @include('partials.footer')

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>

</body>
</html>

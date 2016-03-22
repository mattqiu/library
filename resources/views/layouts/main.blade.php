<!DOCTYPE html>
<html lang="zh-CN">
<head>
 <meta charset="UTF-8">
 <title>图书馆</title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel='stylesheet' href="{{ asset('css/bootstrap.min.css') }}" type='text/css' />
 <script src="{{ asset('js/jquery.min.js') }}"></script>
 <script src="{{ asset('js/bootstrap.min.js') }}"></script>
 <script src="{{ asset('js/app.js') }}"></script>

</head>
<body>
@include('partials.header')

@include('partials.navigation')

@yield('content')

@include('partials.footer')

<script>


</script>
</body>
</html>

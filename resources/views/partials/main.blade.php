<!DOCTYPE html>
<html lang="zh-CN">
<head>
 <meta charset="UTF-8">
 <title> 图书馆</title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel='stylesheet' href="{{ asset('css/bootstrap.min.css') }}" type='text/css' />
 <script src="{{ asset('js/jquery.min.js') }}"></script>
 <script src="{{ asset('js/bootstrap.min.js') }}"></script>
 <script src="{{ asset('js/app.js') }}"></script>

</head>
<body>
<div class="container">
 <div class="row">
  <div class="col-md-4 col-sm-4 col-xs-4">
   <a href="/"><img src="/uploads/logo/books.jpeg" alt="首页" class="logo"/></a>
  </div>
  <div class="col-md-8 col-sm-8 col-xs-8">
   <div class="row">
    <div class="dropdown accountBar" style="float:right;">
     <a class="dropdown-toggle" href="#" id="account-email" data-toggle="dropdown" aria-expanded="false">
      Allen<span class="caret"></span>    </a>
     <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
      <li role="presentation"><a role="menuitem" tabindex="-1" href="/settings/account">我的账号</a></li>
      <li role="presentation" class="divider"></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="/auth/logout">退出</a></li>
     </ul>
    </div>
   </div>
   <div class="row">
    <div class="col-xs-6 col-md-5 col-sm-6 pull-right search">
     <form action="/search" method="get">
      <input type="text" class="form-control" placeholder="搜索书名..." name="keywords" value="">
     </form>
    </div>
   </div>
  </div>
 </div>
</div>

<nav class="navbar navbar-default">
 <div class="container">
  <div id="navbar">
   <ul class="nav navbar-nav">
    <li                 class="active"
    ><a href="/">首页</a></li>
    <li ><a href="/book">实体书</a></li>
    <li ><a href="/ebook">电子书</a></li>
    <li ><a href="/buy">购书申请</a></li>
    <li ><a href="/my">我的</a></li>
   </ul>
   <ul class="nav navbar-nav navbar-right">
    <li ><a href="/add">共享图书</a></li>
   </ul>
  </div>
 </div>
</nav>


@include('partials.footer')

<script>


</script>
</body>
</html>

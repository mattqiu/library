<nav class="navbar navbar-default">
    <div class="container">
        <div id="navbar">
            <ul class="nav navbar-nav">
                <li {{ $navType == 1 ? "class=active" : "" }}><a href="/">首页</a></li>
                <li {{ $navType == 2 ? "class=active" : "" }}><a href="/books">实体书</a></li>
                <li {{ $navType == 3 ? "class=active" : "" }}><a href="/ebooks">电子书</a></li>
                <li {{ $navType == 4 ? "class=active" : "" }}><a href="/my/contributions">我的</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li {{ $navType == 5 ? "class=active" : "" }}><a href="/add">共享图书</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-sm-4 col-xs-4">
            <a href="/"><img src="{{asset('img/logo.png')}}" alt="首页" class="logo"/></a>
        </div>
        <div class="col-md-8 col-sm-8 col-xs-8">
            <div class="row">
                <div class="dropdown accountBar" style="float:right;">
                    <a class="dropdown-toggle" href="#" id="account-email" data-toggle="dropdown" aria-expanded="false">
                        Allen<span class="caret"></span>
                    </a>
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
                        <input type="text" class="form-control" placeholder="搜索书名、isbn、作者..." name="keywords" value="">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
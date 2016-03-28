@extends('layouts.main')

@section('title','我的账号')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2 col-sm-2 sideBar">
            <ul>
                <li><a href="{{ route('contributions') }}">我的共享</a></li>
                <li><a href="{{ route('borrows') }}">我的借阅</a></li>
                <li class="sideBarActive"><a href="{{ route('settings') }}">我的账号</a></li>
            </ul>
        </div>
        <div class="col-md-10 col-sm-10">
            <div class="row">
                <div class="col-md-7 col-sm-8">
                    <form method="post">
                        <div class="form-group">
                            <label for="email">邮箱</label>
                            <input type="email" name="email" disabled value="" class="form-control" id="email">
                        </div>
                        <div class="form-group">
                            <label for="name">姓名</label>
                            <input type="text" name="name" value="" class="form-control" id="name">
                        </div>
                        <div class="form-group">
                            <div>
                                <label for="name">性别</label>
                            </div>
                            <div>
                                <label class="radio-inline">
                                    <input type="radio" checked name="sex" value="m">男
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="sex" value="f">女
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phone_number">电话号码</label>
                            <input type="text" name="phone_number" value="" class="form-control" id="phone_number">
                        </div>
                        <div class="form-group">
                            <label for="address">工位信息</label>
                            <input type="text" name="address" value="" class="form-control" id="address">
                        </div>
                        <div class="form-group">
                            <label for="kindle_email">Kindle 邮箱</label>
                            <input type="email" name="kindle_email" value="" class="form-control" id="kindle_email">
                        </div>
                        <div class="help">
                        <ul>
                            <li>设置Kindle 邮箱后，可以使用推送至 Kindle 功能</li>
                            <li>需要先在亚马逊账号 “管理我的内容和设备 - 设置” 中将此邮箱添加到信任邮箱列表 “xxxx@xxxx.cn” </li>
                            <li>只能推送 mobi 格式的电子书</li>
                        </ul>
                        </div>
                        <input type="hidden" name="_token" value="pKpJaRXMqHqeZoEeKxECBTHbKbqitnWxuPSg6x3P">
                        <button type="submit" class="btn btn-default">保存</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
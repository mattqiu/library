@extends('layouts.main')

{{--@section('title',$pageTitle)--}}

@section('content')
    <div class="container">
        <div class="col-md-12" id="addBookForm">
            <h2>共享图书</h2>
            <p class="help">个人共享实体图书时，所有权依然归本人所有，有人借阅时你将收到通知，当面给予对方即可。</p>
            <form class="form-horizontal" method="POST" enctype="multipart/form-data">
                <hr>

                <div class="form-group">
                    <label class="col-sm-2 control-label"><span class="required">*</span> 图书类型</label>
                    <div class="col-sm-8">
                        <label class="radio-inline">
                            <input type="radio" checked name="book_type" id="" value="book"> 实体图书
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="book_type" value="ebook"> 电子书
                        </label>
                    </div>
                </div>
                <div class="form-group">
                  <label for="isbn" class="col-sm-2 control-label"><span class="required">*</span>ISBN</label>
                  <div class="col-sm-8">
                    <input type="text" id="isbn" name="isbn" class="form-control"  placeholder="ISBN">
                  </div>
                </div>
                <div class="form-group">
                    <label for="isbn" class="col-sm-2 control-label">选择文件</label>
                    <div class="col-sm-8">
                        <input type="file" name="file" value="上传电子书"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="describe" class="col-sm-2 control-label">备注</label>
                    <div class="col-sm-8">
                        <input type="text" id="describe" name="describe" class="form-control"  placeholder="填写向您借阅时的说明">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">提交</button>
                    </div>
                </div>
                <input type="hidden" name="_token" value="HP80JiPTXI02abaLnuqea8pcJswfPqAojmXzeLsr"/>
            </form>
        </div>
    </div>
@endsection
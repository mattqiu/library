@extends('layouts.main')

@section('title','共享图书')

@section('content')
    <div class="container">
        <div class="col-md-12" id="addBookForm">
            <h2>共享图书</h2>
            <p class="help">个人共享实体图书时，所有权依然归本人所有，有人借阅时你将收到通知，当面给予对方即可。</p>
            <form class="form-horizontal" method="POST" role="form" action="{{ route('postAdd') }}" enctype="multipart/form-data">
                <hr>
                {!! csrf_field() !!}
                <div class="form-group">
                    <label class="col-sm-2 control-label"><span class="required">*</span> 图书类型</label>
                    <div class="col-sm-8">
                        <label class="radio-inline">
                            <input class="type-radio" type="radio" checked name="book_type" value="0"> 实体图书
                        </label>
                        <label class="radio-inline">
                            <input class="type-radio" type="radio" name="book_type" value="1"> 电子书
                        </label>
                    </div>
                </div>
                <div class="form-group">
                  <label for="isbn" class="col-sm-2 control-label"><span class="required">*</span>ISBN</label>
                  <div class="col-sm-8">
                    <input type="text" id="isbn" name="isbn" class="form-control"  placeholder="ISBN">
                      <div class="helper-text"></div>
                  </div>
                </div>
                <div id="chose-file" class="form-group" style="display: none">
                    <label for="isbn" class="col-sm-2 control-label">选择文件</label>
                    <div class="col-sm-8">
                        <input type="file" name="file" value="上传电子书"/>
                    </div>
                </div>
                <div id="describe" class="form-group">
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
            </form>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $(".type-radio").change(
                function() {
                    var $value = $("input[name='book_type']:checked").val();
                    if ($value == 0) {
                        $("#chose-file").css('display','none');
                        $("#describe").css('display','block');
                    } else {
                        $("#chose-file").css('display','block');
                        $("#describe").css('display','none');
                    }
                }
            );
        });

    </script>
@endsection
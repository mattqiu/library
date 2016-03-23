@extends('layouts.main')

@section('title', $pageTitle)

@section('content')
    <div class="container">
        <div class="row break">
            <div class="col-md-9 col-sm-9 col-xs-12">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-5">
                        <img src="../storage/cover/{{ $book->image }}" alt="{{ $book->book_name }}" class="detaillBookCover"/>
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-7">
                        <h2>{{ $book->book_name }}</h2>
                        <table class="bookInfo">
                            <tr>
                                <td class="cell1">豆瓣评分:</td>
                                <td class="cell2">{{ $book->douban_rating }}</td>
                            </tr>
                            <tr>
                                <td  class="cell1">作者:</td>
                                <td class="cell2">{{ $book->author }}</td>
                            </tr>
                            <tr>
                                <td class="cell1">出版社:</td>
                                <td class="cell2">{{ $book->publisher }}</td>
                            </tr>
                            <tr>
                                <td class="cell1">出版时间:</td>
                                <td class="cell2">{{ $book->publishe_date }}</td>
                            </tr>
                            <tr>
                                <td class="cell1">ISBN:</td>
                                <td class="cell2">{{ $book->isbn }}</td>
                            </tr>
                        </table>
                        <br/>
                        <p>
                            <b>{{ $book->contributions_count }}</b> 本实体书可借阅，<b>{{ $book->ebooks_count }}</b> 本电子书可下载
                        </p>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#stockList">借阅</button>
                        <button type="button" id="downloadEbookButton" class="btn btn-default">下载电子书</button>
                    </div>
                </div>
                <div class="row break">
                    <div class="col-md-12 col-sm-12 book_detail">
                        <h3>简介</h3>
                            {{ $book->introduction }}
                        <h3>目录</h3>
                            {{ $book->content }}
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12">
                <div class="row">
                    <h4>如果你拥有此书</h4>
                    <form action="/api/ebooks" id="uploadForm" method="post" enctype="multipart/form-data">
                        <button type="button" disabled class="btn btn-default btn-sm col-md-5 col-xs-5" data-toggle="modal" data-target="#shareBook">已共享此书</button>
                        <button type="button" id="uploadEbookButton" onclick="$('#uploadEbook').click()" class="btn btn-default btn-sm col-md-5 col-sm-offset-2 col-xs-5 col-xs-offset-2">上传电子书</button>
                        <input type="file" id="uploadEbook" name="file" style="display:none;"/>
                        <input type="hidden" name="book_id" value="222"/>
                        <input type="hidden" name="_token" value="yQ43DaC3SKwCkbaffi6FW9lwDPEtagsASm6CJWEf">
                    </form>
                </div>

                <div class="row break borrow">
                    <h4>借阅历史</h4>
                    <ul>
                        <li>2016-03-22 <b>Allen</b> 从 <b>wlwr</b> 借了本书，于 2016-03-22 归还</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

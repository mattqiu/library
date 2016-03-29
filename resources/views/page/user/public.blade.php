@extends('layouts.main')

@section('title',$pageTitle)

@section('content')
    <div class="container">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="row">
                <div class="col-lg-12">
                    <div class="content-box">
                        <div class="trick-user">
                            <div class="trick-user-image">
                                <img src="" class="user-avatar">
                            </div>
                            <div class="trick-user-data">
                                <div class="row">
                                    <h1 class="page-title">
                                        {{ $user->nick_name }}
                                    </h1>
                                    <div class="text-muted">
                                        <b>性别:</b>{{ $user->sex }}
                                    </div>
                                </div>
                                <div class="text-muted">
                                    <b>已加入:</b>{{ $user->created_at }}
                                </div>
                                <div class="text-muted">
                                    <b>工位信息:</b>{{ $user->address }}
                                </div>
                            </div>
                        </div>
                        <table>
                            <tr>
                                <th width="140">共享总数:</th>
                                <td>{{ $user->contributions_count }}</td>
                            </tr>
                            <tr>
                                <th>借阅总数:</th>
                                <td>{{ $user->borrows_count }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row break">
            <div class="col-md-8 col-sm-8 col-xs-12">
                <div class="row push-down">
                    <div class="col-lg-12">
                        <h1 class="page-title">已共享</h1>
                    </div>
                </div>
                @include('partials.books.grid', ['tricks' => $tricks])
            </div>

            <div class="col-md-4 col-sm-4 col-xs-12">
                <ul>
                    @if($user->borrows_count)
                        @foreach($user->borrows as $index => $borrow)
                            {{-- 这里写借阅历史，什么样子没想好--}}
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
    </div>
@endsection

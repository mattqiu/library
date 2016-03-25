@extends('layouts.main')

@section('title', '共享图书')

@section('content')
    <div class="container">
        @include('partials.books.grid', ['books' => $books])
    </div>
@endsection

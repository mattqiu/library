@extends('layouts.main')

@section('title', $pageTitle)

@section('content')
    <div class="container">
        @include('partials.books.grid', ['books' => $books])
    </div>
@endsection

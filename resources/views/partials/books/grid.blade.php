<div class="container">
    <div>
        <p class="help">共有 {{ $booksCount }} 本书</p>
    </div>
    <div class="row books-container">
        @if($books->count())
            @foreach($books as $index => $book)
                @include('partials.books.card', [ 'book' => $book ])
            @endforeach
        @endif
    </div>
</div>
@if($books->count())
    <div class="row">
        <div class="col-md-12 text-center">
            @if(isset($appends))
                {!! $books->appends($appends)->render(); !!}
            @else
                {!! $books->render(); !!}
            @endif
        </div>
    </div>
@endif

<div class="indexBookItem col-md-2 col-sm-3 col-xs-4">
    <div class="my_book_cover">
        <a href="{{ route('book.info', [ $book->id ]) }}">
            <img src="../storage/cover/{{ $book->image }}" class="cover_img"/>
        </a>
    </div>
    <a href="{{ route('book.info', [ $book->id ]) }}">
        <span class="bookTitle">{!! $book->name !!}</span>
    </a>
    <p>{{ $book->author }}</p>
</div>
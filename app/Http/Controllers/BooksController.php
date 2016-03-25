<?php
/**
 * [The introduction of this file]
 *
 * @author     shixi_zhiqun, Weibo Team <shixi_zhiqun@staff.weibo.com>
 * @copyright  copyright(2013) weibo.com all rights reserved
 * @version    0.1
 */

namespace App\Http\Controllers;

use App;
use App\Book;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    protected $table = 'books';

    /**
     * Show all the books.
     *
     * @return \Response
     */

    public function getBooks()
    {
        $books = Book::paginate(20);

        return view('page.browse.books',compact('books'));
    }

    /**
     * Show printed books.
     *
     * @return \Response
     */
    public function getPrintedBooks()
    {
        $has_type=Book::lists('has_type');
        foreach($has_type as $value){
            if($value == "1" or $value == "3"){
                $books = Book::whereIn('has_type',[$value])->get();
            }
        }

        return view('page.browse.books',compact('books'));
    }


    /**
     * Show ebooks.
     *
     * @return \Response
     */
    public function getEBooks()
    {
        $has_type=Book::lists('has_type');
        foreach($has_type as $value)
        {
            if($value == "2" )
            {
                $books = Book::whereIn('has_type',[$value])->get();
        }
    }
        return view('page.browse.books',compact('books'));
    }

    /**
     * find a book by id.
     *
     * @param string $id id of the book
     * @return \Response
     */
    public function getBook($id)
    {

        $book = Book::findOrFail($id);

        return view('page.book.info',compact('book'));
    }

    /**
     * Show books with searching.
     *
     * @param Request $request id of the book
     * @return \Response
     */
    public function getBooksFromSearch(Request $request)
    {
        $term = $request->input('term');
        $books_builder = Book::Where('book_name', 'LIKE', '%'.$term.'%')
            ->orWhere('isbn', 'LIKE', '%'.$term.'%')
            ->orWhere('author', 'LIKE', '%'.$term.'%')
            ->orWhere('publisher', 'LIKE', '%'.$term.'%')
            ->orderBy('created_at', 'desc')
            ->orderBy('book_name', 'asc');

        $books = $books_builder->paginate(18);
        $booksCount = $books_builder->count();
        $navType = 0;
        $pageTitle = '微博图书馆-搜索';
        return view('page.browse.books',compact('books', 'navType', 'pageTitle', 'booksCount'));
    }

    /**
     * find all the contributions of a book by id.
     *
     * @param string $id id of the book
     * @return \Response
     */
    public function getContributions($id)
    {

        $contributions=Book::findOrFail($id)->contributions;

        return view('page.user.contributions',compact('contributions'));
    }
}
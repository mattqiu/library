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

class BooksController extends Controller
{
    protected $table='books';

    /**
     * Show all the books.
     *
     * @return \Response
     */
    public function getBooks($bookType = null) {

      $books = Book::all();
      return view('page.browse');
    }

    /**
     * Show printed books.
     *
     * @return \Response
     */
    public function getPrintedBooks($bookType = null) {

        $books = Book::all();
        return view('page.browse');
    }

    /**
     * Show ebooks.
     *
     * @return \Response
     */
    public function getEBooks($bookType = null) {

        $books = Book::all();
        return view('page.browse');
    }
    /**
     * find a book by id.
     *
     * @param string $id id of the book
     * @return \Response
     */
    public function getBook($id) {

       $book=Book::find($id);
       return view();
    }

    /**
     * find all the contributions of a book by id.
     *
     * @param string $id id of the book
     * @return \Response
     */
    public function getContributions($id) {

        $contributions=Book::find($id)->contributions;
        return view();
    }
}
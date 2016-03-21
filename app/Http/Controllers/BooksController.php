<?php
/**
 * [The introduction of this file]
 *
 * @author     shixi_caoyi, Weibo Team <shixi_caoyi@staff.weibo.com>
 * @copyright  copyright(2013) weibo.com all rights reserved
 * @since      2016/3/21/12:07
 * @version    0.1
 */

namespace App\Http\Controllers;

use App\Book;
use App\Http\Controllers\Controller;

class BooksController extends Controller
{
    /**
     * Show all the books.
     *
     * @return \Response
     */
    public function getBooks() {

    }

    /**
     * Show the info of a book with isbn.
     *
     * @param string $isbn isbn of the book
     * @return \Response
     */
    public function getBook($isbn) {

    }

    /**
     * Show all the contributions of a book with isbn.
     *
     * @param string $isbn isbn of the book
     * @return \Response
     */
    public function getContributions($isbn) {

    }
}
<?php
/**
 * [The introduction of this file]
 *
 * @author     shixi_caoyi, Weibo Team <shixi_caoyi@staff.weibo.com>
 * @copyright  copyright(2013) weibo.com all rights reserved
 * @since      2016/3/22/12:21
 * @version    0.1
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App;


class ContributionController extends Controller
{
    /**
     * Show add contributins page.
     *
     * @return \Response
     */
    public function addContribution()
    {
        $navType = 5;
        return view('page.contribution.add',compact('navType'));
    }

    /**
     * Handle the new contribution.
     *
     * @return \Response
     */
    public function postContribution(Request $request)
    {
        $book = new Book;
        //$isbn = $request->input('isbn');
        $isbn = 7550241511;
        $book->has_type = 0;
        $url = "https://api.douban.com/v2/book/isbn/$isbn";
        $data = (array)json_decode(file_get_contents($url), true);
        $book->id = $data['id'];
        //$book->has_type = $request->input('has_type');
        $book->book_name = $data['title'];
        $book->isbn = $data['isbn13'];
        $book->author = $data['author'];
        $book->publisher = $data['publisher'];
        $book->publish_date = $data['pubdate'];
        $book->douban_rating = $data['rating'];
        $book->introduction = $data['summary'];
        $book->catalog = $data['catalog'];

        //获取书的图片
        $images_url = $data['images']['medium'];
        $filename = date("Ymdhis").".jpg";
        $content = file_get_contents($images_url);
        file_put_contents('../storage/app/public/mimage/$filename', $content);
        $book->save();
    }
}
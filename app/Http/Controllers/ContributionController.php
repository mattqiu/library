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
use App\Book;

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
        $book = array();
        $isbn = $request->input('isbn');
       // $isbn = 7550241511;
       // $book['has_type'] = 0;
        $url = "https://api.douban.com/v2/book/isbn/$isbn";
        $data = json_decode(@file_get_contents($url), true);
        //处理publish_date 格式

        $publish = explode('-',$data['pubdate']);
        $d = mktime('0','0','0',$publish['1'],'1',$publish['0']);

        $book['has_type'] = $request->input('has_type');
        $book['book_name'] = $data['title'];
        $book['isbn'] = $data['isbn13'];
        $book['author'] = $data['author']['0'];
        $book['publisher'] = $data['publisher'];
        $book['publish_date'] =  date("Y-m-d h:i:sa", $d);
        $book['douban_rating'] = $data['rating']['average'];
        $book['introduction'] = $data['summary'];
        $book['catalog'] = str_replace("\n", "</br>", $data['catalog']);

        //存储书的图片
        $images_url = $data['images']['medium'];
        $images__large_url = $data['images']['large'];
        $filename = $isbn.".jpg";
        $book['image'] = $filename;
        $content = file_get_contents($images_url);
        file_put_contents('../public/img/mimage/'.$filename, $content);
        $content = file_get_contents($images__large_url);
        file_put_contents('../public/img/limage/'.$filename, $content);
        $newbook = Book::create($book);

        return redirect()->route('book.info',$newbook->id);
    }
}
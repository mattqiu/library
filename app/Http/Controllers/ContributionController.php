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
use Auth;
use App\Contribution;

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
        $Cbook = array();
        $isbn = $request->input('isbn');
        $url = "https://api.douban.com/v2/book/isbn/$isbn";
        $data = json_decode(@file_get_contents($url), true);
        if(empty($data) ){
            return ;
        }else{
            $contribution = array();
            $contribution['user_id'] = Auth::user()->id;
            $contribution['remark'] = $request->input('describe');
            $contribution['status'] = 0;
            $contribution['borrow_sum'] = 0;
            $contribution['type'] = $request->input('book_type');

            $book = Book::where('isbn','=',$data['isbn13'])->first();
            if(!empty($book)){
                $contribution['book_id'] = $book['id'];
                if($book['has_type'] == $request->input('book_type')){
                    $newcontribution = Contribution::create($contribution);
                    return redirect()->route('book.info',['id'=>$book['id']]);
                }else{
                    $book['has_type'] = 2;
                    $book->save();
                    $newcontribution = Contribution::create($contribution);
                    return redirect()->route('book.info',['id'=>$book['id']]);
                }


            }else{
                //处理publish_date 格式
                $publish = explode('-',$data['pubdate']);
                $d = mktime('0','0','0',$publish['1'],'1',$publish['0']);
                $Cbook['has_type'] = $request->input('book_type');
                $Cbook['book_name'] = $data['title'];
                $Cbook['isbn'] = $data['isbn13'];
                $Cbook['author'] = $data['author']['0'];
                $Cbook['publisher'] = $data['publisher'];
                $Cbook['publish_date'] =  date("Y-m-d h:i:sa", $d);
                $Cbook['douban_rating'] = $data['rating']['average'];
                $Cbook['introduction'] = $data['summary'];
                $Cbook['catalog'] = str_replace("\n", "</br>", $data['catalog']);


                //存储书的图片
                $images_url = $data['images']['medium'];
                $images__large_url = $data['images']['large'];
                $filename = $isbn.".jpg";
                $Cbook['image'] = $filename;
                $content = file_get_contents($images_url);
                file_put_contents('../public/img/mimage/'.$filename, $content);
                $content = file_get_contents($images__large_url);
                file_put_contents('../public/img/limage/'.$filename, $content);
                $newbook = Book::create($Cbook);

                $contribution['type'] = $request->input('book_type');
                $contribution['book_id'] = $newbook['id'];
                $newcontribution = Contribution::create($contribution);

                return redirect()->route('book.info',$newbook->id);
            }
        }
    }
}
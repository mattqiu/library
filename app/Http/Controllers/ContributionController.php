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

        $this->validate($request, [
        'title' => 'required|unique:posts|max:255',
        ]);
        return redirect()->route('book',[]);
    }
}
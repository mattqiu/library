<?php
/**
 * [The introduction of this file]
 *
 * @author     shixi_caoyi, Weibo Team <shixi_caoyi@staff.weibo.com>
 * @copyright  copyright(2013) weibo.com all rights reserved
 * @since      2016/3/25/19:40
 * @version    0.1
 */

namespace App\Http\Composers;

use Auth;
use Illuminate\Support\Fluent;

class GlobalComposer
{
    public function compose($view)
    {
        $frontend = new Fluent();
        if (Auth::check()) {
            $frontend->user = Auth::user();
        }
        $view->with('frontend', $frontend);
    }
}

<?php
/**
 * [The introduction of this file]
 *
 * @author     shixi_caoyi, Weibo Team <shixi_caoyi@staff.weibo.com>
 * @copyright  copyright(2013) weibo.com all rights reserved
 * @since      2016/3/21/12:21
 * @version    0.1
 */

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Response;
use App\User;
use Illuminate\Database\Eloquent\Model;

class UserController extends Controller
{
    /*
     * Show the user's setting page.
     *
     * @return \Response
     */
    public function getSettings()
    {
        return view('page.user.settings');
    }

    /**
     * Handle the settings form.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postSettings(Request $request)
    {
        //$user = Auth::user();
        $rules = [
            'kindle_email' => 'email',
            'phone_number' => 'integer',
            'nick_name' => 'required|min:5',
        ];

        $this->validate($request, $rules);

        $user->fill($request->all());

        $user->save();

        return redirect()->route('my/settings');
    }

    /**
     * Show the user's own contributions page.
     *
     * @param string $username
     * @return \Response
     */
    public function getContributions()
    {
        $user = Auth::user();
        $contributions = $user->contributions;

        return view('page.user.contributions',compact('contributions'));
    }



    /**
     * Delete a contribution.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteContribution()
    {
        $contribution = Auth::user()->contributions;
        $contribution->delete();

        return redirect()->route->('my/contributions');
    }

    /**
     * Show the user's borrows  page.
     *
     * @return \Response
     */
    public function getBorrows()
    {
        $user = Auth::user();
        $borrows = $user->borrows;

        return ('page.user.borrows',compact('borrows'));
    }

    /**
     * Show the other's profile page.
     *
     * @param string $id
     * @return \Response
     */

    public function getPublic($id)
    {
        $user = User::whereUsername($id)->first();


        return view('page.user.public',compact('user'));
    }
}
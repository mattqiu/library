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
use Auth;
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
        $user = Auth::user();
        $navType = 4;
        return view('page.user.settings',compact('navType', 'user'));
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
            'nick_name' => 'required|max:255',
        ];
        $this->validate($request, $rules);
        if ($validator->fails()) {
            return redirect('post/getSettings')
                        ->withErrors($validator)
                        ->withInput();
        }else{
            $user->fill($request->all());
            $user->save();

            return redirect()->route('my/settings');
        }

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
        $navType = 4;
        return view('page.user.contributions',compact('navType', 'contributions'));
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

        return redirect()->route('my/contributions');
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
        $navType = 4;
        return view('page.user.borrows', compact('navType', 'borrows') );

    }

    /**
     * Show the other's profile page.
     *
     * @param string $id
     * @return \Response
     */

    public function getPublic($id)
    {
        $user = User::findOrFail($id);

        return view('page.user.public',compact('user'));
    }
}
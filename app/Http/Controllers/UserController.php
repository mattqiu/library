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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\User;
use Auth;
use Validator;
use Illuminate\Database\Eloquent\Model;

class UserController extends Controller
{

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255|min:5',
            'phone_number' => 'required',
            'address' => 'required',
            'sex' => 'required',
        ]);
    }

    /*
     * Show the user's setting page.
     *
     * @return \Response
     */
    public function getSettings()
    {
        $navType = 4;
        return view('page.user.settings',compact('navType'));
    }

    /**
     * Handle the settings form.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postSettings(Request $request)
    {
        $data = $request->all();
        $validator = $this->validator($data);
        $this->validateWith($validator,$request);
        $user = Auth::user();
        $user->nick_name = $data['name'];
        $user->phone_number = $data['phone_number'];
        $user->address = $data['address'];
        $user->sex = $data['sex'];
        $user->kindle_email = $data['kindle_email'];
        $user->save();
        return redirect()->route('settings');
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
     * Handle a new borrow.
     *
     * @return \Response
     */
    public function borrow()
    {
        $borrow = array();
        $users = Auth::user();
        $borrow['user_id'] = $users->id;
        $borrow['contribution_id'] = $users->contributions->id;
        $borrow['book_id'] = $users->books->id;
        $newborrow = Borrow::create($borrow);
        return view('', compact('newborrow') );

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
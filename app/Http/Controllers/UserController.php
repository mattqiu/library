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

use App\User;
use Illuminate\Database\Eloquent\Model;

class UserController extends Controller
{
    /**
     * Show the user's setting page.
     *
     * @return \Response
     */
    public function getSettings()
    {

    }

    /**
     * Handle the settings form.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postSettings()
    {

    }

    /**
     * Show the user's own contributions page.
     *
     * @param string $username
     * @return \Response
     */
    public function getContributions() {

    }

    /**
     * Post a contribution.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postContribution() {

    }

    /**
     * Delete a contribution.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteContribution() {

    }

    /**
     * Show the user's own contributions page.
     *
     * @return \Response
     */
    public function getBorrows() {

    }

    /**
     * Show the other's profile page.
     *
     * @param string $id
     * @return \Response
     */
    public function getPublic($id) {

    }
}
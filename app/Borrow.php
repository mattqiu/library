<?php
/**
 * [The introduction of this file]
 *
 * @author     shixi_zhiqun, Weibo Team <shixi_zhiqun@staff.weibo.com>
 * @copyright  copyright(2013) weibo.com all rights reserved
 * @version    0.1
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
  protected $table='borrows';
   /**
     * Query the user that has borrow the books.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function users()
    {
        return $this->belongsTo('App\User');
    }
/**
     * Query the book that has borrow the book.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function books()
    {
        return $this->belongsTo('App\Book');
    }

}
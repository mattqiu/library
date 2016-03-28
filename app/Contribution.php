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

class Contribution extends Model
{
    protected $table = 'contribution';
    protected $fillable = [
        'id',
        'user_id',
        'book_id',
        'type',
        'remark',
        'status',
        'borrow_sum',
    ];
/**
 * Query the contribution user.
 *
 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
 */
    public function users()
    {
        return $this->belongsTo('App\User');
    }
/**
 * Query the contribution book.
 *
 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
 */
    public function books()
    {
        return $this->belongsTo('App\Book');
    }

}
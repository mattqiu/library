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

class Book extends Model
{
     protected  $table='books';
/**
 * Query users shared books.
 *
 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
 */
public function users()
{
    return $this->belongstoMany('App\User');
}
/**
 * Query the contributions that  the book has.
 *
 * @return \Illuminate\Database\Eloquent\Relations\HasMany
 */
public function contributions()
{
    return $this->hasMany('App\Contribution');
}
/**
 * Query the borrows that the book has.
 *
 * @return \Illuminate\Database\Eloquent\Relations\HasMany
 */
public function borrows()
{
    return $this->hasMany('App\Borrow');
}

}
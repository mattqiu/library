<?php

/**
 * [The introduction of this file]
 *
 * @author     shixi_zhiqun, Weibo Team <shixi_zhiqun@staff.weibo.com>
 * @copyright  copyright(2013) weibo.com all rights reserved
 * @version    0.1
 */
namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table='users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    /**
 * Query the books that  ussers has shared.
 *
 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
 */
public function books(){
    return $this->belongstoMany('App\Book');
}
/**
 * Query the contributions that the user has shared.
 *
 * @return \Illuminate\Database\Eloquent\Relations\HasMany
 */
public function contributions(){
    return $this->hasMany('App\Contribution');
}
/**
 * Query the borrows that the user has.
 *
 * @return \Illuminate\Database\Eloquent\Relations\HasMany
 */
public function borrows(){
    return $this->hasMany('App\Borrow');
}
}

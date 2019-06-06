<?php
/**
 * Created by PhpStorm.
 * User: Velmont
 * Date: 2019-05-17
 * Time: 오후 5:14
 */

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;


/**
 * App\Models\User
 *
 * @property-read mixed $id
 * @method static \Jenssegers\Mongodb\Eloquent\Builder|\App\Models\User newModelQuery()
 * @method static \Jenssegers\Mongodb\Eloquent\Builder|\App\Models\User newQuery()
 * @method static \Jenssegers\Mongodb\Eloquent\Builder|\App\Models\User query()
 * @mixin \Eloquent
 */
class User extends Eloquent
{
    protected $fillable = ['user_id', 'name', 'password', 'email'];

    protected $hidden = ['_id', 'password'];
}
<?php
/**
 * Created by PhpStorm.
 * User: Velmont
 * Date: 2019-06-19
 * Time: 오후 6:53
 */

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

/**
 * App\Models\Slot
 *
 * @property-read mixed $id
 * @method static \Jenssegers\Mongodb\Eloquent\Builder|\App\Models\User newModelQuery()
 * @method static \Jenssegers\Mongodb\Eloquent\Builder|\App\Models\User newQuery()
 * @method static \Jenssegers\Mongodb\Eloquent\Builder|\App\Models\User query()
 * @mixin \Eloquent
 */
class Slot extends Eloquent
{
    protected $fillable = ['current_turn', 'characters', 'resources', 'events'];

    protected $hidden = ['_id', 'password'];
}
<?php
/**
 * Created by PhpStorm.
 * User: Velmont
 * Date: 2019-05-24
 * Time: 오후 3:52
 */

namespace App\Services;


use App\Models\User;

class UserService
{
    public function getUser()
    {
        $user = User::all();
        return User::where(['user_id' => 'dragond7'])->first();
    }
}
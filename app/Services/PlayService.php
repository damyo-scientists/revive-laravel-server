<?php
/**
 * Created by PhpStorm.
 * User: Velmont
 * Date: 2019-06-19
 * Time: 오후 6:50
 */

namespace App\Services;


use App\Models\Play;

class PlayService
{
    public function getByUserId(string $userId)
    {
        return Play::where(['user_id' => $userId]);
    }

    public function create(string $userId)
    {
        return Play::insert(['user_id' => $userId]);
    }

    public function update(string $userId, array $data)
    {
        return Play::where(['user_id' => $userId])->update($data);
    }

    public function delete(string $userId)
    {
        return Play::where(['user_id' => $userId])->delete();
    }
}
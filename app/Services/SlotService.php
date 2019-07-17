<?php
/**
 * Created by PhpStorm.
 * User: Velmont
 * Date: 2019-06-22
 * Time: 오후 1:44
 */

namespace App\Services;


use App\Models\Slot;
use Log;

class SlotService
{
    /**
     * @param string $id
     * @return \Illuminate\Database\Eloquent\Model|null|object|static
     */
    public function getById(string $id)
    {
        return Slot::where(['_id' => $id])->first();
    }

    /**
     * @param string $userId
     * @param int $slotNumber
     * @return Slot|\Illuminate\Database\Eloquent\Model
     */
    public function create(string $userId, int $slotNumber)
    {
        $result = Slot::create(['user_id' => $userId, 'slot_number' => $slotNumber]);
        Log::debug('createSlot', ['result' => $result]);
        return $result;
    }

    /**
     * @param string $id
     * @param array $data
     * @return int
     */
    public function update(string $id, array $data)
    {
        return Slot::where(['_id' => $id])->update($data);
    }

    /**
     * @param string $id
     * @return mixed
     */
    public function delete(string $id)
    {
        return Slot::where(['_id' => $id])->delete();
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: Velmont
 * Date: 2019-06-22
 * Time: 오후 1:44
 */

namespace App\Services;


use App\Models\Slot;

class SlotService
{
    public function getById(string $id)
    {
        return Slot::where(['_id' => $id]);
    }

    /**
     * @param string $playId
     * @param int $slotNumber
     * @return bool
     */
    public function create(string $playId, int $slotNumber)
    {
        return Slot::insert(['play_id' => $playId, 'slot_number' => $slotNumber]);
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
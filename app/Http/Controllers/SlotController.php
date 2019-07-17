<?php
/**
 * Created by PhpStorm.
 * User: Velmont
 * Date: 2019-06-22
 * Time: 오후 1:41
 */

namespace App\Http\Controllers;


use App\Services\SlotService;
use Illuminate\Http\Request;

class SlotController
{
    private $slotService;

    /**
     * PlayController constructor.
     * @param SlotService $slotService
     */
    public function __construct(SlotService $slotService)
    {
        $this->slotService = $slotService;
    }

    /**
     * @param Request $request
     * @return SlotService|\Illuminate\Database\Eloquent\Model|object
     */
    public function get(Request $request)
    {
        return $this->slotService->getById($request->input('id'));
    }

    /**
     * @param Request $request
     * @return \App\Models\Slot|\Illuminate\Database\Eloquent\Model
     */
    public function create(Request $request)
    {
        $userId = $request->input('user_id');
        $slotNumber = $request->input('slot_number');
        return $this->slotService->create($userId, $slotNumber);
    }

    /**
     * @param Request $request
     * @return int
     */
    public function update(Request $request)
    {
        return $this->slotService->update($request->input('id'), $request->all());
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function delete(Request $request)
    {
        return $this->slotService->delete($request->input('id'));
    }
}
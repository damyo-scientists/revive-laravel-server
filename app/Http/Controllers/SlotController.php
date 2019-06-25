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

    public function get(Request $request)
    {
        return $this->slotService->getById($request->input('id'));
    }

    public function create(Request $request)
    {
        $playId = $request->input('play_id');
        $slotNumber = $request->input('slot_number');
        return $this->slotService->create($playId, $slotNumber);
    }

    public function update(Request $request)
    {
        return $this->slotService->update($request->input('_id'), $request->all());
    }

    public function delete(Request $request)
    {
        return $this->slotService->delete($request->input('_id'));
    }
}
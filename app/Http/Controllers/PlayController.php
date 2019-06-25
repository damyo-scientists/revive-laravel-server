<?php
/**
 * Created by PhpStorm.
 * User: Velmont
 * Date: 2019-06-19
 * Time: 오후 6:50
 */

namespace App\Http\Controllers;

use App\Services\SlotService;
use Illuminate\Http\Request;
use App\Services\PlayService;
use Response;

class PlayController
{
    /**
     * @var PlayService
     */
    private $playService;

    /**
     * @var SlotService
     */
    private $slotService;

    /**
     * PlayController constructor.
     * @param PlayService $playService
     */
    public function __construct(PlayService $playService, SlotService $slotService)
    {
        $this->playService = $playService;
        $this->slotService = $slotService;
    }

    public function get(Request $request)
    {
        return $this->playService->getByUserId($request->input('user_id'));
    }

    public function create(Request $request)
    {
        $result = $this->playService->create($request->input('user_id'));
        if ($result) {
            Response::json(['ok']);
        }
    }

    public function update(Request $request)
    {
        $result = $this->playService->update($request->input('user_id'), []);
        if ($result) {
            Response::json(['ok']);
        }
    }

    public function delete(Request $request)
    {
        return $this->playService->delete($request->input('user_id'));
    }
}
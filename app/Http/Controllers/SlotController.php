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
     * @return \Illuminate\Http\JsonResponse
     */
    public function get(Request $request)
    {
        $userId = $request->input('userId');
        $slotNumber = $request->input('slotNumber');
        $result = $this->slotService->get($userId, $slotNumber);
        if ($result['result'] == 'success') {
            return response()->json(['data' => $result]);
        } else {
            return response()->json(['message' => $result['message'], $result['response_code']]);
        }
    }

    /**
     * @param Request $request
     * @return bool
     */
    public function create(Request $request)
    {
        $userId = $request->input('userId');
        $slotNumber = $request->input('slotNumber');
        $result = $this->slotService->create($userId, $slotNumber);
        if ($result['result'] == 'success') {
            return response()->json(['message' => $result['message']], $result['response_code']);
        } else {
            return response()->json(['message' => $result['message']], $result['response_code']);
        }
    }

    /**
     * @param Request $request
     * @return int
     */
    public function update(Request $request)
    {
        return $this->slotService->update($request->input('userId'), $request->input('slotNumber'), $request->input('data'));
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
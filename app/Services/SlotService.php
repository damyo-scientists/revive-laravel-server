<?php
/**
 * Created by PhpStorm.
 * User: Velmont
 * Date: 2019-06-22
 * Time: 오후 1:44
 */

namespace App\Services;


use App\Models\Slot;
use Illuminate\Http\Response;
use Log;

class SlotService
{
    /**
     * @param string $userId
     * @param int $slotNumber
     * @return array
     */
    public function get(string $userId, int $slotNumber)
    {
        $slot = Slot::where(['userId' => $userId, 'slotNumber' => $slotNumber])->first();
        if (!$slot) {
            return ['result' => 'fail', 'message' => '슬롯 로드에 실패했습니다. 아이디 정보를 확인하세요'];
        } else {
            return ['result' => 'success', 'data' => $slot];
        }
    }

    /**
     * @param string $userId
     * @param int $slotNumber
     * @return array
     */
    public function create(string $userId, int $slotNumber)
    {
        $result = Slot::insert(['userId' => $userId, 'slotNumber' => $slotNumber]);
        Log::debug('createSlot', ['result' => $result]);
        if ($result) {
            return [
                'result' => 'success',
                'message' => '슬롯 생성에 성공했습니다.',
                'response_code' => Response::HTTP_CREATED
            ];
        } else {
            return [
                'result' => 'fail',
                'message' => '슬롯 생성에 실패했습니다.',
                'response_code' => Response::HTTP_INTERNAL_SERVER_ERROR
            ];
        }
    }

    /**
     * @param string $userId
     * @param int $slotNumber
     * @param array $data
     * @return int
     */
    public function update(string $userId, int $slotNumber, array $data)
    {
        return Slot::where(['userId' => $userId, 'slotNumber' => $slotNumber])->update($data);
    }

    /**
     * @param string $userId
     * @return mixed
     */
    public function delete(string $userId)
    {
        return Slot::where(['userId' => $userId])->delete();
    }
}
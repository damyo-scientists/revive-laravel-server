<?php
/**
 * Created by PhpStorm.
 * User: Velmont
 * Date: 2019-06-06
 * Time: 오후 1:38
 */

namespace App\Http\Controllers;


use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Log;

class LoginController
{
    /**
     * @var UserService
     */
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function signIn(Request $request)
    {
        $id = $request->input('user_id');
        $password = $request->input('password');

        $user = $this->userService->signIn($id, $password);
        Log::info('user', ['userInfo' => $user]);

        if (!$user) {
            return response()->json(['message' => '로그인에 실패했습니다. 아이디 혹은 패스워드를 확인하세요'], Response::HTTP_UNPROCESSABLE_ENTITY);
        } else {
            return response()->json(['data' => $user]);
        }
    }

    public function signUp(Request $request)
    {
        $userId = $request->input('user_id');
        $password = $request->input('password');

        $user = $this->userService->signUp($userId, $password);
        Log::info('user', $user);

        if ($user['result'] == 'success') {
            return response()->json(['message' => $user['message']]);
        } else {
            return response()->json(['message' => $user['message']], $user['response_code']);
        }
    }
}
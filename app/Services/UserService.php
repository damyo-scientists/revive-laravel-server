<?php
/**
 * Created by PhpStorm.
 * User: Velmont
 * Date: 2019-05-24
 * Time: 오후 3:52
 */

namespace App\Services;


use App\Models\User;
use Illuminate\Http\Response;

class UserService
{
    public function getUser(string $userId)
    {
        $user = User::where(['userId' => $userId]);
        if ($user) {
            return $user->first();
        } else {
            return false;
        }
    }

    public function signIn(string $userId, string $password)
    {
        $user = $this->getUser($userId);

        if (!$user) {
            return false;
        }

        $encryptedPassword = md5($password);
        if ($user->password !== $encryptedPassword) {
            return false;
        }

        return $user;
    }

    public function signUp(string $userId, string $password)
    {
        $user = $this->getUser($userId);

        if ($user) {
            return [
                'result' => 'fail',
                'message' => '중복된 아이디입니다.',
                'response_code' => Response::HTTP_CONFLICT
            ];
        }

        $user = User::insert(['userId' => $userId, 'password' => md5($password)]);
        if (!$user) {
            return [
                'result' => 'fail',
                'message' => '가입에 실패했습니다.',
                'response_code' => Response::HTTP_INTERNAL_SERVER_ERROR
            ];
        }

        return [
            'result' => 'success',
            'message' => '가입에 성공했습니다.'
        ];
    }
}
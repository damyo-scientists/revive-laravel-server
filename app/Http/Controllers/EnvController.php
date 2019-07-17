<?php
/**
 * Created by PhpStorm.
 * User: Velmont
 * Date: 2019-06-22
 * Time: 오후 1:41
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class EnvController
{
    /**
     * PlayController constructor.
     * @param EnvService $envService
     */
    public function __construct(EnvService $envService)
    {
        $this->playService = $envService;
    }

    public function get(Request $request)
    {
        return $this->playService->getByUserId($request->input('user_id'));
    }

    public function create(Request $request)
    {
        return $this->playService->create($request->input('user_id'));
    }

    public function update(Request $request)
    {
        return $this->playService->update($request->input('user_id'), []);
    }

    public function delete(Request $request)
    {
        return $this->playService->delete($request->input('user_id'));
    }
}
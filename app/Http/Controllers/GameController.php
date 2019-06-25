<?php
/**
 * Created by PhpStorm.
 * User: Velmont
 * Date: 2019-06-22
 * Time: 오후 1:41
 */

namespace App\Http\Controllers;


class GameController
{
    /**
     * PlayController constructor.
     * @param PlayService $playService
     */
    public function __construct(PlayService $playService)
    {
        $this->playService = $playService;
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
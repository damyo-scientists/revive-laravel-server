<?php
/**
 * Created by PhpStorm.
 * User: Velmont
 * Date: 2019-06-22
 * Time: 오후 2:30
 */

namespace Tests\Feature;


use Tests\TestCase;

class PlayTest extends TestCase
{
    public function testCreatePlay()
    {
        $response = $this->POST('/api/plays', ['user_id' => '5cf8adfc9dc6d605063632d2']);
        $response->assertStatus(200);
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: Velmont
 * Date: 2019-06-22
 * Time: 오후 1:45
 */

namespace Tests\Feature;


use Tests\TestCase;

class SlotTest extends TestCase
{
    public function testGetSlot()
    {
        $response = $this->get('/api/slots/{$id}');
        $response->assertStatus(200);
    }
}
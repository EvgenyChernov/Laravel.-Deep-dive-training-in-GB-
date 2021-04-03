<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('feedback/create');
        $response->assertStatus(200);
    }

    public function test_status_views_feedback_create()
    {
        $response = $this->get('feedback/create');
        $response->assertSuccessful();
    }

    public function test_status_views_order_create()
    {
        $response = $this->get('orders/create');
        $response->assertStatus(200);
    }

    public function test_show_only_one_category()
    {
        $id = random_int(1, 5);
        $response = $this->get('/category/show' . $id);

        $response->assertStatus(200);
    }
}

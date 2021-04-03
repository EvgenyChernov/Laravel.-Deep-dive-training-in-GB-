<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_show_news_list()
    {
        $response = $this->get('/news');

        $response->assertStatus(200);
    }

    public function test_show_only_one_news()
    {
        $id = random_int(1, 9);
        $response = $this->get('/news/show/' . $id);

        $response->assertStatus(200);
    }


}

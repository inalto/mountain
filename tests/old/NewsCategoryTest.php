<?php

namespace Tests\Feature;

use Tests\TestCase;

class NewsCategoryTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_can_create_news_category()
    {
        $response = $this->get('/admin/news-categories/create');

        $response->assertStatus(200);
    }
}

<?php

namespace Tests\Feature;

use Tests\FeatureTestCase;

class CategoryTest extends FeatureTestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    public function test_hierarchy_categories()
    {
        $response = $this->getJson("/api/categories");

        $response->assertJsonFragment(["success" => true]);
    }

    public function test_hierarchy_categories_order_parent_id()
    {
        $response = $this->getJson("/api/categories?order=parent_id&order_by=asc");

        $response->assertJsonFragment(["success" => true]);
    }

    public function test_hierarchy_categories_order_validate()
    {
        $response = $this->getJson("/api/categories?order=test");

        $response->assertJsonFragment(["message" => "The selected order is invalid."]);
    }
}

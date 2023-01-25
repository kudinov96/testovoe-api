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
}

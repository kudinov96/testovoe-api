<?php

namespace Tests\Feature;

use Tests\FeatureTestCase;

class ProductTestTest extends FeatureTestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    public function test_products()
    {
        $response = $this->getJson("/api/products");

        $response->assertJsonFragment(["success" => true]);
    }

    public function test_products_order_title()
    {
        $response = $this->getJson("/api/products?order=title&order_by=asc");

        $response->assertJsonFragment(["success" => true]);
    }

    public function test_products_order_validate()
    {
        $response = $this->getJson("/api/products?order=test");

        $response->assertJsonFragment(["message" => "The selected order is invalid."]);
    }
}

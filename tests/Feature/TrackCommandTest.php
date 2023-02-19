<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class TrackCommandTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    /** @test */
    function it_checks_stock_for_products_at_retailers()
    {
        $this->assertFalse(Product::first()->inStock());

        Http::fake(fn()=> ['available'=>true,'price'=> 20000]);

        $this->artisan('track');

        $this->assertTrue(Product::first()->inStock());

    }
}

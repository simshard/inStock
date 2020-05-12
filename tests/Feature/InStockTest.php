<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Product;
use App\Retailer;
use App\Stock;

class InStockTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_checks_stock_for_products_at_retailers()
    {
        $strimmer = Product::create(['name' => 'Rechargeable Strimmer']);
        $bandq = Retailer::create(['name' => 'B&Q']);
        
        $this->assertFalse($strimmer->inStock());

        $stock = new Stock(
            [
            'price' => 99,
            'url' => 'http://foo.com',
            'sku' => '12345',
            'in_stock' => true
            ]
        );
        $bandq->addStock($strimmer, $stock);
        $this->assertTrue($strimmer->inStock());
    }
}

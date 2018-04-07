<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Product;

class ProductUnitTest extends TestCase
{
	/**
     * Diaplay Products.
     *
     * @return void
     */
    public function testProductDisplayTest()
    {
    	$productFactory = factory(Product::class)->create();
      
        $products = Product::all();
      
        $this->assertTrue($products->contains($productFactory));

    }

    /**
     * Create Product Test.
     *
     * @return void
     */
    public function testProductCreateTest()
    {
        $data = [
            'name' => 'New Product',
            'quantity' => array_random([rand(1, 100)]),
            'price' => array_random([rand(100, 1000)]),
        ];
      
        $product = new Product();
        $newProduct = $product->create($data);
      
        $this->assertInstanceOf(Product::class, $newProduct);
        $this->assertEquals($data['name'], $newProduct->name);
        $this->assertEquals($data['quantity'], $newProduct->quantity);
        $this->assertEquals($data['price'], $newProduct->price);
    }

    /**
     * Update Product Test.
     *
     * @return void
     */
    public function testProductUpdateTest()
    {
        $productFactory = factory(Product::class)->create();
        
        $data = [
            'name' => 'New Product Name',
            'quantity' => array_random([rand(1, 100)]),
            'price' => array_random([rand(100, 1000)]),
        ];

        $product = Product::find(1);
        $updatedProduct = $product->update($data);
        
        $this->assertTrue($updatedProduct);
        $this->assertEquals($data['name'], $product->name);
        $this->assertEquals($data['quantity'], $product->quantity);
        $this->assertEquals($data['price'], $product->price);
    }
}

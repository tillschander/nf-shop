<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Product;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    public function testCreateProduct()
    {
        $data = [
            'name' => 'Product x',
            'price' => '100',
            'description' => 'Test Product Test Product',
            'msrp' => '200',
            'stock' => '1'
        ];
        $product = Product::create($data);

        $this->assertNotNull($product);
        $this->assertInstanceOf(Product::class, $product);
        $this->assertEquals($data['name'], $product->name);
        $this->assertEquals($data['price'], $product->price);
        $this->assertEquals($data['description'], $product->description);
        $this->assertEquals($data['msrp'], $product->msrp);
        $this->assertEquals($data['stock'], $product->stock);
    }

    public function testDeleteProduct()
    {
        $product = factory(Product::class)->create();

        $this->assertDatabaseHas('products', [
            'name' => $product->name,
            'price' => $product->price,
            'description' => $product->description,
            'msrp' => $product->msrp,
            'stock' => $product->stock,
        ]);
        $product->delete();
        $this->assertDeleted($product);
    }
}

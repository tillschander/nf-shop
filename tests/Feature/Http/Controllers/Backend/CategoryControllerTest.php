<?php

namespace Tests\Feature\Http\Controllers\Backend;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Product;
use App\User;

class CategoryControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function testCreateNewCategoryAndAddProductsToCategory()
    {
        //initialize data
        $productIds = [];
        $user = factory(User::class)->create();
        $categoryName = $this->faker->name;

        // generate products
        for ($i = 0; $i <= 10; $i++) {
            $product = factory(Product::class)->create();
            array_push($productIds, $product->id);
        }

        //start testing
        foreach ($productIds as $productId) {
            $this->assertDatabaseHas('products', [
                'id' => $productId
            ]);
        }
        $this->actingAs($user)->post(route('admin.categories.store'), [
            'name' => $categoryName,
            'products' => $productIds
        ]);
        $this->assertDatabaseHas('categories', [
            'name' => $categoryName
        ]);
        foreach ($productIds as $productId) {
            $this->assertDatabaseHas('category_product', [
                'category_id' => 1,
                'product_id' => $productId
            ]);
        }
    }
}

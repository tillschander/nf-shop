<?php

namespace Tests\Feature\Http\Controllers\Backend;

use Tests\TestCase;
use App\User;

class OrderControllerTest extends TestCase
{
    public function testIndexRouteDisplaysIndexView()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get(route(
            'admin.orders.index'
        ));
        $response->assertViewIs(
            'backend.orders.index'
        );
        $response->assertStatus(200);
    }

    public function testGuestCantSeeOrders()
    {
        $response = $this->get(route('admin.orders.index'));
        $response->assertRedirect(route('login'));
        $response->assertStatus(302);
    }

    // TODO Finish implementation
    // public function testOrderCanBeDeleted()
    // {
    //     $user = factory(User::class)->create();
    //     $order = factory(Order::class)->create();
    //     $response = $this->actingAs($user)->delete(route(
    //         'admin.orders.destroy',
    //         $order
    //     ));
    //     $this->assertDeleted($order);
    // }
}

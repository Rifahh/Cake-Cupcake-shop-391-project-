<?php

namespace Tests\Unit;


use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RouteTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_about()
    {
        $response = $this->get('/about');
        $response->assertStatus(200);
    }

    public function test_contact()
    {
        $response = $this->get('/contact');
        $response->assertStatus(200);
    }


    public function test_login()
    {
       $response = $this->get('/login');
       $response->assertStatus(200);
 
    }
 
    public function test_singleproduct()
    {
       $response = $this->get('/single_product');
       $response->assertStatus(200);
 
    }
 
    public function test_checkout()
    {
       $response = $this->get('/checkout');
       $response->assertStatus(200);
 
    }

    public function test_remove_from_cart()
    {
       $response = $this->get('/remove_from_cart');
       $response->assertStatus(200);
 
    }

    public function test_edit_product_quantity()
    {
       $response = $this->get('/edit_product_quantityt');
       $response->assertStatus(404);
 
    }

    public function test_place_order()
    {
       $response = $this->get('/place_order');
       $response->assertStatus(405);
 
    }

    public function test_cart()
    {
       $response = $this->get('/cart');
       $response->assertStatus(200);
 
    }


 
}

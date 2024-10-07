<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class FirstTest extends TestCase
{
    use RefreshDatabase; // This will reset the database after each test
    /**
     * A basic feature test example.
     */
    public function test_say_Salaam()
    {
        $response = $this->get('/test');
        $response->assertStatus(200);
        $response->assertSee('Salaam');
    }

    // test function for inserting data
    public function test_data_in_db()
    {
        $data = [
            'name' => 'test user',
            'email' => 'test@test.com',
            'password' => bcrypt('password')
        ];

        // send to route for testing
        $response = $this->post('/user',$data);

        $response->assertStatus(200);

        $response->assertSee('User created successfully');

        $this->assertDatabaseHas('users',[
            'email' => 'test@test.com',
        ]);


    }
}

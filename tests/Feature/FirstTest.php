<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class FirstTest extends TestCase
{
    // use RefreshDatabase; // This will reset the database after each test
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
    // public function test_data_in_db()
    // {
    //     $data = [
    //         'name' => 'test user1',
    //         'email' => 'test1@test.com',
    //         'password' => bcrypt('password')
    //     ];

    //     // send to route for testing
    //     $response = $this->post('/user', $data);

    //     $response->assertStatus(200);

    //     $response->assertSee('User created successfully');

    //     $this->assertDatabaseHas('users', [
    //         'email' => 'test@test.com',
    //     ]);
    // }

    // public function test_update_in_db()
    // {
    //     $user = DB::table('users')->where('email','test1@test.com')->first();

    //     $uodatedData = [
    //         'name' => 'Updated Name',
    //         'email' => 'updated@test.com'
    //     ];

    //     $response = $this->post("/user/{$user->id}",$uodatedData);

    //     $response->assertStatus(200);

    //     $response->assertSee('User updated successfully');
    //     $this->assertDatabaseHas('users',[
    //         'id' => $user->id,
    //         'name' => 'Updated Name',
    //         'email' => 'updated@test.com'
    //     ]);
    // }

    // public function test_delete_in_db()
    // {
    //     $user = DB::table('users')->where('email','updated@test.com')->first();
    //     $response = $this->post("/deleteuser/{$user->id}");

    //     $response->assertStatus(200);

    //     $response->assertSee('User deleted successfully');

    //     $this->assertDatabaseMissing('users',[
    //         'id' => $user->id,
    //         'name' => 'Updated Name',
    //         'email' => 'updated@test.com'
    //     ]);
    // }

    // test function for inserting data
    public function test_data_in_db()
    {
        $data = [
            'name' => 'test user1',
            'email' => 'test1@test.com',
            'password' => bcrypt('password')
        ];

        // send to route for testing
        $response = $this->post('api/test', $data);

        $response->assertStatus(200);

        $response->assertSee('User created successfully');

        $this->assertDatabaseHas('users', [
            'email' => 'test1@test.com',
        ]);
    }

}

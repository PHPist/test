<?php

namespace Tests\Feature;


use App\Models\User;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $user = User::factory()->create();

        $response = $this->actingAs( $user )
            ->withSession(["banned"=>false])
            ->get("/");

        $response->assertStatus(200);



    }
}

<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
// use Illuminate\Foundation\Testing\DatabaseMigration;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserAuthTest extends TestCase
{
    // use RefreshDatabase;
    // use DatabaseMigration;
    // use Authenticatable;

    //chech if a user can be redirected when logged in
    public function test_redirect_user_after_registration()
    {
        User::factory()->create([
            'email' => 'test@test.com',
            'password' => bcrypt('password')
        ]);

        $response = $this->post('/login', [
            'email' => 'test@test.com',
            'password' => 'password'
        ]);
        $response->assertStatus(302);
        $response->assertRedirect('/home');
    }


    public function test_route_requires_user_auth(){
        $user = User::factory()->create();
         $response = $this->actingAs($user)
                          ->withSession(['banned' => false])
                          ->get('/');
        $response->assertStatus(200);

    }
}

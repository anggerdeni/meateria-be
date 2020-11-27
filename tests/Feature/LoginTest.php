<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\User;

class LoginTest extends TestCase
{
    use RefreshDatabase;
    public function setUp() : void{
        parent::setUp();
        $this->artisan('passport:install');
    }
        
    public function testUserLoginWithEmailSuccessfully()
    {
        $user = User::factory()->create([
            'username' => 'johndoe',
            'email' => 'john@doe.com',
        ]);

        $payload = ['login' => 'john@doe.com', 'password' => 'password'];

        $this->json('POST', '/api/auth/login', $payload)
            ->assertStatus(200)
            ->assertJsonStructure([
                'success',
                'data' => [
                    'id',
                    'username',
                    'balance',
                    'name',
                    'email',
                    'email_verified_at',
                    'phone',
                    'address',
                    'profile_picture',
                    'created_at',
                    'updated_at',
                    'token',
                ],
                'message'
            ]);
    }

    public function testUserLoginWithUsernameSuccessfully()
    {
        $user = User::factory()->create([
            'username' => 'johndoe',
            'email' => 'john@doe.com',
        ]);

        $payload = ['login' => 'johndoe', 'password' => 'password'];

        $this->json('POST', '/api/auth/login', $payload)
            ->assertStatus(200)
            ->assertJsonStructure([
                'success',
                'data' => [
                    'id',
                    'username',
                    'balance',
                    'name',
                    'email',
                    'email_verified_at',
                    'phone',
                    'address',
                    'profile_picture',
                    'created_at',
                    'updated_at',
                    'token',
                ],
                'message'
            ]);
    }

    public function testUserLoginWrongCredential()
    {
        $user = User::factory()->create([
            'username' => 'johndoe',
            'email' => 'john@doe.com',
        ]);

        $payload = ['login' => 'johndoe', 'password' => 'somethingelse'];

        $this->json('POST', '/api/auth/login', $payload)
            ->assertStatus(401)
            ->assertJson([
                'success' => false,
                'message' => 'username / email / password salah'
            ]);
    } 
    
    public function testUserLoginEmptyData()
    {
        $this->json('POST', '/api/auth/login')
            ->assertStatus(401)
            ->assertJson([
                'success' => false,
                'message' => 'username / email / password salah'
            ]);
    }    
}

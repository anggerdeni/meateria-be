<?php

namespace Tests\Feature;

use Illuminate\Http\UploadedFile;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

use App\Models\User;

class RegisterTest extends TestCase
{
    use RefreshDatabase;
    public function setUp() : void{
        parent::setUp();
        $this->artisan('passport:install');
    }

    public function testRegisterSuccessfully()
    {
        Storage::fake('avatars');
        $payload = [
            'username' => 'johndoe',
            'name' => 'John Doe',
            'email' => 'john@doe.com',
            'password' => 'johndoe',
            'confirm_password' => 'johndoe',
            'profile_picture' => UploadedFile::fake()->image('avatar.png')->size(1024),
            'phone' => '0812345678',
            'address' => 'Somewhere in this world',
        ];

        $this->json('post', '/api/auth/register', $payload)
            ->assertStatus(201)
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

    public function testMissingRequiredParameters()
    {
        $this->json('post', '/api/auth/register')
            ->assertStatus(422)
            ->assertJson([
                'success' => false,
                'message' => 'Validation Error'
            ]);
    }

    public function testImageTooLarge()
    {
        Storage::fake('avatars');
        $payload = [
            'username' => 'johndoe',
            'name' => 'John Doe',
            'email' => 'john@doe.com',
            'password' => 'johndoe',
            'confirm_password' => 'johndoe',
            'profile_picture' => UploadedFile::fake()->image('avatar.png')->size(4096),
            'phone' => '0812345678',
            'address' => 'Somewhere in this world',
        ];

        $this->json('post', '/api/auth/register', $payload)
            ->assertStatus(422)
            ->assertJson([
                'success' => false,
                'message' => 'Validation Error'
            ]);
    }

    public function testRegisterUsingExistingUsername()
    {
        $user = User::factory()->create([
            'username' => 'johndoe',
            'email' => 'john@doe.com',
        ]);

        Storage::fake('avatars');
        $payload = [
            'username' => 'johndoe',
            'name' => 'John Doe',
            'email' => 'validemail@example.com',
            'password' => 'johndoe',
            'confirm_password' => 'johndoe',
            'profile_picture' => UploadedFile::fake()->image('avatar.png')->size(2048),
            'phone' => '0812345678',
            'address' => 'Somewhere in this world',
        ];

        $this->json('post', '/api/auth/register', $payload)
            ->assertStatus(422)
            ->assertJson([
                'success' => false,
                'message' => 'Validation Error',
                'data' => [
                    'username' => [
                        'The username has already been taken.'
                    ]
                ]
            ]);
    }

    public function testRegisterUsingExistingEmail()
    {
        $user = User::factory()->create([
            'username' => 'johndoe',
            'email' => 'john@doe.com',
        ]);

        Storage::fake('avatars');
        $payload = [
            'username' => 'sherlock',
            'name' => 'John Doe',
            'email' => 'john@doe.com',
            'password' => 'johndoe',
            'confirm_password' => 'johndoe',
            'profile_picture' => UploadedFile::fake()->image('avatar.png')->size(2048),
            'phone' => '0812345678',
            'address' => 'Somewhere in this world',
        ];

        $this->json('post', '/api/auth/register', $payload)
            ->assertStatus(422)
            ->assertJson([
                'success' => false,
                'message' => 'Validation Error',
                'data' => [
                    'email' => [
                        'The email has already been taken.'
                    ]
                ]
            ]);
    }
}

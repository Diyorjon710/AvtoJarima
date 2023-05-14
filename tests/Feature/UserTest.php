<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_create_user(): void
    {
        $response = $this->post('create-user', [
            'name' => 'Sally',
            'email' => 'sally@app.com',
            'password' => 'password',
        ]);

        $response->assertStatus(200);
    }

    public function test_can_show_user()
    {
        $response = $this->get('all-users');

        $response
            ->assertStatus(200);
    }

    public function test_can_update_user()
    {
        $lastUser = User::latest()->first();

        $response = $this->put('update-user/' . $lastUser->id, [
            'name' => 'Sally2',
            'email' => 'sally@app.com',
            'password' => 'password2',
        ]);

        $response->assertStatus(200);
    }

    public function test_can_search_user()
    {
        $lastUser = User::latest()->first();

        $response = $this->post('search-user', [
            'name' => $lastUser->name,
        ]);

        $response->assertStatus(200);
    }

    public function test_can_delete_user()
    {
        $lastUser = User::latest()->first();

        $response = $this->delete('delete-user' . $lastUser->id);

        $response->assertStatus(200);

    }

    public function test_can_download_users()
    {
        $response = $this->get('users-export');

        $response->assertStatus(200);
    }

    public function test_can_login_user()
    {
        $user = User::latest()->first();

        $response = $this->post('login', [
            'email' => 'diyorjon710@app.com',
            'password' => '12345678',
        ]);

        $response->assertStatus(200);
    }
}

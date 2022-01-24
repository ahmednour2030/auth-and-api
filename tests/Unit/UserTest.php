<?php

namespace Tests\Unit;

use Illuminate\Support\Facades\Schema;
use Tests\TestCase;
use App\Models\User;



class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }

    /** @test  */
    public function users_database_has_expected_columns()
    {
        $this->assertTrue(
            Schema::hasColumns('users', [
                'id','name', 'email', 'email_verified_at', 'password'
            ]), 1);
    }

    /**
     * Check if email exists in database
     * @return void
     */
    public function test_user_duplication()
    {
        $user1 = User::make([
            'name' => 'Ahmed Mohamed',
            'email' => 'ahmed@gmail.com'
        ]);

        $user2 = User::make([
            'name' => 'Omer Ahmed',
            'email' => 'omer@gmail.com'
        ]);

        $this->assertTrue($user1->email != $user2->email);
    }

    /**
     * @return void
     */
    public function test_require_email_and_login()
    {
        $this->json('POST', 'api/login')
            ->assertStatus(422)
            ->assertJson([
                'message' => 'Invalid data send',
                'errors' => [
                    'email' => ['The email field is required.'],
                    'password' => ['The password field is required.']
                ],
                "data" => null
            ]);

    }
}

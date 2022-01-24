<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
//use PHPUnit\Framework\TestCase;
use Tests\TestCase;

class StudentTest extends TestCase
{
    /** @test  */
    public function students_database_has_expected_columns()
    {
        $this->assertTrue(
            Schema::hasColumns('students', [
                'name', 'email', 'phone', 'school_id'
            ]), 1);
    }

    public function test_logout_successfully()
    {
        $user = ['email' => 'user@email.com',
            'password' => 'password'
        ];
        Auth::attempt($user);
        $token = Auth::user()->createToken('token')->accessToken;
        $headers = ['Authorization' => "Bearer $token"];
        $this->json('GET', 'api/logout', [], $headers)
            ->assertStatus(204);
    }
}

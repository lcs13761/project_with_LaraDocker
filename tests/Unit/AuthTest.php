<?php

namespace Tests\Unit;

use App\Models\User;
use PHPUnit\Framework\TestCase;

class AuthTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_login()
    {

        $user = User::attempt([
            'email' => 'test@example.com',
            'password' => 'passwrod'
        ]);
        $this->assertTrue($user);
    }
}

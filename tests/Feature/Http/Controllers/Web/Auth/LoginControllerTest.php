<?php

namespace Feature\Http\Controllers\Web\Auth;


use Tests\TestCase;

class LoginControllerTest extends TestCase
{

    public function test_LoginPagePath(): void
    {
        $response = $this->get('/' . config('app.admin_prefix') . '/login');
        $response->assertStatus(200);
    }
}

<?php

namespace Tests\Feature\Http\Controllers;


use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BackendPageControllerTest extends TestCase
{

    public function test_redirectFromRootPath(): void
    {
        $response = $this->get('/');
        $response->assertStatus(302);
    }
}

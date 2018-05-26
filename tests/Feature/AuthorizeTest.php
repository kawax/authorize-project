<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use Mockery;

use GuzzleHttp\Client;

use Revolution\Authorize\Facades\Authorize;

class AuthorizeTest extends TestCase
{
    public function tearDown()
    {
        parent::tearDown();

        Mockery::close();
    }

    public function testMock()
    {
        $client = Mockery::mock(Client::class);
        $client->shouldReceive('get')->andReturn('test');

        Authorize::shouldReceive('login')->andReturn(true);
        Authorize::shouldReceive('client')->andReturn($client);

        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testDefault()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testNico()
    {
        $response = $this->get('/nico');

        $response->assertStatus(200);
    }

    public function testA8()
    {
        $response = $this->get('/a8');

        $response->assertStatus(200);
    }

    public function testVc()
    {
        $response = $this->get('/vc');

        $response->assertStatus(200);
    }

    public function testCustom()
    {
        $response = $this->get('/custom');

        $response->assertStatus(200);
    }
}

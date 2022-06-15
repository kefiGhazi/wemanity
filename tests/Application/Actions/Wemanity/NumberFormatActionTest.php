<?php

namespace Tests\Application\Actions\Wemanity;

use App\Infrastructure\Persistence\Wemanity\InMemoryWemanityRepository;
use Tests\TestCase;

class NumberFormatActionTest extends TestCase
{
    public function testAction()
    {
        $app = $this->getAppInstance();

        $request = $this->createRequest('GET', '/');
        $response = $app->handle($request);

        $payload = (string) $response->getBody();
        $result = json_decode($payload, JSON_PRETTY_PRINT);
        $this->assertEquals($result['statusCode'], 200);
        $this->assertEquals($result['data'][3], 'FooFoo');
    }
}

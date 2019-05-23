<?php
namespace Freepeace\Larabone\Test;

use Orchestra\Testbench\TestCase;
use Symfony\Component\HttpFoundation\Response;
use Freepeace\Larabone\Testing\ServiceProvider as TestServiceProvider;

class ExceptionResponseTest extends TestCase
{
    public function test_can_get_not_found_response()
    {
        $response = $this->json('GET', '/not-found-exception-url');

        $response
            ->assertStatus(Response::HTTP_NOT_FOUND)
            ->assertJson([
                'message'   => 'Entity not exists.',
                'exception' => 'Freepeace\\Larabone\\Exceptions\\NotFoundException'
            ]);
    }

    public function test_can_get_unauthorized_response()
    {
        $response = $this->json('GET', '/unauthorized-exception-url');

        $response
            ->assertStatus(Response::HTTP_UNAUTHORIZED)
            ->assertJson([
                'message'   => 'Request is not authorized.',
                'exception' => 'Freepeace\\Larabone\\Exceptions\\UnauthorizedException'
            ]);
    }

    public function test_can_get_forbidden_response()
    {
        $response = $this->json('GET', '/forbidden-exception-url');

        $response
            ->assertStatus(Response::HTTP_FORBIDDEN)
            ->assertJson([
                'message'   => 'Request is not allowed.',
                'exception' => 'Freepeace\\Larabone\\Exceptions\\ForbiddenException'
            ]);
    }

    protected function getPackageProviders($app)
    {
        return [
            TestServiceProvider::class
        ];
    }
}

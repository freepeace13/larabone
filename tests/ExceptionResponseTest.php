<?php
namespace Freepeace\Larabone\Test;

use Symfony\Component\HttpFoundation\Response;

class ExceptionResponseTest extends TestCase
{
    public function test_can_get_not_found_response()
    {
        $response = $this->json('GET', '/not-found-exception-url');

        $response
            ->assertStatus(Response::HTTP_NOT_FOUND)
            ->assertJson([
                'message'   => 'Entity not exists.',
                'debug' => [
                    'exception' => 'NotFoundException'
                ]
            ]);
    }

    public function test_can_get_unauthorized_response()
    {
        $response = $this->json('GET', '/unauthorized-exception-url');

        $response
            ->assertStatus(Response::HTTP_UNAUTHORIZED)
            ->assertJson([
                'message'   => 'Request is not authorized.',
                'debug' => [
                    'exception' => 'UnauthorizedException'
                ]
            ]);
    }

    public function test_can_get_forbidden_response()
    {
        $response = $this->json('GET', '/forbidden-exception-url');

        $response
            ->assertStatus(Response::HTTP_FORBIDDEN)
            ->assertJson([
                'message'   => 'Request is not allowed.',
                'debug' => [
                    'exception' => 'ForbiddenException'
                ]
            ]);
    }

    public function test_can_get_validation_error_response()
    {
        $response = $this->json('POST', '/validation-exception-url', [
            'body' => 'This is sample body text'
        ]);

        $response
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
            ->assertJson([
                'message' => 'The given data was invalid.',
                'errors' => [
                    'title' => ['The title field is required.']
                ]
            ]);
    }

    public function test_can_get_authentication_error_response()
    {
        $response = $this->json('GET', '/authentication-exception-url');

        $response
            ->assertStatus(Response::HTTP_UNAUTHORIZED)
            ->assertJson([
                'message'   => 'Unauthenticated.'
            ]);
    }

    public function test_can_get_authorization_error_response()
    {
        $response = $this->json('GET', '/authorization-exception-url');

        $response
            ->assertStatus(Response::HTTP_UNAUTHORIZED)
            ->assertJson([
                'message' => 'Request is not authorized.'
            ]);
    }

    public function test_can_get_model_not_found_error_response()
    {
        $response = $this->json('GET', '/model-not-found-exception-url');

        $response
            ->assertStatus(Response::HTTP_NOT_FOUND)
            ->assertJson([
                'message' => 'Entity not found.',
                'debug' => [
                    'exception' => 'ModelNotFoundException'
                ]
            ]);
    }
}

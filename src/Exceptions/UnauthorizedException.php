<?php

namespace Freepeace\Larabone\Exceptions;

use Symfony\Component\HttpFoundation\Response;

class UnauthorizedException extends APIException
{
    public function __construct(string $message = null, array $headers = [])
    {
        parent::__construct(Response::HTTP_UNAUTHORIZED, $message, null, []);
    }
}

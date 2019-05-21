<?php

namespace Freepeace\Larabone\Exceptions;

use Symfony\Component\HttpFoundation\Response;

class ForbiddenException extends APIException
{
    public function __construct(string $message = null, array $headers = [])
    {
        parent::__construct(Response::HTTP_FORBIDDEN, $message, null, []);
    }
}

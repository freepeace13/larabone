<?php

namespace Freepeace\Larabone\Exceptions;

use Symfony\Component\HttpFoundation\Response;

class NotFoundException extends APIException
{
    public function __construct(string $message = null, array $headers = [])
    {
        parent::__construct(Response::HTTP_NOT_FOUND, $message, null, $headers);
    }
}

<?php

namespace Freepeace\Larabone\Exceptions;

use Exception;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

class APIException extends HttpException
{
    public static function responder($request, Exception $exception)
    {
        $statusCode = Response::HTTP_INTERNAL_SERVER_ERROR;

        if (method_exists($exception, 'getStatusCode')) {
            $statusCode = $exception->getStatusCode();
        }

        $response = [
            'message' => $exception->getMessage()
        ];

        if (config('app.debug')) {
            $response['debug'] = [
                'code' => $exception->getCode(),
                'line'  => $exception->getLine(),
                'trace' => $exception->getTrace(),
                'exception' => get_class($exception)
            ];
        }

        if ($exception instanceof ValidationException) {
            $response['errors'] = $exception->errors();
        }

        return response()->json($response, $statusCode);
    }
}

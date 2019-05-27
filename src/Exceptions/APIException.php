<?php

namespace Freepeace\Larabone\Exceptions;

use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Contacts\FileSystem\FileNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;

class APIException extends HttpException
{
    public static function responder($request, Exception $exception)
    {
        $statusCode = Response::HTTP_INTERNAL_SERVER_ERROR;

        $response = [
            'message' => $exception->getMessage()
        ];

        if ($exception instanceof ValidationException) {
            $response['errors'] = $exception->errors();
            $statusCode = Response::HTTP_UNPROCESSABLE_ENTITY;
        } else if ($exception instanceof AuthorizationException) {
            $statusCode = Response::HTTP_UNAUTHORIZED;
        } else if ($exception instanceof AuthenticationException) {
            $statusCode = Response::HTTP_FORBIDDEN;
        } else if ($exception instanceof FileNotFoundException || $exception instanceof ModelNotFoundException) {
            $statusCode = Response::HTTP_NOT_FOUND;
        }

        if (method_exists($exception, 'getStatusCode')) {
            $statusCode = $exception->getStatusCode();
        }

        if (config('app.debug')) {
            $response['debug'] = [
                'code' => $exception->getCode(),
                'line'  => $exception->getLine(),
                'trace' => $exception->getTrace(),
                'exception' => get_class($exception)
            ];
        }

        return response()->json($response, $statusCode);
    }
}

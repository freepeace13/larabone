<?php

namespace Freepeace\Larabone\Testing;

use Exception;
use Freepeace\Larabone\Exceptions\APIException;
use Illuminate\Foundation\Exceptions\Handler as LaravelExceptionHandler;

class ExceptionHandler extends LaravelExceptionHandler
{
    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        return APIException::responder($request, $exception);
    }
}

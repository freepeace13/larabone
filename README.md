# Larabone
Personal laravel extension package for creating APIs.

* [Installation](#installation)
* [Exceptions](#exceptions)
* [Helpers](#helpers)

## Installation
You can install the package via composer:
``` bash
composer require --prefer-dist freepeace/larabone
```

## Exceptions
Package contain three built-in exceptions:
* NotFoundException (404)
* ForbiddenException (403)
* UnauthorizedException (401)

But you can freely create you own exceptions by extending `APIException` class.

Example:
``` bash
<?php

namespace App\Exceptions;

use Freepeace\Larabone\Exceptions\APIException;

class ServerErrorException extends APIException
{
    public function __construct(string $message = null, array $headers = [])
    {
        parent::__construct(500, $message, null, $headers);
    }
}
```

Usage:
``` bash
20:     throw new \App\Exceptions\ServerErrorException('Oops! Something went wrong.');
```

The above example will have JSON response of:
``` bash
# Debug = true
{
    "message": "Oops! Something went wrong",
    "debug": {
        "exception": "App\Exceptions\ServerErrorException",
        "file": "path-to-file-where-exception-is-thrown",
        "line":  20
    }
}
# Debug = false
{
    "message": "Oops! Something went wrong."
}
```

<b>DO NOT FOGET</b> to call `APIException::responder` function in you exception handler. Edit your `App\Exceptions\Handler` class on `render` function:

``` bash
<?php

namespace App\Exceptions;

use Freepace\Larabone\Exceptions\APIException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    public function render($request, Exception $exception)
    {
        if ($request->ajax()) {
            return APIException::responder($request, $exception);
        }

        return parent::render($request, $exception);
    }
}
```

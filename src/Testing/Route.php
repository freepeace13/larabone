<?php

use Freepeace\Larabone\Exceptions\NotFoundException;
use Freepeace\Larabone\Exceptions\ForbiddenException;
use Freepeace\Larabone\Exceptions\UnauthorizedException;

Route::get('/not-found-exception-url', function () {
    throw new NotFoundException('Entity not exists.');
});

Route::get('/forbidden-exception-url', function () {
    throw new ForbiddenException('Request is not allowed.');
});

Route::get('/unauthorized-exception-url', function () {
    throw new UnauthorizedException('Request is not authorized.');
});

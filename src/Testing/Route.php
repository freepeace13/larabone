<?php

use Illuminate\Http\Request;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Freepeace\Larabone\Exceptions\NotFoundException;
use Freepeace\Larabone\Exceptions\ForbiddenException;
use Freepeace\Larabone\Exceptions\UnauthorizedException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

Route::get('/not-found-exception-url',
    function () {
        throw new NotFoundException('Entity not exists.');
    }
);

Route::get('/forbidden-exception-url',
    function () {
        throw new ForbiddenException('Request is not allowed.');
    }
);

Route::get('/unauthorized-exception-url',
    function () {
        throw new UnauthorizedException('Request is not authorized.');
    }
);

Route::post('/validation-exception-url',
    function (Request $request) {
        $request->validate([
            'title' => 'required|min:50',
            'body'  => 'required|max:250'
        ]);
    }
);

Route::get('/authentication-exception-url',
    function () {
        throw new AuthenticationException();
    }
);

Route::get('/authorization-exception-url',
    function () {
        throw new AuthorizationException('Request is not authorized.');
    }
);

Route::get('/model-not-found-exception-url',
    function () {
        throw new ModelNotFoundException('Entity not found.');
    }
);

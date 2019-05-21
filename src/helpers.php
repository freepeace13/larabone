<?php

use Freepeace\Larabone\Helpers\Helper;

function helper(string $address = null, ...$args) {
    $instance = new Helper();

    if (!$address) return $instance;

    $pieces = explode('::', $address);

    return $instance->call($pieces[0], $pieces[1], $args);
}

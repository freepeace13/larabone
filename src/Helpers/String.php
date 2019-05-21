<?php

if (! function_exists('random_token')) {
    function random_token() {
        //
    }
}

if (! function_exists('is_equal')) {
    function is_equal($needle, ...$haystack) {
        return in_array($needle, $haystack);
    }
}
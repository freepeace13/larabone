<?php

namespace Freepeace\Larabone\Helpers;

class Larabone
{
    public function randomToken(int $length = 50)
    {
        $token = "";
        $code = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $code .= "abcdefghijklmnopqrstuvwxyz";
        $code .= "0123456789";

        for ($i = 0; $i < $length; $i++) {
            $token .= $code[random_int(0, strlen($code) - 1)];
        }

        return $token;
    }
}

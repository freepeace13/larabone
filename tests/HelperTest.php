<?php

namespace Freepeace\Larabone\Test;

use Freepeace\Larabone\Helpers\Helper;

class HelperTest extends TestCase
{
    public function test_can_get_helper_instance()
    {
        $this->assertInstanceOf(Helper::class, helper());
    }

    public function test_can_get_random_token()
    {
        $token = helper('Larabone::randomToken', 100);
        $this->assertEquals(strlen($token), 100);
    }
}

<?php

namespace felpado\tests;

use felpado as f;

class fill_validating_or_throwTest extends felpadoTestCase
{
    public function testItFills()
    {
        $this->assertSame(array('a' => 1), f\fill_validating_or_throw(array(), array(
            'a' => f\optional(array('v' => 'is_int', 'd' => 1))
        )));
    }

    /**
     * @expectedException \Exception
     */
    public function testItThrowsIfValidationFails()
    {
        f\fill_validating_or_throw(array('a' => 1), array(
            'a' => f\required(array('v' => 'is_float'))
        ));
    }
}

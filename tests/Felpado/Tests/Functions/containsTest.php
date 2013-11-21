<?php

namespace Felpado\Tests\Functions;

use Felpado\Tests\FunctionTestCase;

class containsTest extends FunctionTestCase
{
    /**
     * @dataProvider associativeCollectionProvider
     */
    public function testExists($collection)
    {
        $this->assertTrue($this->callFunction($collection, 'one'));
        $this->assertTrue($this->callFunction($collection, 'two'));
    }

    /**
     * @dataProvider associativeCollectionProvider
     */
    public function testExistsNotStrict($collection)
    {
        $this->assertTrue($this->callFunction($collection, '4'));
    }

    /**
     * @dataProvider associativeCollectionProvider
     */
    public function testNotExists($collection)
    {
        $this->assertFalse($this->callFunction($collection, 'foo'));
        $this->assertFalse($this->callFunction($collection, 'four'));
    }
}
<?php

namespace Felpado\Tests;

class lastTest extends FunctionTestCase
{
    /**
     * @dataProvider indexedCollectionProvider
     */
    public function test1($collection)
    {
        $this->assertSame('bar', $this->callFunction($collection));
    }

    /**
     * @dataProvider associativeCollectionProvider
     */
    public function test2($collection)
    {
        $this->assertSame('five', $this->callFunction($collection));
    }

    /**
     * @dataProvider emptyCollectionProvider
     */
    public function testEmptyCollection($collection)
    {
        $this->assertNull(null, $this->callFunction($collection));
    }
}
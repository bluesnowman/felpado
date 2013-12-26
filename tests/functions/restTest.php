<?php

namespace felpado\tests;

class restTest extends felpadoTestCase
{
    /**
     * @dataProvider indexedCollectionProvider
     */
    public function testIndexedCollection($collection)
    {
        $this->assertSame(array(
            1 => 5,
            2 => 'foo',
            3 => 'bar',
        ), $this->callFunction($collection));
    }

    /**
     * @dataProvider associativeCollectionProvider
     */
    public function testAssociativeCollection($collection)
    {
        $this->assertSame(array(
            'two' => 2,
            4     => 'four',
            5     => 'five',
        ), $this->callFunction($collection));
    }

    /**
     * @dataProvider provideEmptyColl
     */
    public function testEmptyCollection($collection)
    {
        $this->assertSame(array(), $this->callFunction($collection));
    }
}

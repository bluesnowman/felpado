<?php

namespace felpado\tests;

class maxTest extends felpadoTestCase
{
    /**
     * @dataProvider indexedCollectionProvider
     */
    public function testMax($collection)
    {
        $this->assertSame(5, $this->callFunction($collection));
    }

    /**
     * @dataProvider withCallbackCollectionProvider
     */
    public function testWithCallback($collection)
    {
        $callback = function ($value) { return $value['age']; };
        $expected = array('name' => 'bar', 'age' => 50);

        $this->assertSame($expected, $this->callFunction($collection, $callback));
    }

    /**
     * @dataProvider oneItemCollectionProvider
     */
    public function testOneItemCollection($collection)
    {
        $this->assertSame(2, $this->callFunction($collection));
    }

    /**
     * @dataProvider provideEmptyColl
     */
    public function testEmptyCollection($collection)
    {
        $this->assertNull($this->callFunction($collection));
    }

    public function withCallbackCollectionProvider()
    {
        return $this->provideColl(array(
            array('name' => 'foo', 'age' => 20),
            array('name' => 'bar', 'age' => 50),
            array('name' => 'ups', 'age' => 40),
        ));
    }
}

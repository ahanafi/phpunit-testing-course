<?php

use PHPUnit\Framework\TestCase;

class ItemTest extends TestCase
{
    public function testTokenIsAString():void
    {
        $item = new Item();

        $reflector = new ReflectionClass(Item::class);

        $method = $reflector->getMethod('getToken');
        $method->setAccessible(true);
        $result = $method->invoke($item);

        self::assertIsString($result);
    }
}
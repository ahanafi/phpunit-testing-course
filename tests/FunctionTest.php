<?php

use PHPUnit\Framework\TestCase;

require 'src/function.php';

class FunctionTest extends TestCase
{
    public function testAddReturnsTheCorrectSum(): void
    {
        self::assertEquals(4, add(2, 2));
        self::assertEquals(8, add(5, 3));
    }

    public function testAddDoesNotReturnTheIncorrectSum(): void
    {
        self::assertNotEquals(10, add(2, 2));
    }
}
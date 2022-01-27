<?php

use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    public function testAddingTwoPlusTwoResultsInFour(): void
    {
        $this->assertEquals(4, 2 + 2);
    }
}
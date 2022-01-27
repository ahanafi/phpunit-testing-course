<?php

use PHPUnit\Framework\TestCase;

class QueueTest extends TestCase
{
    protected static $queue;

    protected function setUp(): void
    {
        self::$queue->clear();
    }

    public static function setUpBeforeClass(): void
    {
        self::$queue = new Queue();
    }

    public static function tearDownAfterClass(): void
    {
        self::$queue = null;
    }

    public function testNewQueueIsEmpty(): void
    {
        self::assertEquals(0, self::$queue->getCount());
    }

    public function testAnItemIsAddedToTheQueue(): void
    {
        self::$queue->push("Ahmad");
        self::assertEquals(1, self::$queue->getCount());
    }

    public function testAnItemIsRemovedFromTheQueue(): void
    {
        self::$queue->push("Ahmad");
        $item = self::$queue->pop();
        self::assertEquals(0, self::$queue->getCount());
        self::assertEquals("Ahmad", $item);
    }

    public function testAnItemIsRemovedFromTheFrontOfTheQueue(): void
    {
        self::$queue->push('First');
        self::$queue->push('Second');

        self::assertEquals('First', self::$queue->pop());
    }

    public function testMaxNumberOfItemsCanBeAdded(): void
    {
        for ($i = 1; $i <= Queue::MAX_ITEMS; $i++) {
            self::$queue->push("Item at $i");
        }

        self::assertEquals(Queue::MAX_ITEMS, self::$queue->getCount());
    }

    public function testExceptionThrownWhenAddingItemToAFullQueue():void
    {
        for ($i = 1; $i <= Queue::MAX_ITEMS; $i++) {
            self::$queue->push("Item at $i");
        }

        $this->expectException(QueueException::class);
        self::$queue->push("This is should be occurred an error");
    }
}
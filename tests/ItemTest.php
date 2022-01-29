<?php

use PHPUnit\Framework\TestCase;

class ItemTest extends TestCase
{
    public Item $item;

    protected function setUp(): void
    {
        $this->item = new Item();
    }

    public function testDescriptionIsNotEmpty():void
    {
        self::assertNotEmpty($this->item->getDescription());
    }

    public function testIdIsAnInteger():void
    {
        self::assertIsInt($this->item->getId());
    }
}
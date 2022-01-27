<?php

use PHPUnit\Framework\TestCase;

class MockTest extends TestCase
{
    public function testMock()
    {
        $mailer = new Mailer();
        $result = $mailer->sendMessage('ahanafi.id@gmail.com', 'Hello world!');
        self::assertTrue($result);
    }
}
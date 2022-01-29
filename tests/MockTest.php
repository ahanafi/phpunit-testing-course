<?php

use PHPUnit\Framework\TestCase;

class MockTest extends TestCase
{
    public function testMock(): void
    {
        $mockMailer = $this->createMock(Mailer::class);
        $mockMailer->method('sendMessage')
            ->willReturn(true);

        $result = $mockMailer->sendMessage('ahanafi.id@gmail.com', 'Hello world!');
        self::assertTrue($result);
    }
}
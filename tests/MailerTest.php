<?php

use PHPUnit\Framework\TestCase;

class MailerTest extends TestCase
{
    public function testSendMessageReturnsTrue(): void
    {
        self::assertTrue(Mailer::send('ahanafi.id@mail.com', 'Hello!'));
    }

    public function testInvalidArgumentExceptionIfEmailIsEmpty(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        Mailer::send('', '');
    }
}
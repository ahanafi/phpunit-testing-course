<?php

use PHPUnit\Framework\TestCase;
require '../vendor/autoload.php';

class UserTest extends TestCase
{
    public function testGetFullName(): void
    {
        $user = new User();
        $user->firstName = "Ahmad";
        $user->lastName = "Hanafi";

        self::assertEquals("Ahmad Hanafi", $user->getFullName());
    }

    public function testFullNameIsEmptyByDefault(): void
    {
        $user = new User();
        $user->firstName = '';
        $user->lastName = '';

        self::assertEquals("", $user->getFullName());
    }

    public function testUserHasFirstName(): void
    {
        $user = new User();
        $user->firstName = "Ahmad";

        self::assertEquals("Ahmad", $user->firstName);
    }

    public function testNotificationIsSent(): void
    {
        $user = new User();

        $mockMailer = $this->createMock(Mailer::class);
        $mockMailer->expects($this->once())
            ->method('sendMessage')
            ->with($this->equalTo('ahanafi.id@gmail.com'), $this->equalTo('Lorem ipsum dolor sit amet!'))
            ->willReturn(true);


        $user->setMailer($mockMailer);

        $user->email = "ahanafi.id@gmail.com";
        self::assertTrue($user->notify('Lorem ipsum dolor sit amet!'));
    }

    public function testCannotNotifyUserWithNoEmail():void
    {
        $user = new User();
        $mockMailer = $this->getMockBuilder(Mailer::class)
            ->setMethods(null)
            ->getMock();

        $user->setMailer($mockMailer);
        $this->expectException(Exception::class);
        $user->notify('Hello World!');
    }
}
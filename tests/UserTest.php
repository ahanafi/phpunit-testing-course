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

        self::assertEquals("", $user->getFullName());
    }

    public function testUserHasFirstName(): void
    {
        $user = new User();
        $user->firstName = "Ahmad";

        self::assertEquals("Ahmad", $user->firstName);
    }
}
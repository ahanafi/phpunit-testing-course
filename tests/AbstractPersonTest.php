<?php

use PHPUnit\Framework\TestCase;

class AbstractPersonTest extends TestCase
{
    public function testNameAndTitleIsReturned(): void
    {
        $doctor = new Doctor('Hanafi');
        self::assertEquals('Dr. Hanafi', $doctor->getNameAndTitle());
    }

    public function testNameAndTitleIncludesValuesFromGetTitle(): void
    {
        $mockPerson = $this->getMockBuilder(AbstractPerson::class)
            ->setConstructorArgs(['Hanafi'])
            ->getMockForAbstractClass();
        $mockPerson->method('getTitle')
            ->willReturn('Dr.');

        self::assertEquals('Dr. Hanafi', $mockPerson->getNameAndTitle());
    }
}
<?php

use PHPUnit\Framework\TestCase;

class OrderTest extends TestCase
{
    public function tearDown(): void
    {
        Mockery::close();
    }

    public function testOrderIsProcessedUsingAMock(): void
    {
        $order = new Order(10, 1200);
        self::assertEquals(12000, $order->amount);

        $mockGateway = Mockery::mock('PaymentGateway');
        $mockGateway->expects('charge')
            ->once()
            ->andReturn(true);
        $order->proccess($mockGateway);
    }

    public function testOrderIsProcessedUsingASpy(): void
    {
        $order = new Order(10, 1200);
        self::assertEquals(12000, $order->amount);

        $mockGateway = Mockery::spy('PaymentGateway');
        $order->proccess($mockGateway);

        $mockGateway->shouldHaveReceived('charge')
            ->once()
            ->with(12000);
    }
}
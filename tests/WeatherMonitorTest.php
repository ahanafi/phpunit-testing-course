<?php

use PHPUnit\Framework\TestCase;

class WeatherMonitorTest extends TestCase
{
    protected function tearDown(): void
    {
        Mockery::close();
    }

    // Using PHPunit style
    public function testCorrectAverageIsReturned(): void
    {
        $service = $this->createMock(TemperatureService::class);

        $params = [
            //param, expected return value
            ['08:00', 41],
            ['10:00', 25]
        ];

        $service->expects($this->exactly(2)) //called 2 times
            ->method('getTemperature')
            ->willReturnMap($params);

        $weather = new WeatherMonitor($service);
        $averageTemp = $weather->getAverageTemperature('08:00', '10:00');

        self::assertEquals(33, $averageTemp);
    }

    // Using Mockery style
    public function testCorrectAverageIsReturnedUsingMockery(): void
    {
        $service = Mockery::mock(TemperatureService::class);

        // Mockery::shouldReceive can replaced by Mockery::expects
        // Docs: http://docs.mockery.io/en/latest/reference/alternative_should_receive_syntax.html?highlight=shouldReceive#expects

        $service->expects('getTemperature')
            ->with('08:00')
            ->andReturns(41);

        $service->expects('getTemperature')
            ->with('10:00')
            ->andReturns(25);

        $weather = new WeatherMonitor($service);
        $averageTemp = $weather->getAverageTemperature('08:00', '10:00');

        self::assertEquals(33, $averageTemp);
    }
}
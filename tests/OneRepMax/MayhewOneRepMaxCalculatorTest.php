<?php

use PHPUnit\Framework\TestCase;
use Tomfordweb\HealthCalculators\OneRepMax\MayhewOneRepMaxCalculator;

class MayhewOneRepMaxCalculatorTest extends TestCase
{

    /**
     * @test
     * @group 1rm
     */
    public function test_it_can_calculate_one_rep_max()
    {
        $calculator = new MayhewOneRepMaxCalculator(101, 2);

        $this->assertSame((int) $calculator->calculate(), 112);
    }
}

<?php

use PHPUnit\Framework\TestCase;
use Tomfordweb\HealthCalculators\OneRepMax\WathanOneRepMaxCalculator;

class WathanOneRepMaxCalculatorTest extends TestCase
{

    /**
     * @test
     * @group 1rm
     */
    public function test_it_can_calculate_one_rep_max()
    {
        $calculator = new WathanOneRepMaxCalculator(101, 2);

        $this->assertSame((int) $calculator->calculate(), 108);
    }
}

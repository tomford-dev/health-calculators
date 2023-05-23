<?php

use PHPUnit\Framework\TestCase;
use Tomfordweb\HealthCalculators\HealthCalculatorOptions;
use Tomfordweb\HealthCalculators\OneRepMax\BrzyckiOneRepMaxCalculator;

class BrzyckiOneRepMaxCalculatorTest extends TestCase
{

    /**
     * @test
     * @group 1rm
     */
    public function test_it_can_calculate_one_rep_max()
    {
        $calculator = new BrzyckiOneRepMaxCalculator(101, 2);

        $this->assertSame((int) $calculator->calculate(), 103);
    }
}

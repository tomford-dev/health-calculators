<?php

use PHPUnit\Framework\TestCase;
use Tomfordweb\HealthCalculators\BmrCalculator;
use Tomfordweb\HealthCalculators\HealthCalculatorOptions;

class BmrCalculatorTest extends TestCase
{
    public function test_it_works_for_females()
    {
        $calculator = new BmrCalculator(
            new HealthCalculatorOptions(
                [
                    'gender' => "female",
                    'weight' => 120,
                    'height' => 74,
                    'age' => 24
                ]

            )
        );

        $this->assertSame(1836, $calculator->calculate());
    }
    public function test_it_works_for_males()
    {
        $calculator = new BmrCalculator(
            new HealthCalculatorOptions(
                [
                    'gender' => "male",
                    'weight' => 120,
                    'height' => 74,
                    'age' => 24
                ]

            )
        );

        $this->assertSame(1924, $calculator->calculate());
    }
}

<?php

use PHPUnit\Framework\TestCase;
use Tomfordweb\HealthCalculators\OneRepMax\AbstractOneRepMaxCalculator;
use Tomfordweb\HealthCalculators\OneRepMax\BrzyckiOneRepMaxCalculator;
use Tomfordweb\HealthCalculators\OneRepMax\ExertionPercentages;

class CalculatorStub extends AbstractOneRepMaxCalculator
{
    public function calculate(): float
    {
        return 100.00;
    }
}

class ExertionPercentagesTest extends TestCase
{

    /**
     * @test
     * @group 1rm
     */
    public function it_can_create_an_array_of_ten_elements()
    {
        $this->assertSame(
            count(
                ExertionPercentages::calculate(
                    new BrzyckiOneRepMaxCalculator(100, 2)
                )
            ),
            10
        );
    }

    /**
     * @test
     * @group 1rm
     */
    public function test_each_element_has_a_percentage_value()
    {
        $values = ExertionPercentages::calculate(
            new BrzyckiOneRepMaxCalculator(100, 2)
        );

        foreach ($values as $value) {
            $this->assertObjectHasProperty('percentage', $value);
            $this->assertObjectHasProperty('value', $value);
        }
    }

    /**
     * @test
     * @group 1rm
     */
    public function test_the_lowest_percentage_has_the_correct_value()
    {
        $calculator = new BrzyckiOneRepMaxCalculator(100, 2);
        $expected = $calculator->calculate() / 10;
        $values = ExertionPercentages::calculate(
            $calculator
        );
        $value = current($values);
        $this->assertSame($value->percentage, 10);
        $this->assertSame($value->value, $expected);
    }
    /**
     * @test
     * @group 1rm
     */
    public function test_the_highest_percentage_has_the_correct_value()
    {
        $calculator = new BrzyckiOneRepMaxCalculator(100, 2);
        $expected = $calculator->calculate();
        $values = ExertionPercentages::calculate(
            $calculator
        );
        $value = end($values);
        $this->assertSame($value->percentage, 100);
        $this->assertSame($value->value, $expected);
    }

    public function test_it_returns_percentages()
    {
        $stub = new CalculatorStub(1, 2);
        $expected = $stub->calculate();

        $values = $stub->percentages();

        $value = current($values);
        $this->assertSame($value->percentage, 10);
        $this->assertSame($value->value, $expected);

        $value = end($values);
        $this->assertSame($value->percentage, 100);
        $this->assertSame($value->value, $expected);
    }
}


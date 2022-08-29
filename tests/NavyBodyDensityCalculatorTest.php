<?php

use PHPUnit\Framework\TestCase;
use Tomfordweb\HealthCalculators\HealthCalculatorOptions;
use Tomfordweb\HealthCalculators\NavyBodyDensityCalculator;

class NavyBodyDensityCalculatorTest extends TestCase
{
    /**
     * @test
     */
    public function it_can_calculate_density_for_females()
    {
        $calculator = NavyBodyDensityCalculator::create(new HealthCalculatorOptions([
            'gender' => 'female',
            'height' => 150,
            'waist' => 85,
            'hips' => 15,
            'neck' => 15
        ]));
        $this->assertSame(round($calculator->calculate(), 3),  1.102);
    }
    /**
     * @test
     */
    public function it_can_calculate_density_for_males()
    {
        $calculator = NavyBodyDensityCalculator::create(new HealthCalculatorOptions([
            'gender' => 'male',
            'waist' => 85,
            'neck' => 20,
            'height' => 150
        ]));
        $this->assertSame(
            round($calculator->calculate(), 3),
            1.023
        );
    }

    /**
     * @test
     */
    public function calculating_bodyfat_with_the_density_returned_from_this_is_a_realistic_number()
    {
        // TF - 8.23.22
        $calculator = NavyBodyDensityCalculator::create(new HealthCalculatorOptions([
            'gender' => 'male',
            'waist' => 92.5,
            'height' => 182,
            'neck' => 40
        ]));

        // TODO: create shared density -> bodyfat since the formula is same between this and JP
        $value =  (495 / $calculator->calculate()) - 450;
        $this->assertSame(round($value, 3), 19.746);
    }
}

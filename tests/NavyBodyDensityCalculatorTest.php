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
        $this->assertSame($calculator->calculate(),  1.101619544251303);
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
            $calculator->calculate(),

            1.0230276940348453
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

        $value =  (495 / $calculator->calculate()) - 450;
        $this->assertSame($value, 19.746147333401836);
    }
}

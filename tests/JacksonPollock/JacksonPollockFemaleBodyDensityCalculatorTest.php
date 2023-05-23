<?php

use PHPUnit\Framework\TestCase;
use Tomfordweb\HealthCalculators\HealthCalculatorOptions;
use Tomfordweb\HealthCalculators\JacksonPollock\JacksonPollockCalculator;
use Tomfordweb\HealthCalculators\JacksonPollock\JacksonPollockFemaleBodyDensityCalculator;

class JacksonPollockFemaleBodyDensityCalculatorTest extends TestCase
{
    public function test_it_can_calculateThreePoint()
    {
        $options = new HealthCalculatorOptions([
            'gender' => 'female',
            'age' => 30,
            JacksonPollockCalculator::MEASUREMENT_TRICEP => 15,
            JacksonPollockCalculator::MEASUREMENT_SUPRAILIAC => 15,
            JacksonPollockCalculator::MEASUREMENT_THIGH => 15
        ]);

        $calculator = new JacksonPollockFemaleBodyDensityCalculator($options);

        $this->assertSame($calculator->calculateThreePoint(), 1.0552931);
    }

    public function test_it_can_calculateSevenPoint()
    {
        $options = new HealthCalculatorOptions([
            'gender' => 'female',
            'age' => 30,
            JacksonPollockCalculator::MEASUREMENT_ABDOMINAL => 15,
            JacksonPollockCalculator::MEASUREMENT_TRICEP => 15,
            JacksonPollockCalculator::MEASUREMENT_SUPRAILIAC => 15,
            JacksonPollockCalculator::MEASUREMENT_PECTORAL => 15,
            JacksonPollockCalculator::MEASUREMENT_AXILA => 15,
            JacksonPollockCalculator::MEASUREMENT_SUBSCAPULAR => 15,
            JacksonPollockCalculator::MEASUREMENT_THIGH => 15

        ]);

        $calculator = new JacksonPollockFemaleBodyDensityCalculator($options);

        $this->assertSame($calculator->calculateSevenPoint(), 1.0500060499999997);
    }

    public function test_it_cannot_attempt_four_point()
    {
        $options = new HealthCalculatorOptions([
            'gender' => 'female',
            'age' => 30,
            JacksonPollockCalculator::MEASUREMENT_TRICEP => 15,
            JacksonPollockCalculator::MEASUREMENT_SUPRAILIAC => 15,
            JacksonPollockCalculator::MEASUREMENT_THIGH => 15
        ]);

        $calculator = new JacksonPollockFemaleBodyDensityCalculator($options);
        $this->expectException(\DomainException::class);
        $calculator->calculateFourPoint();

    }
}

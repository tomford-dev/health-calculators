<?php

use PHPUnit\Framework\TestCase;
use Tomfordweb\HealthCalculators\HealthCalculatorOptions;
use Tomfordweb\HealthCalculators\JacksonPollock\JacksonPollockCalculator;
use Tomfordweb\HealthCalculators\JacksonPollock\JacksonPollockMaleBodyDensityCalculator;

class JacksonPollockMaleBodyDensityCalculatorTest extends TestCase
{

    /**
     * @test
     */
    public function test_it_can_calculateThreePoint()
    {
        $options = new HealthCalculatorOptions([
            'gender' => 'male',
            'age' => 30,
            JacksonPollockCalculator::MEASUREMENT_ABDOMINAL => 25,
            JacksonPollockCalculator::MEASUREMENT_PECTORAL => 50,
            JacksonPollockCalculator::MEASUREMENT_THIGH => 40
        ]);

        $calculator = new JacksonPollockMaleBodyDensityCalculator();
        $this->assertSame($calculator->calculateThreePoint($options), 1.0277475);
    }

    /**
     * @test
     */
    public function test_it_can_calculateSevenPoint()
    {
        $options = new HealthCalculatorOptions([
            'gender' => 'male',
            'age' => 30,
            JacksonPollockCalculator::MEASUREMENT_ABDOMINAL => 25,
            JacksonPollockCalculator::MEASUREMENT_PECTORAL => 50,
            JacksonPollockCalculator::MEASUREMENT_AXILA => 50,
            JacksonPollockCalculator::MEASUREMENT_TRICEP => 50,
            JacksonPollockCalculator::MEASUREMENT_SUBSCAPULAR => 50,
            JacksonPollockCalculator::MEASUREMENT_SUPRAILIAC => 50,
            JacksonPollockCalculator::MEASUREMENT_THIGH => 40
        ]);

        $calculator = new JacksonPollockMaleBodyDensityCalculator();
        $this->assertSame($calculator->calculateSevenPoint($options), 1.0209041);
    }
}

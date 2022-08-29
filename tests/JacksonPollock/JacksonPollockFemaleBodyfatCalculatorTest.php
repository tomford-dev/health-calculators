<?php

use PHPUnit\Framework\TestCase;
use Tomfordweb\HealthCalculators\HealthCalculatorOptions;
use Tomfordweb\HealthCalculators\JacksonPollock\JacksonPollockCalculator;
use Tomfordweb\HealthCalculators\JacksonPollock\JacksonPollockFemaleBodyfatCalculator;

class JacksonPollockFemaleBodyfatCalculatorTest extends TestCase
{

    public function test_it_can_calculateFourPoint()
    {
        $options = new HealthCalculatorOptions([
            'gender' => 'female',
            'age' => 30,
            JacksonPollockCalculator::MEASUREMENT_ABDOMINAL => 15,
            JacksonPollockCalculator::MEASUREMENT_TRICEP => 15,
            JacksonPollockCalculator::MEASUREMENT_SUPRAILAC => 15,
            JacksonPollockCalculator::MEASUREMENT_THIGH => 15
        ]);

        $calculator = new JacksonPollockFemaleBodyfatCalculator();

        $this->assertSame($calculator->calculateFourPoint($options), 18.5495);
    }
}

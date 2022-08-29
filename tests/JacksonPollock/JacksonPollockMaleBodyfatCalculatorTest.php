<?php

use PHPUnit\Framework\TestCase;
use Tomfordweb\HealthCalculators\HealthCalculatorOptions;
use Tomfordweb\HealthCalculators\JacksonPollock\JacksonPollockCalculator;
use Tomfordweb\HealthCalculators\JacksonPollock\JacksonPollockMaleBodyfatCalculator;

class JacksonPollockMaleBodyfatCalculatorTest extends TestCase
{

    /**
     * @test
     */
    public function test_it_can_calculateFourPoint()
    {
        $options = new HealthCalculatorOptions([
            'gender' => 'male',
            'age' => 30,
            JacksonPollockCalculator::MEASUREMENT_ABDOMINAL => 25,
            JacksonPollockCalculator::MEASUREMENT_TRICEP => 50,
            JacksonPollockCalculator::MEASUREMENT_SUPRAILAC => 50,
            JacksonPollockCalculator::MEASUREMENT_THIGH => 40
        ]);

        $calculator = new JacksonPollockMaleBodyfatCalculator();

        $this->assertSame($calculator->calculateFourPoint($options), 20.916700000000002);
        return 0;
    }
}

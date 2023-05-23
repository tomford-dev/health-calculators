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
    public function test_it_can_calculateSevenPoint()
    {
        $options = new HealthCalculatorOptions([
            'gender' => 'male',
            'age' => 30,
            JacksonPollockCalculator::MEASUREMENT_ABDOMINAL => 25,
            JacksonPollockCalculator::MEASUREMENT_PECTORAL => 25,
            JacksonPollockCalculator::MEASUREMENT_TRICEP => 50,
            JacksonPollockCalculator::MEASUREMENT_SUPRAILIAC => 50,
            JacksonPollockCalculator::MEASUREMENT_SUBSCAPULAR => 25,
            JacksonPollockCalculator::MEASUREMENT_AXILA => 55,
            JacksonPollockCalculator::MEASUREMENT_THIGH => 40
        ]);

        $calculator = new JacksonPollockMaleBodyfatCalculator($options);

        $this->assertSame($calculator->calculateSevenPoint(), 1.0259999);
    }
    /**
     * @test
     */
    public function test_it_can_calculateThreePoint()
    {
        $options = new HealthCalculatorOptions([
            'gender' => 'male',
            'age' => 30,
            JacksonPollockCalculator::MEASUREMENT_PECTORAL => 25,
            JacksonPollockCalculator::MEASUREMENT_ABDOMINAL => 25,
            JacksonPollockCalculator::MEASUREMENT_TRICEP => 50,
            JacksonPollockCalculator::MEASUREMENT_SUPRAILIAC => 50,
            JacksonPollockCalculator::MEASUREMENT_THIGH => 40
        ]);

        $calculator = new JacksonPollockMaleBodyfatCalculator($options);

        $this->assertSame($calculator->calculateThreePoint(), 1.0402150000000001);
    }
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
            JacksonPollockCalculator::MEASUREMENT_SUPRAILIAC => 50,
            JacksonPollockCalculator::MEASUREMENT_THIGH => 40
        ]);

        $calculator = new JacksonPollockMaleBodyfatCalculator($options);

        $this->assertSame($calculator->calculateFourPoint(), 20.916700000000002);
    }
}

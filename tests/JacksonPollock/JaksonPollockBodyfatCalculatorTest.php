<?php

use PHPUnit\Framework\TestCase;
use Tomfordweb\HealthCalculators\HealthCalculatorOptions;
use Tomfordweb\HealthCalculators\JacksonPollock\JacksonPollockBodyfatCalculator;
use Tomfordweb\HealthCalculators\JacksonPollock\JacksonPollockCalculator;

class JacksonPollockBodyfatCalculatorTest extends TestCase
{
    public function test_it_can_calculate_female_7_point()
    {
        $options = new HealthCalculatorOptions([
            'gender' => 'female',
            'type' => 7,
            'age' => 30,
            JacksonPollockCalculator::MEASUREMENT_ABDOMINAL => 25,
            JacksonPollockCalculator::MEASUREMENT_PECTORAL => 50,
            JacksonPollockCalculator::MEASUREMENT_AXILA => 50,
            JacksonPollockCalculator::MEASUREMENT_TRICEP => 50,
            JacksonPollockCalculator::MEASUREMENT_SUBSCAPULAR => 50,
            JacksonPollockCalculator::MEASUREMENT_SUPRAILAC => 50,
            JacksonPollockCalculator::MEASUREMENT_THIGH => 40
        ]);

        $this->assertSame(JacksonPollockBodyfatCalculator::create($options)->calculate(), 44);
        // for code coverage..
        $otherWay = new JacksonPollockBodyfatCalculator($options);
        $this->assertSame($otherWay->calculateSevenPoint($options), 44);
    }

    public function test_it_can_calculate_male_7_point()
    {
        $options = new HealthCalculatorOptions([
            'gender' => 'male',
            'type' => 7,
            'age' => 30,
            JacksonPollockCalculator::MEASUREMENT_ABDOMINAL => 25,
            JacksonPollockCalculator::MEASUREMENT_PECTORAL => 50,
            JacksonPollockCalculator::MEASUREMENT_AXILA => 50,
            JacksonPollockCalculator::MEASUREMENT_TRICEP => 50,
            JacksonPollockCalculator::MEASUREMENT_SUBSCAPULAR => 50,
            JacksonPollockCalculator::MEASUREMENT_SUPRAILAC => 50,
            JacksonPollockCalculator::MEASUREMENT_THIGH => 40
        ]);

        $this->assertSame(JacksonPollockBodyfatCalculator::create($options)->calculate(), 34);
        // for code coverage..
        $otherWay = new JacksonPollockBodyfatCalculator($options);
        $this->assertSame($otherWay->calculateSevenPoint($options), 34);
    }
    public function test_it_can_calculate_female_4_point()
    {
        $options = new HealthCalculatorOptions([
            'gender' => 'female',
            'type' => 4,
            'age' => 30,
            JacksonPollockCalculator::MEASUREMENT_ABDOMINAL => 25,
            JacksonPollockCalculator::MEASUREMENT_PECTORAL => 50,
            JacksonPollockCalculator::MEASUREMENT_AXILA => 50,
            JacksonPollockCalculator::MEASUREMENT_TRICEP => 50,
            JacksonPollockCalculator::MEASUREMENT_SUBSCAPULAR => 50,
            JacksonPollockCalculator::MEASUREMENT_SUPRAILAC => 50,
            JacksonPollockCalculator::MEASUREMENT_THIGH => 40
        ]);

        $this->assertSame(JacksonPollockBodyfatCalculator::create($options)->calculate(), 39);
        // for code coverage..
        $otherWay = new JacksonPollockBodyfatCalculator($options);
        $this->assertSame($otherWay->calculateFourPoint($options), 39);
    }

    public function test_it_can_calculate_male_4_point()
    {
        $options = new HealthCalculatorOptions([
            'gender' => 'male',
            'type' => 4,
            'age' => 30,
            JacksonPollockCalculator::MEASUREMENT_ABDOMINAL => 25,
            JacksonPollockCalculator::MEASUREMENT_PECTORAL => 50,
            JacksonPollockCalculator::MEASUREMENT_AXILA => 50,
            JacksonPollockCalculator::MEASUREMENT_TRICEP => 50,
            JacksonPollockCalculator::MEASUREMENT_SUBSCAPULAR => 50,
            JacksonPollockCalculator::MEASUREMENT_SUPRAILAC => 50,
            JacksonPollockCalculator::MEASUREMENT_THIGH => 40
        ]);

        $this->assertSame(JacksonPollockBodyfatCalculator::create($options)->calculate(), 20);
        // for code coverage..
        $otherWay = new JacksonPollockBodyfatCalculator($options);
        $this->assertSame($otherWay->calculateFourPoint($options), 20);
    }
    public function test_it_can_calculate_female_3_point()
    {
        $options = new HealthCalculatorOptions([
            'gender' => 'female',
            'type' => 3,
            'age' => 30,
            JacksonPollockCalculator::MEASUREMENT_ABDOMINAL => 25,
            JacksonPollockCalculator::MEASUREMENT_PECTORAL => 50,
            JacksonPollockCalculator::MEASUREMENT_AXILA => 50,
            JacksonPollockCalculator::MEASUREMENT_TRICEP => 50,
            JacksonPollockCalculator::MEASUREMENT_SUBSCAPULAR => 50,
            JacksonPollockCalculator::MEASUREMENT_SUPRAILAC => 50,
            JacksonPollockCalculator::MEASUREMENT_THIGH => 40
        ]);

        $this->assertSame(JacksonPollockBodyfatCalculator::create($options)->calculate(), 44);
        // for code coverage..
        $otherWay = new JacksonPollockBodyfatCalculator($options);
        $this->assertSame($otherWay->calculateThreePoint($options), 44);
    }

    public function test_it_can_calculate_male_3_point()
    {
        $options = new HealthCalculatorOptions([
            'gender' => 'male',
            'type' => 3,
            'age' => 30,
            JacksonPollockCalculator::MEASUREMENT_ABDOMINAL => 25,
            JacksonPollockCalculator::MEASUREMENT_PECTORAL => 50,
            JacksonPollockCalculator::MEASUREMENT_AXILA => 50,
            JacksonPollockCalculator::MEASUREMENT_TRICEP => 50,
            JacksonPollockCalculator::MEASUREMENT_SUBSCAPULAR => 50,
            JacksonPollockCalculator::MEASUREMENT_SUPRAILAC => 50,
            JacksonPollockCalculator::MEASUREMENT_THIGH => 40
        ]);

        $this->assertSame(JacksonPollockBodyfatCalculator::create($options)->calculate(), 31);
        // for code coverage..
        $otherWay = new JacksonPollockBodyfatCalculator($options);
        $this->assertSame($otherWay->calculateThreePoint($options), 31);
    }
}

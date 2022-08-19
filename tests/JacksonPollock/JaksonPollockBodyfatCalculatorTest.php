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

        $value = 44.62460465629607;
        $this->assertSame(JacksonPollockBodyfatCalculator::create($options)->calculate(), $value);
        // for code coverage..
        $otherWay = JacksonPollockBodyfatCalculator::create($options);
        $this->assertSame($otherWay->calculateSevenPoint($options), $value);
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

        $value = 34.86434719970265;
        $this->assertSame(JacksonPollockBodyfatCalculator::create($options)->calculate(), $value);
        // for code coverage..
        $otherWay = JacksonPollockBodyfatCalculator::create($options);
        $this->assertSame($otherWay->calculateSevenPoint($options), $value);
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

        $value = 39.543200000000006;
        $this->assertSame(JacksonPollockBodyfatCalculator::create($options)->calculate(), $value);
        // for code coverage..
        $otherWay = JacksonPollockBodyfatCalculator::create($options);
        $this->assertSame($otherWay->calculateFourPoint($options), $value);
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

        $value = 20.916700000000002;
        $this->assertSame(JacksonPollockBodyfatCalculator::create($options)->calculate(), $value);
        // for code coverage..
        $otherWay = JacksonPollockBodyfatCalculator::create($options);
        $this->assertSame($otherWay->calculateFourPoint($options), $value);
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

        $value = 44.312855699292356;
        $this->assertSame(JacksonPollockBodyfatCalculator::create($options)->calculate(), $value);
        // for code coverage..
        $otherWay = JacksonPollockBodyfatCalculator::create($options);
        $this->assertSame($otherWay->calculateThreePoint($options), $value);
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

        $value = 31.635810352250928;
        $this->assertSame(JacksonPollockBodyfatCalculator::create($options)->calculate(), $value);
        // for code coverage..
        $otherWay = JacksonPollockBodyfatCalculator::create($options);
        $this->assertSame($otherWay->calculateThreePoint($options), $value);
    }
}

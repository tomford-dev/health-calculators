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
            JacksonPollockCalculator::MEASUREMENT_SUPRAILIAC => 50,
            JacksonPollockCalculator::MEASUREMENT_THIGH => 40
        ]);

        $value = 44.625;
        $this->assertSame(round(JacksonPollockBodyfatCalculator::create($options)->calculate(), 3), $value);
        // for code coverage..
        $otherWay = JacksonPollockBodyfatCalculator::create($options);
        $this->assertSame(round($otherWay->calculateSevenPoint($options), 3), $value);
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
            JacksonPollockCalculator::MEASUREMENT_SUPRAILIAC => 50,
            JacksonPollockCalculator::MEASUREMENT_THIGH => 40
        ]);

        $value = 34.864;
        $this->assertSame(
            round(
                JacksonPollockBodyfatCalculator::create($options)->calculate(),
                3
            ),
            $value
        );
        // for code coverage..
        $otherWay = JacksonPollockBodyfatCalculator::create($options);
        $this->assertSame(round($otherWay->calculateSevenPoint($options), 3), $value);
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
            JacksonPollockCalculator::MEASUREMENT_SUPRAILIAC => 50,
            JacksonPollockCalculator::MEASUREMENT_THIGH => 40
        ]);

        $value = 39.543;
        $otherWay = JacksonPollockBodyfatCalculator::create($options);
        $this->assertSame(round($otherWay->calculateFourPoint($options), 3), $value);
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
            JacksonPollockCalculator::MEASUREMENT_SUPRAILIAC => 50,
            JacksonPollockCalculator::MEASUREMENT_THIGH => 40
        ]);

        $value = 20.917;
        $this->assertSame(round(JacksonPollockBodyfatCalculator::create($options)->calculate(), 3), $value);
        // for code coverage..
        $otherWay = JacksonPollockBodyfatCalculator::create($options);
        $this->assertSame(round($otherWay->calculateFourPoint($options), 3), $value);
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
            JacksonPollockCalculator::MEASUREMENT_SUPRAILIAC => 50,
            JacksonPollockCalculator::MEASUREMENT_THIGH => 40
        ]);

        $value = 44.313;
        $this->assertSame(round(JacksonPollockBodyfatCalculator::create($options)->calculate(), 3), $value);
        // for code coverage..
        $otherWay = JacksonPollockBodyfatCalculator::create($options);
        $this->assertSame(round($otherWay->calculateThreePoint($options), 3), $value);
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
            JacksonPollockCalculator::MEASUREMENT_SUPRAILIAC => 50,
            JacksonPollockCalculator::MEASUREMENT_THIGH => 40
        ]);

        $value = 31.636;
        $this->assertSame(round(JacksonPollockBodyfatCalculator::create($options)->calculate(), 3), $value);

        // for code coverage..
        $otherWay = JacksonPollockBodyfatCalculator::create($options);
        $this->assertSame(round($otherWay->calculateThreePoint($options), 3), $value);
    }
}

<?php

use PHPUnit\Framework\TestCase;
use Tomfordweb\HealthCalculators\HealthCalculatorOptions;
use Tomfordweb\HealthCalculators\JacksonPollock\JacksonPollockBodyDensityCalculator;
use Tomfordweb\HealthCalculators\JacksonPollock\JacksonPollockCalculator;

class JacksonPollockBodyDensityCalculatorTest extends TestCase
{
    public function test_it_rejects_unknown_type()
    {

        $options = new HealthCalculatorOptions([
            'gender' => 'female',
            'type' => 8,
            'age' => 30,
            JacksonPollockCalculator::MEASUREMENT_ABDOMINAL => 25,
            JacksonPollockCalculator::MEASUREMENT_PECTORAL => 50,
            JacksonPollockCalculator::MEASUREMENT_AXILA => 50,
            JacksonPollockCalculator::MEASUREMENT_TRICEP => 50,
            JacksonPollockCalculator::MEASUREMENT_SUBSCAPULAR => 50,
            JacksonPollockCalculator::MEASUREMENT_SUPRAILIAC => 50,
            JacksonPollockCalculator::MEASUREMENT_THIGH => 40
        ]);

        // for code coverage..
        $otherWay = JacksonPollockBodyDensityCalculator::create($options);
        $this->expectException(\InvalidArgumentException::class);
        $otherWay->calculate();
    }

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

        $value = 1.001;
        $this->assertSame(round(JacksonPollockBodyDensityCalculator::create($options)->calculate(), 3), $value);
        // for code coverage..
        $otherWay = JacksonPollockBodyDensityCalculator::create($options);
        $this->assertSame(round($otherWay->calculateSevenPoint($options), 3), $value);
        $this->assertSame(round($otherWay->calculate(), 3), $value);
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

        $value = 1.021;
        $this->assertSame(
            round(
                JacksonPollockBodyDensityCalculator::create($options)->calculate(),
                3
            ),
            $value
        );
        // for code coverage..
        $otherWay = JacksonPollockBodyDensityCalculator::create($options);
        $this->assertSame(round($otherWay->calculateSevenPoint($options), 3), $value);
        $this->assertSame(round($otherWay->calculate(), 3), $value);
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

        $otherWay = JacksonPollockBodyDensityCalculator::create($options);
        $this->expectException(\DomainException::class);
        $otherWay->calculateFourPoint($options);
        $this->expectException(\DomainException::class);
        $otherWay->calculate();

    }

    public function test_it_fails_calculate_male_4_point()
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

        $otherWay = JacksonPollockBodyDensityCalculator::create($options);
        // $this->expectException(\DomainException::class);
        // $otherWay->calculateFourPoint();

        $this->expectException(\DomainException::class);
        $otherWay->calculate();
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

        $value = 1.001;
        $this->assertSame(round(JacksonPollockBodyDensityCalculator::create($options)->calculate(), 3), $value);
        // for code coverage..
        $otherWay = JacksonPollockBodyDensityCalculator::create($options);
        $this->assertSame(round($otherWay->calculateThreePoint(), 3), $value);
        $this->assertSame(round($otherWay->calculate(), 3), $value);
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

        $value = 1.028;
        $this->assertSame(round(JacksonPollockBodyDensityCalculator::create($options)->calculate(), 3), $value);
        // for code coverage..
        $otherWay = JacksonPollockBodyDensityCalculator::create($options);
        $this->assertSame(round($otherWay->calculateThreePoint(), 3), $value);
        $this->assertSame(round($otherWay->calculate(), 3), $value);
    }
}

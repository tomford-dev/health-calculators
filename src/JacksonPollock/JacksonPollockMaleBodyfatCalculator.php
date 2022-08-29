<?php

namespace Tomfordweb\HealthCalculators\JacksonPollock;

use Tomfordweb\HealthCalculators\HealthCalculatorOptions;
use Tomfordweb\HealthCalculators\SkinfoldSum;

class JacksonPollockMaleBodyfatCalculator implements JacksonPollockCalculator
{
    public function calculateThreePoint(HealthCalculatorOptions $values): float
    {
        $skinfoldSum = SkinfoldSum::create($values->getOptions([
            self::MEASUREMENT_ABDOMINAL,
            self::MEASUREMENT_PECTORAL,
            self::MEASUREMENT_THIGH,
        ]))->calculate();

        return 1.10938 - (0.0008267 * $skinfoldSum) + (0.0000016 * ($skinfoldSum ** 2)) - (0.0002574 * $values->getOption("age"));
    }

    public function calculateFourPoint(HealthCalculatorOptions $values): float
    {
        $skinfoldSum = SkinfoldSum::create($values->getOptions([
            self::MEASUREMENT_ABDOMINAL,
            self::MEASUREMENT_TRICEP,
            self::MEASUREMENT_SUPRAILAC,
            self::MEASUREMENT_THIGH
        ]))->calculate();

        return (0.29288 * $skinfoldSum) - (0.0005 * ($skinfoldSum ** 2)) + (0.15845 * (int) $values->getOption("age")) - 18.5495;
    }

    public function calculateSevenPoint(HealthCalculatorOptions $values): float
    {
        $skinfoldSum = SkinfoldSum::create($values->getOptions([
            self::MEASUREMENT_PECTORAL,
            self::MEASUREMENT_AXILA,
            self::MEASUREMENT_TRICEP,
            self::MEASUREMENT_SUBSCAPULAR,
            self::MEASUREMENT_ABDOMINAL,
            self::MEASUREMENT_SUPRAILAC,
            self::MEASUREMENT_THIGH,
        ]))->calculate();

        return 1.112 - (0.00043499 * $skinfoldSum) + (0.00000055 * ($skinfoldSum ** 2)) - (0.00028826 * (int) $values->getOption("age"));
    }
}

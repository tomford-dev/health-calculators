<?php

namespace Tomfordweb\HealthCalculators\JacksonPollock;

use Tomfordweb\HealthCalculators\HealthCalculatorOptions;
use Tomfordweb\HealthCalculators\SkinfoldSum;

class JacksonPollockFemaleBodyDensityCalculator implements JacksonPollockCalculator
{
    public function calculateThreePoint(HealthCalculatorOptions $values): float
    {
        $skinfoldSum = SkinfoldSum::create($values->getOptions([
            self::MEASUREMENT_TRICEP,
            self::MEASUREMENT_SUPRAILAC,
            self::MEASUREMENT_THIGH,
        ]))->calculate();

        return  1.0994921 - (0.0009929 * $skinfoldSum) + (0.0000023 * (pow($skinfoldSum, 2))) - (0.0001392 * (int) $values->getOption("age"));
    }

    public function calculateFourPoint(HealthCalculatorOptions $values): float
    {
        throw new \DomainException(
            sprintf(
                "Invalid method, use %s::%s instead",
                JacksonPollockFemaleBodyfatCalculator::class,
                __METHOD__
            )
        );
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
            self::MEASUREMENT_THIGH
        ]))->calculate();

        return 1.097 - (0.00046971 * $skinfoldSum) + (0.00000056 * ($skinfoldSum ** 2)) - (0.00012828 * (int) $values->getOption("age"));
    }
}

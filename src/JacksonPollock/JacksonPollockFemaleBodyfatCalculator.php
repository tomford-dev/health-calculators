<?php

namespace Tomfordweb\HealthCalculators\JacksonPollock;

use Tomfordweb\HealthCalculators\HealthCalculatorOptions;
use Tomfordweb\HealthCalculators\SkinfoldSum;

class JacksonPollockFemaleBodyfatCalculator implements JacksonPollockCalculator
{
    public function calculateThreePoint(HealthCalculatorOptions $values): float
    {
        throw new \DomainException(sprintf("Invalid method, use %s::%s instead", JacksonPollockFemaleBodyDensityCalculator::class, __METHOD__));
    }

    public function calculateFourPoint(HealthCalculatorOptions $values): float
    {
        $skinfoldSum = SkinfoldSum::create($values->getOptions([
            self::MEASUREMENT_ABDOMINAL,
            self::MEASUREMENT_TRICEP,
            self::MEASUREMENT_SUPRAILAC,
            self::MEASUREMENT_THIGH
        ]))->calculate();

        return (0.29669 * $skinfoldSum) - (0.00043 * ($skinfoldSum ** 2)) + (0.02963 * (int) $values->getOption("age")) + 1.4072;
    }

    public function calculateSevenPoint(HealthCalculatorOptions $values): float
    {
        throw new \DomainException(sprintf("Invalid method, use %s::%s instead", JacksonPollockFemaleBodyDensityCalculator::class, __METHOD__));
    }
}

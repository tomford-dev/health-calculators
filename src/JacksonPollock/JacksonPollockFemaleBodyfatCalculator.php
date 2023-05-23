<?php

namespace Tomfordweb\HealthCalculators\JacksonPollock;

use Tomfordweb\HealthCalculators\HealthCalculatorOptions;
use Tomfordweb\HealthCalculators\SkinfoldSum;

class JacksonPollockFemaleBodyfatCalculator implements JacksonPollockCalculator
{
    private HealthCalculatorOptions $values;

    public function __construct(HealthCalculatorOptions $options)
    {
        $this->values = $options;
    }
    /**
     * Calculate the bodyfat for a female with 3 measurements
     *
     * @return float
     */
    public function calculateThreePoint(): float
    {
        throw new \DomainException(sprintf("Invalid method, use %s::%s instead", JacksonPollockFemaleBodyDensityCalculator::class, __METHOD__));
    }

    /**
     * Calculate the bodyfat for a female with 4 measurements
     *
     * @return float
     */
    public function calculateFourPoint(): float
    {
        $skinfoldSum = SkinfoldSum::create($this->values->getOptions([
            self::MEASUREMENT_ABDOMINAL,
            self::MEASUREMENT_TRICEP,
            self::MEASUREMENT_SUPRAILIAC,
            self::MEASUREMENT_THIGH
        ]))->calculate();

        return (0.29669 * $skinfoldSum) - (0.00043 * ($skinfoldSum ** 2)) + (0.02963 * (int) $this->values->getOption("age")) + 1.4072;
    }

    /**
     * Calculate the bodyfat for a female with 7 measurements
     *
     * @return float
     */
    public function calculateSevenPoint(): float
    {
        throw new \DomainException(sprintf("Invalid method, use %s::%s instead", JacksonPollockFemaleBodyDensityCalculator::class, __METHOD__));
    }
}

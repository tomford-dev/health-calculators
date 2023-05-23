<?php

namespace Tomfordweb\HealthCalculators\JacksonPollock;

use Tomfordweb\HealthCalculators\HealthCalculatorOptions;
use Tomfordweb\HealthCalculators\SkinfoldSum;

class JacksonPollockMaleBodyDensityCalculator implements JacksonPollockCalculator
{

    private HealthCalculatorOptions $values;

    public function __construct(HealthCalculatorOptions $options)
    {
        $this->values = $options;
    }

    /**
     * Calculate the body density for a male with 3 measurements
     *
     * @return float
     */
    public function calculateThreePoint(): float
    {
        $skinfoldSum = SkinfoldSum::create($this->values->getOptions([
            self::MEASUREMENT_ABDOMINAL,
            self::MEASUREMENT_PECTORAL,
            self::MEASUREMENT_THIGH,
        ]))->calculate();

        return 1.10938 - (0.0008267 * $skinfoldSum) +
            (0.0000016 * ($skinfoldSum ** 2)) -
            (0.0002574 * $this->values->getOption("age"));
    }

    /**
     * Calculate the body density for a male with 4 measurements
     *
     * @return float
     */
    public function calculateFourPoint(): float
    {
        throw new \DomainException(
            sprintf(
                "Invalid method, use %s::%s instead",
                JacksonPollockFemaleBodyfatCalculator::class,
                __METHOD__
            )
        );
    }

    /**
     * Calculate the body density for a male with 7 measurements
     *
     * @return float
     */
    public function calculateSevenPoint(): float
    {
        $skinfoldSum = SkinfoldSum::create($this->values->getOptions([
            self::MEASUREMENT_PECTORAL,
            self::MEASUREMENT_AXILA,
            self::MEASUREMENT_TRICEP,
            self::MEASUREMENT_SUBSCAPULAR,
            self::MEASUREMENT_ABDOMINAL,
            self::MEASUREMENT_SUPRAILIAC,
            self::MEASUREMENT_THIGH,
        ]))->calculate();

        return 1.112 - (0.00043499 * $skinfoldSum) +
            (0.00000055 * ($skinfoldSum ** 2)) -
            (0.00028826 * (int) $this->values->getOption("age"));
    }
}

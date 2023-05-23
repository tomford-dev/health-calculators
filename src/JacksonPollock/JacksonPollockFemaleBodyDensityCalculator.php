<?php

namespace Tomfordweb\HealthCalculators\JacksonPollock;

use Tomfordweb\HealthCalculators\HealthCalculatorOptions;
use Tomfordweb\HealthCalculators\SkinfoldSum;

class JacksonPollockFemaleBodyDensityCalculator implements JacksonPollockCalculator
{
    private HealthCalculatorOptions $values;

    /**
     * The constructor for the Jackson Pollock Female body density calculator
     *
     * @param HealthCalculatorOptions $values The measurements
     */
    public function __construct(HealthCalculatorOptions $values)
    {
        $this->values = $values;
    }

    /**
     * Calculate the three point body density for females
     *
     * @return float
     */
    public function calculateThreePoint(): float
    {
        $skinfoldSum = SkinfoldSum::create(
            $this->values->getOptions(
                [
                    self::MEASUREMENT_TRICEP,
                    self::MEASUREMENT_SUPRAILIAC,
                    self::MEASUREMENT_THIGH,
                ]
            )
        )->calculate();

        return  1.0994921 -
            (0.0009929 * $skinfoldSum) +
            (0.0000023 * (pow($skinfoldSum, 2))) -
            (0.0001392 * (int) $this->values->getOption("age"));
    }

    /**
     * Calculate the four point body density for females
     *
     * @throws \DomainException
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
     * Calculate the seven point body density for females
     *
     * @return float
     */
    public function calculateSevenPoint(): float
    {
        $skinfoldSum = SkinfoldSum::create(
            $this->values->getOptions(
                [
                    self::MEASUREMENT_PECTORAL,
                    self::MEASUREMENT_AXILA,
                    self::MEASUREMENT_TRICEP,
                    self::MEASUREMENT_SUBSCAPULAR,
                    self::MEASUREMENT_ABDOMINAL,
                    self::MEASUREMENT_SUPRAILIAC,
                    self::MEASUREMENT_THIGH
                ]
            )
        )->calculate();

        return 1.097 - (0.00046971 * $skinfoldSum)
            + (0.00000056 * ($skinfoldSum ** 2))
            - (0.00012828 * (int) $this->values->getOption("age"));
    }
}

<?php

namespace Tomfordweb\HealthCalculators\JacksonPollock;

use Tomfordweb\HealthCalculators\HealthCalculator;
use Tomfordweb\HealthCalculators\HealthCalculatorOptions;

class JacksonPollockBodyDensityCalculator implements HealthCalculator, JacksonPollockCalculator
{
    private HealthCalculatorOptions $values;

    public function __construct(HealthCalculatorOptions $healthCalculatorOptions)
    {
        $this->values = $healthCalculatorOptions;
    }

    public static function create(HealthCalculatorOptions $healthCalculatorOptions)
    {
        return new self($healthCalculatorOptions);
    }

    /**
     * Calculate the body density based on input
     *
     * @return float
     */
    public function calculate(): float
    {
        if ($this->values->female()) {
            $calculator = JacksonPollockFemaleBodyDensityCalculator::class;
        } else {
            $calculator = JacksonPollockMaleBodyDensityCalculator::class;
        }

        $calculator = new $calculator($this->values);
        switch ((int) $this->values->getOption("type")) {
            case 3:
                $method = "calculateThreePoint";
                break;
            case 4:
                throw new \DomainException(
                    sprintf(
                        "Invalid type, use %s::%s instead",
                        JacksonPollockBodyfatCalculator::class,
                        __METHOD__
                    )
                );
            case 7:
                $method = "calculateSevenPoint";
                break;
            default:
                throw new \InvalidArgumentException("unknown type");
        }


        $density = $calculator->{$method}($this->values);

        return $density;
    }

    /**
     * Calculate the body density off 3 points
     *
     * @return float
     */
    public function calculateThreePoint(): float
    {
        return $this->calculate();
    }

    /**
     * Calculate the body density off 4 points
     *
     * @return float
     */
    public function calculateFourPoint(): float
    {
        throw new \DomainException(
            sprintf(
                "Invalid type, use %s::%s instead",
                JacksonPollockBodyfatCalculator::class,
                __METHOD__
            )
        );
    }

    /**
     * Calculate the body density off 7 points
     *
     * @return float
     */
    public function calculateSevenPoint(): float
    {
        return $this->calculate();
    }
}

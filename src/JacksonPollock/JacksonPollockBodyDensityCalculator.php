<?php

namespace Tomfordweb\HealthCalculators\JacksonPollock;

use Tomfordweb\HealthCalculators\HealthCalculator;
use Tomfordweb\HealthCalculators\HealthCalculatorOptions;

class JacksonPollockBodyDensityCalculator implements HealthCalculator, JacksonPollockCalculator
{
    private $values;

    private function __construct(HealthCalculatorOptions $healthCalculatorOptions)
    {
        $this->values = $healthCalculatorOptions;
    }

    public static function create(HealthCalculatorOptions $healthCalculatorOptions)
    {
        return new self($healthCalculatorOptions);
    }

    public function calculate(): float
    {
        if ($this->values->female()) {
            $calculator = JacksonPollockFemaleBodyDensityCalculator::class;
        } else {
            $calculator = JacksonPollockMaleBodyDensityCalculator::class;
        }

        $calculator = new $calculator;
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

    public function calculateThreePoint(HealthCalculatorOptions $values): float
    {
        $instance = new self($values);
        return $instance->calculate();
    }

    public function calculateFourPoint(HealthCalculatorOptions $values): float
    {
        throw new \DomainException(
            sprintf(
                "Invalid type, use %s::%s instead",
                JacksonPollockBodyfatCalculator::class,
                __METHOD__
            )
        );
    }

    public function calculateSevenPoint(HealthCalculatorOptions $values): float
    {
        $instance = new self($values);
        return $instance->calculate();
    }
}

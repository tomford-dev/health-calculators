<?php

namespace Tomfordweb\HealthCalculators\JacksonPollock;

use Tomfordweb\HealthCalculators\HealthCalculator;
use Tomfordweb\HealthCalculators\HealthCalculatorOptions;
use Webmozart\Assert\Assert;

class JacksonPollockBodyfatCalculator implements HealthCalculator, JacksonPollockCalculator
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

    public function calculate(): int
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
                // NOTE: every formula I have found for the 4 point does 
                // not return density, it returns the BF % instead.
                return $calculator->calculateFourPoint($this->values);
                break;
            case 7:
                $method = "calculateSevenPoint";
                break;
            default:
                throw new \InvalidArgumentException("unknown type");
        }


        $density = $calculator->{$method}($this->values);

        // Calculate bodyfat based off of deesity
        return (495 / $density) - 450;
    }

    public function calculateThreePoint(HealthCalculatorOptions $values): float
    {
        $instance = new self($values);
        return $instance->calculate();
    }

    public function calculateFourPoint(HealthCalculatorOptions $values): float
    {
        $instance = new self($values);
        return $instance->calculate();
    }
    public function calculateSevenPoint(HealthCalculatorOptions $values): float
    {
        $instance = new self($values);
        return $instance->calculate();
    }
}

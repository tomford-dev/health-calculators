<?php

namespace Tomfordweb\HealthCalculators\JacksonPollock;

use Tomfordweb\HealthCalculators\ConvertBodyDensityToBodyfatPercentage;
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

    public function calculate(): float
    {

        switch ((int) $this->values->getOption("type")) {
            case 3:
            case 7:
                $density = JacksonPollockBodyDensityCalculator::create($this->values)->calculate();
                return ConvertBodyDensityToBodyfatPercentage::create($density)->calculate();
            case 4:
                if ($this->values->female()) {
                    $calculator = JacksonPollockFemaleBodyfatCalculator::class;
                } else {
                    $calculator = JacksonPollockMaleBodyfatCalculator::class;
                }
                $calculator = new $calculator;
                return $calculator->calculateFourPoint($this->values);
            default:
                throw new \InvalidArgumentException("unknown type");
        }
    }

    public function calculateThreePoint(HealthCalculatorOptions $values): float
    {
        return ConvertBodyDensityToBodyfatPercentage::create(
            JacksonPollockBodyDensityCalculator::create(
                $values
            )->calculate()
        )->calculate();
    }

    public function calculateFourPoint(HealthCalculatorOptions $values): float
    {
        return $this->calculate();
    }
    public function calculateSevenPoint(HealthCalculatorOptions $values): float
    {
        return ConvertBodyDensityToBodyfatPercentage::create(
            JacksonPollockBodyDensityCalculator::create(
                $values
            )->calculate()
        )->calculate();
    }
}

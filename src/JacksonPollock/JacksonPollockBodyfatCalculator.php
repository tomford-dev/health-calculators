<?php

namespace Tomfordweb\HealthCalculators\JacksonPollock;

use Tomfordweb\HealthCalculators\ConvertBodyDensityToBodyfatPercentage;
use Tomfordweb\HealthCalculators\HealthCalculator;
use Tomfordweb\HealthCalculators\HealthCalculatorOptions;
use Webmozart\Assert\Assert;

class JacksonPollockBodyfatCalculator implements HealthCalculator, JacksonPollockCalculator
{
    private $values;

    /**
     * The constructor
     *
     * @param HealthCalculatorOptions $values The measurements
     */
    public function __construct(HealthCalculatorOptions $values)
    {
        $this->values = $values;
    }

    /**
     * A static factory method
     *
     * @param HealthCalculatorOptions $healthCalculatorOptions The measurements
     *
     * @return JacksonPollockBodyfatCalculator
     */
    public static function create(HealthCalculatorOptions $healthCalculatorOptions)
    {
        return new self($healthCalculatorOptions);
    }

    /**
     * Calculate the bodyfat based on the input
     *
     * @return float
     */
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
                $calculator = new $calculator($this->values);
                return $calculator->calculateFourPoint();
            default:
                throw new \InvalidArgumentException("unknown type");
        }
    }


    /**
     * Calculate the bodyfat based off 3 points
     *
     * @return float
     */
    public function calculateThreePoint(): float
    {
        return ConvertBodyDensityToBodyfatPercentage::create(
            JacksonPollockBodyDensityCalculator::create(
                $this->values
            )->calculate()
        )->calculate();
    }

    /**
     * Calculate the bodyfat based off 4 points
     *
     * @return float
     */
    public function calculateFourPoint(): float
    {
        return $this->calculate();
    }

    /**
     * Calculate the bodyfat based off 7 points
     *
     * @return float
     */
    public function calculateSevenPoint(): float
    {
        return ConvertBodyDensityToBodyfatPercentage::create(
            JacksonPollockBodyDensityCalculator::create(
                $this->values,
            )->calculate()
        )->calculate();
    }
}

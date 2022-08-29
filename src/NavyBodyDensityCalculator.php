<?php

namespace Tomfordweb\HealthCalculators;


/**
 * Values are in centimeters
 */
class NavyBodyDensityCalculator implements HealthCalculator
{

    private $values;
    private function __construct(HealthCalculatorOptions $values)
    {
        $this->values = $values;
    }

    public static function create(HealthCalculatorOptions $values)
    {
        return new self($values);
    }

    public function calculate(): float
    {
        if ($this->values->male()) {
            return -0.191 * log10($this->values->getOption('waist') - $this->values->getOption('neck')) + 0.155 * log10($this->values->getOption('height')) + 1.032;
        } else {
            return -0.350 * log10($this->values->getOption('waist') + $this->values->getOption('hips') - $this->values->getOption('neck')) + 0.221 * log10($this->values->getOption('height')) + 1.296;
        }
    }
}

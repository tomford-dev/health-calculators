<?php

namespace Tomfordweb\HealthCalculators;

class OneRepMaxCalculator implements HealthCalculator
{
    private $values;

    public function __construct(HealthCalculatorOptions $values)
    {
        $this->values = $values;
    }

    public static function create(HealthCalculatorOptions $values)
    {
        return new self($values);
    }

    public function calculate(): float
    {
        
    }
}

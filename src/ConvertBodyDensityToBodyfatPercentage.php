<?php

namespace Tomfordweb\HealthCalculators;

use Tomfordweb\HealthCalculators\HealthCalculator;

class ConvertBodyDensityToBodyfatPercentage implements HealthCalculator
{
    private $value;

    private function __construct(float $bodyDensity)
    {
        $this->value = $bodyDensity;
    }

    public static function create(float $bodyDensity)
    {
        return new self($bodyDensity);
    }

    public function calculate(): float
    {
        // Calculate bodyfat based off of deesity
        return (495 / $this->value) - 450;
    }
}

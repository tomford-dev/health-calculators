<?php

namespace Tomfordweb\HealthCalculators\OneRepMax;

use Tomfordweb\HealthCalculators\HealthCalculator;
use Tomfordweb\HealthCalculators\OneRepMax\AbstractOneRepMaxCalculator;

class OConnorOneRepMaxCalculator extends AbstractOneRepMaxCalculator implements HealthCalculator
{
    public function calculate(): float
    {
        return ($this->weight * (1 + 0.025 * $this->reps));
    }
}

<?php

namespace Tomfordweb\HealthCalculators\OneRepMax;

use Tomfordweb\HealthCalculators\HealthCalculator;

/**
 * Calculate one rep max using the Brzycki method
 */
class BrzyckiOneRepMaxCalculator extends AbstractOneRepMaxCalculator implements HealthCalculator
{
    public function calculate(): float
    {
        return ($this->weight * (36 / (37 - $this->reps)));
    }
}

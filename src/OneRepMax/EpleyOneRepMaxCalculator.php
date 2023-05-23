<?php

namespace Tomfordweb\HealthCalculators\OneRepMax;

use Tomfordweb\HealthCalculators\HealthCalculator;

class EpleyOneRepMaxCalculator extends AbstractOneRepMaxCalculator implements HealthCalculator
{

    /**
     * Calculate the epley one rep max
     *
     * @return float
     */
    public function calculate(): float
    {
        return ($this->weight * (1 + 0.0333 * $this->reps));
    }
}

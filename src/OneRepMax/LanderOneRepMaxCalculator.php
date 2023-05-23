<?php

namespace Tomfordweb\HealthCalculators\OneRepMax;

use Tomfordweb\HealthCalculators\HealthCalculator;
use Tomfordweb\HealthCalculators\OneRepMax\AbstractOneRepMaxCalculator;

class LanderOneRepMaxCalculator extends AbstractOneRepMaxCalculator implements HealthCalculator
{

    public function calculate(): float
    {
        return (
            (100 * $this->weight) / (101.4 - 2.67123 * $this->reps)
        );
    }
}

<?php

namespace Tomfordweb\HealthCalculators\OneRepMax;

use Tomfordweb\HealthCalculators\HealthCalculator;
use Tomfordweb\HealthCalculators\OneRepMax\AbstractOneRepMaxCalculator;

class MayhewOneRepMaxCalculator extends AbstractOneRepMaxCalculator implements HealthCalculator
{
    public function calculate(): float
    {
        return (
            (100 * $this->weight) /
            (52.2 + 41.9 * exp(-0.055 * $this->reps))
        );
    }
}

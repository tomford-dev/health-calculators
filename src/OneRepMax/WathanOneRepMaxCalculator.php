<?php

namespace Tomfordweb\HealthCalculators\OneRepMax;

use Tomfordweb\HealthCalculators\HealthCalculator;

class WathanOneRepMaxCalculator extends AbstractOneRepMaxCalculator implements HealthCalculator
{
    public function calculate(): float
    {
        return (
            (100 * $this->weight) /
            (46.8 + 53.8 * exp(-0.075 * $this->reps))
        );
    }
}

<?php

namespace Tomfordweb\HealthCalculators\OneRepMax;

use Tomfordweb\HealthCalculators\HealthCalculator;
use Tomfordweb\HealthCalculators\OneRepMax\AbstractOneRepMaxCalculator;

class LombardiOneRepMaxCalculator extends AbstractOneRepMaxCalculator implements HealthCalculator
{

    public function calculate(): float
    {
        return ($this->weight * pow($this->reps, 0.1));
    }
}

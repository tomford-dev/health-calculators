<?php

namespace Tomfordweb\HealthCalculators;

interface HealthCalculator
{
    /**
     * Calculate the value
     *
     * @return float
     */
    public function calculate(): float;
}

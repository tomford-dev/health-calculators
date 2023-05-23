<?php

namespace Tomfordweb\HealthCalculators;

interface HealthCalculator
{
    /**
     * Calculate the value
     *
     * @return The value
     */
    public function calculate(): float;
}

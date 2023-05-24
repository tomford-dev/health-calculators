<?php

namespace Tomfordweb\HealthCalculators\OneRepMax;

use Tomfordweb\HealthCalculators\HealthCalculator;

/**
 * Implementation details and shared code for 
 * one rep max calculators
 */
abstract class AbstractOneRepMaxCalculator implements HealthCalculator
{
    protected $weight;
    protected $reps;

    /**
     * Provide the weight and reps
     *
     * @param $weight The weight that was lifted
     * @param $reps   The amount of repetitions
     */
    public function __construct(
        int $weight,
        int $reps
    ) {
        $this->weight = $weight;
        $this->reps = $reps;
    }

    public function percentages()
    {
        return ExertionPercentages::calculate($this);
    }
}

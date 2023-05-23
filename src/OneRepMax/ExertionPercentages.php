<?php

namespace Tomfordweb\HealthCalculators\OneRepMax;

/**
 * Creates an array of exertion percentages for a 1rm value
 */
class ExertionPercentages
{

    /**
     * Creates an array with 10 objects, each object consists of the percentage 
     * and the amount of your 1rm it is.
     *
     * @param AbstractOneRepMaxCalculator $calculator 1rm calculator 
     *
     * @return array
     */
    public static function calculate(AbstractOneRepMaxCalculator $calculator)
    {
        return array_map(
            function ($percentage) use ($calculator) {
                $value = new \stdClass;
                $value->percentage = $percentage;
                $value->value = $calculator->calculate() * ($percentage / 100);
                return $value;
            },
            range(10, 100, 10)
        );
    }
}

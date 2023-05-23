<?php

namespace Tomfordweb\HealthCalculators\JacksonPollock;

use Tomfordweb\HealthCalculators\HealthCalculatorOptions;

/**
 * Measures the body density of the person.
 * Measurements should be provided in mm
 */
interface JacksonPollockCalculator
{
    const MEASUREMENT_PECTORAL = "pectoral";
    const MEASUREMENT_ABDOMINAL = "abdominal";
    const MEASUREMENT_THIGH = "thigh";
    const MEASUREMENT_TRICEP = "tricep";
    const MEASUREMENT_SUPRAILIAC = "suprailiac";
    const MEASUREMENT_AXILA = "axila";
    const MEASUREMENT_SUBSCAPULAR = "subscapular";

    /**
     * Each implementation should calculate the three point
     * body density or body fat values
     *
     * @return float
     */
    public function calculateThreePoint(): float;

    /**
     * Each implementation should calculate the four point
     * body density or body fat values.
     *
     * Note that this calculator actually returns the bodyfat %, rather than density.
     *
     * @return float
     */
    public function calculateFourPoint(): float;

    /**
     * Each implementation should calculate the seven point
     * body density or body fat values
     *
     * @return float
     */
    public function calculateSevenPoint(): float;
}

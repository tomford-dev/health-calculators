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
     */
    public function calculateThreePoint(HealthCalculatorOptions $values): float;

    /**
     * Each implementation should calculate the four point
     * body density or body fat values.
     *
     * Note that this calculator actually returns the bodyfat %, rather than density.
     * TODO: find an example the returns the density.
     */
    public function calculateFourPoint(HealthCalculatorOptions $values): float;

    /**
     * Each implementation should calculate the seven point
     * body density or body fat values
     */
    public function calculateSevenPoint(HealthCalculatorOptions $values): float;
}

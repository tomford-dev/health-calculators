<?php

namespace Tomfordweb\HealthCalculators;

interface HealthCalculator
{
    public function calculate(): float;
}

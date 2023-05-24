<?php

namespace Tomfordweb\HealthCalculators;

use Webmozart\Assert\Assert;

class BmrCalculator implements HealthCalculator
{
    private $isMale;
    private $height;
    private $weight;
    private $age;

    public function __construct(HealthCalculatorOptions $options)
    {
        Assert::numeric($options->getOption('height'), "must be numeric: height");
        Assert::numeric($options->getOption('weight'), "must be numeric: weight");
        Assert::numeric($options->getOption('age'), "must be numeric: age");

        $this->height = (int) $options->getOption('height');
        $this->weight = (int) $options->getOption('weight');
        $this->age = (int) $options->getOption('age');
        $this->isMale = $options->male();
    }

    public function calculate(): float
    {
        $constant = $this->isMale ? 66.47 : 665.1;
        $weightMultiplier = $this->isMale ? 13.75 : 9.563;
        $heightMultipler = $this->isMale ? 5.003 : 1.85;
        $ageMultiplier = $this->isMale ? 6.755 : 4.7;

        return $constant +
            ($weightMultiplier * $this->weight) +
            ($heightMultipler * $this->height) -
            ($ageMultiplier * $this->age);
    }
}

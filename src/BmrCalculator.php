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
        Assert::integer($options->getOption('height'), "must be an integer: height");
        Assert::integer($options->getOption('weight'), "must be an integer: weight");
        Assert::integer($options->getOption('age'), "must be an integer: age");

        $this->height = $options->getOption('height');
        $this->weight = $options->getOption('weight');
        $this->age = $options->getOption('age');
        $this->isMale = $options->male();
    }

    public function calculate(): int
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

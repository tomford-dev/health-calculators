<?php

namespace Tomfordweb\HealthCalculators;

use Webmozart\Assert\Assert;

class SkinfoldSum implements HealthCalculator
{
    private array $values;

    private function __construct(array $values)
    {
        $this->values = $values;
    }

    public static function create(array $values)
    {
        foreach ($values as $key => $value) {

            Assert::numeric(
                $value,
                "skinfold values must be numeric"
            );
        }

        return new static($values);
    }

    public function calculate(): int
    {
        return array_sum($this->values);
    }
}

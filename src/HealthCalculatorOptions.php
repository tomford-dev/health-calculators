<?php

namespace Tomfordweb\HealthCalculators;

use Webmozart\Assert\Assert;

class HealthCalculatorOptions
{

    private $options;

    public function __construct(array $options)
    {
        Assert::keyExists($options, "gender", "Missing key: gender");
        Assert::inArray($options["gender"], ["male", "female"], "Gender must be male or female");
        $this->options = $options;
    }

    public function female(): bool
    {
        return $this->gender === "female";
    }
    public function male(): bool
    {
        return $this->gender === "male";
    }
}

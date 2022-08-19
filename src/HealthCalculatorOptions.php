<?php

namespace Tomfordweb\HealthCalculators;

use Webmozart\Assert\Assert;

class HealthCalculatorOptions
{

    private array $options;

    public function __construct(array $options)
    {
        Assert::keyExists($options, "gender", "Missing key: gender");
        Assert::inArray($options["gender"], ["male", "female"], "Gender must be male or female");
        $this->options = $options;
    }
    public function getOption($key, $default = null)
    {
        if (empty($default) && !array_key_exists($key, $this->options)) {
            throw new \InvalidArgumentException(sprintf("Missing value: %s", $key));
        }
        return $this->options[$key];
    }
    public function getOptions(array $options): array
    {
        $values =  array_map(function ($key) {
            return $this->getOption($key);
        }, $options);
        return array_combine($options, $values);
    }

    public function female(): bool
    {
        return $this->getOption("gender") === "female";
    }
    public function male(): bool
    {
        return $this->getOption("gender") === "male";
    }
}

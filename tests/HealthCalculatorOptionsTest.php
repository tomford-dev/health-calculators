<?php

use PHPUnit\Framework\TestCase;
use Tomfordweb\HealthCalculators\HealthCalculatorOptions;

class HealthCalculatorOptionsTest extends TestCase
{

    public function test_it_expects_gender()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Missing key: gender");
        new HealthCalculatorOptions([]);
    }

    public function test_it_rejects_gender_other_than_male_female()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Gender must be male or female");
        new HealthCalculatorOptions(["gender" => "alligator"]);
    }
}

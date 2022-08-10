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

    public function test_it_throws_if_option_is_requested_without_default()
    {

        $options = new HealthCalculatorOptions(["gender" => "male"]);
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Missing value: bar");
        $options->getOption("bar");
    }

    public function test_it_returns_an_option()
    {
        $options = new HealthCalculatorOptions(["gender" => "male", "bar" => "foo"]);
        $this->assertSame("foo", $options->getOption("bar"));
        $options->getOption("bar");
    }
}

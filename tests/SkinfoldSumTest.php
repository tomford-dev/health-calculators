<?php

use PHPUnit\Framework\TestCase;
use Tomfordweb\HealthCalculators\SkinfoldSum;

class SkinfoldSumTest extends TestCase
{

    public function test_it_rejects_non_numeric()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("skinfold values must be numeric");
        SkinfoldSum::create(["foo", "bar"])->calculate();
    }

    public function test_it_sums()
    {
        $this->assertSame(SkinfoldSum::create([1, 2, 3])->calculate(), 6);
    }

    public function test_it_handles_strings()
    {
        $this->assertSame(SkinfoldSum::create([1, 2, "3"])->calculate(), 6);
    }
}

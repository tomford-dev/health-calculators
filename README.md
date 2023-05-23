To use these calculators, run the following command in your project.

```
composer require tomfordweb/health-calculators
```

# How To Use

## One Rep Max

Each calculator extends `AbstractOneRepMaxCalculator` which requires the weight and reps as a constructor argument.

We have included a variety of 1RM calculators so you can use your favorite methods.

```php

$oneRepMax = new BrzyckiOneRepMaxCalculator(100, 2)->calculate();

```

You can also determine the exertion amounts for a particular one rep max given that you provide an `AbstractOneRepMaxCalculator`

The following code:

```php
$values = ExertionPercentages::calculate(
    new BrzyckiOneRepMaxCalculator(100, 2)
);

```

Will output

```json
[
  {
    "percentage": 10,
    "value": 10.285714285714285
  },
  {
    "percentage": 20,
    "value": 20.57142857142857
  },
  {
    "percentage": 30,
    "value": 30.857142857142854
  },
  ....
  {
    "percentage": 90,
    "value": 92.57142857142857
  },
  {
    "percentage": 100,
    "value": 102.85714285714285
  }
]
```

# Testing

Run the unit tests:

```
./vendor/bin/phpunit
```

Or to include code coverage:

```
XDEBUG_MODE=coverage ./vendor/bin/phpunit
```

You can view the coverage report at `_coverage/index.html`

# Thanks

- [Jackson Pollock Formulas](https://fitties.com/)
- [Navy Bodyfat Formulas](https://www.mytecbits.com/tools/medical/navy-body-fat-calculator)

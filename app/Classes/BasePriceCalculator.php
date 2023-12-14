<?php

namespace App\Classes;

use Illuminate\Support\Carbon;

abstract class BasePriceCalculator
{
    public function calculate(Carbon $startDate, Carbon $endDate, int $serviceId) {}
}

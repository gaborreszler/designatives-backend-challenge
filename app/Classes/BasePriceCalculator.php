<?php

namespace App\Classes;

use App\Models\Service;
use Illuminate\Support\Carbon;

abstract class BasePriceCalculator
{
    protected Service $service;

    public function calculate(Carbon $startDate, Carbon $endDate, int $serviceId) {}
}

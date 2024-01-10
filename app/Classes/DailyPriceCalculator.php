<?php

namespace App\Classes;

use App\Models\Service;
use Illuminate\Support\Carbon;

class DailyPriceCalculator extends BasePriceCalculator
{
    public function calculate(Carbon $startDate, Carbon $endDate, int $serviceId): float
    {
        $this->service = Service::query()->findOrFail($serviceId);

        return $this->service->monthlyPrice * 12 / 365;
    }

}

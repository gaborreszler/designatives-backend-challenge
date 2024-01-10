<?php

namespace App\Classes;

use App\Models\Service;
use Illuminate\Support\Carbon;

class MonthlyPriceCalculator extends BasePriceCalculator
{
    public function calculate(Carbon $startDate, Carbon $endDate, int $serviceId): int
    {
        $this->service = Service::query()->findOrFail($serviceId);
        $monthDiff = $startDate->diffInMonths($endDate) + 1;

        return $monthDiff * $this->service->monthlyPrice;
    }

}

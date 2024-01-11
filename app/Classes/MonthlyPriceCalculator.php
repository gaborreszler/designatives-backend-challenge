<?php

namespace App\Classes;

use App\Models\Service;
use Illuminate\Support\Carbon;

class MonthlyPriceCalculator extends BasePriceCalculator
{
    public function calculate(Carbon $startDate, Carbon $endDate, int $serviceId): int
    {
        $this->service = Service::query()->findOrFail($serviceId);
        $monthDiff = $this->countFullMonths($startDate, $endDate);

        return $monthDiff * $this->service->monthlyPrice;
    }

    public static function countFullMonths(Carbon $startDate, Carbon $endDate): int
    {
        return $startDate->diffInMonths($endDate) + 1;
    }
}

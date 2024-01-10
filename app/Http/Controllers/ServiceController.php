<?php

namespace App\Http\Controllers;

use App\Classes\DailyPriceCalculator;
use App\Classes\MonthlyPriceCalculator;
use App\Http\Requests\GetPriceRequest;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Route;
use UnhandledMatchError;

class ServiceController extends Controller
{
    public function getMonthlyPrice(int $serviceId, Carbon $startDate, Carbon $endDate)
    {
        $calculator = new MonthlyPriceCalculator();

        return $calculator->calculate(serviceId: $serviceId, startDate: $startDate, endDate: $endDate);
    }

    public function getDailyPrice(int $serviceId, Carbon $startDate, Carbon $endDate)
    {
        $calculator = new DailyPriceCalculator();

        return $calculator->calculate(serviceId: $serviceId, startDate: $startDate, endDate: $endDate);
    }

    public function getPrice(GetPriceRequest $request)
    {
        $parameters = $request->validated();
        $serviceId = $parameters['serviceId'];
        $startDate = Carbon::parse($parameters['startDate']);
        $endDate = Carbon::parse($parameters['endDate']);

        $route = Route::getCurrentRoute();
        list(, , $type) = explode('/', $route->uri);

        try {
            $price = match ($type) {
                'monthly' => $this->getMonthlyPrice($serviceId, $startDate, $endDate),
                'daily' => $this->getDailyPrice($serviceId, $startDate, $endDate),
            };
        } catch (UnhandledMatchError $exception) {
            abort(400, $exception->getMessage());
        }

        return $price;
    }
}

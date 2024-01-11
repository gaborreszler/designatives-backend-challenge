<?php

namespace Tests\Unit;

use App\Classes\MonthlyPriceCalculator;
use App\Models\Service;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Carbon;
use Tests\TestCase;

class MonthlyPriceCalculatorTest extends TestCase
{
    use RefreshDatabase;

    public function test_monthly_price_calculator(): void
    {
        $service = Service::factory()->create([
            'id' => rand(1, 50),
            'name' => 'Designatives',
            'monthlyPrice' => rand(10, 50),
        ]);

        $startDate = Carbon::parse('2023-01-12');
        $endDate = Carbon::parse('2023-03-28');

        $calculator = new MonthlyPriceCalculator();
        $result = $calculator->calculate($startDate, $endDate, $service->id);

        $this->assertEquals(MonthlyPriceCalculator::countFullMonths($startDate, $endDate) * $service->monthlyPrice, $result);
    }
}

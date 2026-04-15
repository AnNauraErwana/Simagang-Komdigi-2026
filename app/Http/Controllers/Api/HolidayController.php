<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\HolidayService;
use App\Services\TimeService;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class HolidayController extends Controller
{

    public function check(Request $request): JsonResponse
    {
        $dateParam = $request->query('date');

        if ($dateParam) {
            try {
                $date = Carbon::createFromFormat('Y-m-d', $dateParam)->startOfDay();
            } catch (\Throwable $e) {
                return response()->json(['error' => 'Format tanggal tidak valid. Gunakan YYYY-MM-DD.'], 422);
            }
        } else {
            $date = TimeService::nowWita()->startOfDay();
        }

        $isWeekend         = HolidayService::isWeekend($date);
        $isNationalHoliday = HolidayService::isNationalHoliday($date);
        $isHoliday         = $isWeekend || $isNationalHoliday;
        $holidayName       = $isHoliday ? HolidayService::getHolidayName($date) : null;

        return response()->json([
            'date'               => $date->toDateString(),
            'is_holiday'         => $isHoliday,
            'is_weekend'         => $isWeekend,
            'is_national_holiday'=> $isNationalHoliday,
            'holiday_name'       => $holidayName,
        ]);
    }
}

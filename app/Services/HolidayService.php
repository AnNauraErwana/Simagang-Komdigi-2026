<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class HolidayService
{
    const API_URL = 'https://api-harilibur.vercel.app/api';
    const CACHE_TTL = 86400; // 24 jam

    /**
     * Ambil daftar tanggal hari libur nasional untuk tahun tertentu.
     * Hasilnya di-cache 24 jam agar tidak membebani API.
     */
    public static function getHolidays(int $year): array
    {
        $cacheKey = 'holiday_list_' . $year;

        return Cache::remember($cacheKey, self::CACHE_TTL, function () use ($year) {
            try {
                $response = Http::timeout(10)->get(self::API_URL, ['year' => $year]);

                if ($response->successful()) {
                    $data = $response->json();

                    return collect($data)
                        ->filter(fn($h) => !empty($h['holiday_date']) && ($h['is_national_holiday'] ?? false))
                        ->pluck('holiday_date')
                        ->values()
                        ->toArray();
                }
            } catch (\Throwable $e) {
                // Fallback: kembalikan array kosong jika API gagal
            }

            return [];
        });
    }


    public static function isHoliday(Carbon $date): bool
    {
        return self::isWeekend($date) || self::isNationalHoliday($date);
    }

    /**
     * Cek apakah hari Sabtu atau Minggu.
     */
    public static function isWeekend(Carbon $date): bool
    {
        return $date->isSaturday() || $date->isSunday();
    }

    /**
     * Cek apakah tanggal termasuk tanggal merah nasional.
     */
    public static function isNationalHoliday(Carbon $date): bool
    {
        $holidays = self::getHolidays($date->year);
        return in_array($date->toDateString(), $holidays);
    }

    /**
     * Ambil nama hari libur untuk tanggal tertentu (jika ada).
     */
    public static function getHolidayName(Carbon $date): ?string
    {
        if (self::isWeekend($date)) {
            return $date->isSaturday() ? 'Sabtu' : 'Minggu';
        }

        try {
            $response = Http::timeout(10)->get(self::API_URL, ['year' => $date->year]);

            if ($response->successful()) {
                $data = $response->json();
                $dateStr = $date->toDateString();

                foreach ($data as $holiday) {
                    if (($holiday['holiday_date'] ?? '') === $dateStr && ($holiday['is_national_holiday'] ?? false)) {
                        return $holiday['holiday_name'] ?? 'Hari Libur Nasional';
                    }
                }
            }
        } catch (\Throwable $e) {
            // ignore
        }

        return null;
    }

    /**
     * Hapus cache hari libur untuk tahun tertentu (untuk refresh manual).
     */
    public static function clearCache(int $year): void
    {
        Cache::forget('holiday_list_' . $year);
    }
}

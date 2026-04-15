<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Services\HolidayService;
use App\Services\TimeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    public function index(Request $request)
    {
        $mentor  = Auth::user()->mentor;
        $nowWita = TimeService::nowWita();
        $todayWita = $nowWita->toDateString();

        $query = Attendance::query()
            ->with('intern')
            ->when($mentor, function ($q) use ($mentor) {
                $q->whereIn('intern_id', $mentor->interns()->pluck('id'));
            });

        if ($request->filled('intern_id')) {
            $query->where('intern_id', $request->integer('intern_id'));
        }
        if ($request->filled('date_from')) {
            $query->whereDate('date', '>=', $request->date('date_from'));
        }
        if ($request->filled('date_to')) {
            $query->whereDate('date', '<=', $request->date('date_to'));
        }
        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }

        $attendances = $query->orderByDesc('date')->paginate(20)->withQueryString();

        $interns = $mentor ? $mentor->interns()->orderBy('name')->get() : collect();

        $todayAbsentInterns = collect();
        $isWorkday = !HolidayService::isHoliday($nowWita);
        $noDateFilter = !$request->filled('date_from') && !$request->filled('date_to');
        $noStatusFilter = !$request->filled('status') || $request->input('status') === 'alfa';

        if ($isWorkday && $noDateFilter && $noStatusFilter && $mentor) {
            $internIds = $mentor->interns()->pluck('id');

            $presentIds = Attendance::whereIn('intern_id', $internIds)
                ->whereDate('date', $todayWita)
                ->pluck('intern_id');

            $todayAbsentInterns = $interns->whereNotIn('id', $presentIds->toArray());

            if ($request->filled('intern_id')) {
                $todayAbsentInterns = $todayAbsentInterns->where('id', $request->integer('intern_id'));
            }
        }

        return view('mentor.attendance.index', compact(
            'mentor', 'attendances', 'interns', 'todayAbsentInterns', 'todayWita'
        ));
    }
}



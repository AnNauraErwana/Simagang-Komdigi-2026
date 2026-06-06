<?php

namespace App\Policies;

use App\Models\Logbook;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class LogbookPolicy
{
    public function view(User $user, Logbook $logbook): bool
    {
        if ($user->isAdmin()) {
            return true;
        }

        if ($user->isIntern()) {
            return optional($user->intern)->id === $logbook->intern_id;
        }

        if ($user->isMentor()) {
            $mentorId = optional($user->mentor)->id;

            return $mentorId
                ? DB::table('interns')
                    ->where('id', $logbook->intern_id)
                    ->where('mentor_id', $mentorId)
                    ->exists()
                : false;
        }

        if ($user->isInstitusi()) {
            $institusiId = optional($user->institusi)->id;

            return $institusiId
                ? DB::table('interns')
                    ->join('users', 'users.id', '=', 'interns.user_id')
                    ->join('pengajuan_details', 'pengajuan_details.email', '=', 'users.email')
                    ->join('pengajuans', 'pengajuans.id', '=', 'pengajuan_details.pengajuan_id')
                    ->where('pengajuans.institusi_id', $institusiId)
                    ->where('interns.id', $logbook->intern_id)
                    ->exists()
                : false;
        }

        if ($user->isIndustri()) {
            $industriId = optional($user->industri)->id;

            return $industriId
                ? DB::table('interns')
                    ->join('users', 'users.id', '=', 'interns.user_id')
                    ->join('pengajuan_details', 'pengajuan_details.email', '=', 'users.email')
                    ->join('pengajuans', 'pengajuans.id', '=', 'pengajuan_details.pengajuan_id')
                    ->join('lowongans', 'lowongans.id', '=', 'pengajuans.lowongan_id')
                    ->where('lowongans.industri_id', $industriId)
                    ->where('interns.id', $logbook->intern_id)
                    ->exists()
                : false;
        }

        return false;
    }

    public function update(User $user, Logbook $logbook): bool
    {
        if ($user->isAdmin()) {
            return true;
        }

        return $user->isIntern() && optional($user->intern)->id === $logbook->intern_id;
    }

    public function delete(User $user, Logbook $logbook): bool
    {
        return $this->update($user, $logbook);
    }
}
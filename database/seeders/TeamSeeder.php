<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Team;

class TeamSeeder extends Seeder
{
    public function run(): void
    {
        $validTeams = [
            'TIM DEA',
            'TIM GTA',
            'TIM VSGA',
            'TIM TA',
            'TIM Microskill',
            'TIM Media (DiaPus)',
            'TIM Tata Usaha (Umum)',
            'FGA',
            'Keuangan',
            'Tim PUSDATIN',
            'Tim Perencanaan, Anggaran, Dan Kerja Sama',
            'Tim Kepegawaian, Persuratan dan Kearsipan'
        ];

        foreach ($validTeams as $team) {
            Team::firstOrCreate(
                ['name' => $team] // supaya tidak duplikat
            );
        }
    }
}